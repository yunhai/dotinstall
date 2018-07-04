import Resumable from './resumable';

export default class ChuckUpload {
    bind($target, query = {}) {
        const url = $target.data('url');

        const option = {
            chunkSize: 1 * 1024 * 1024, // 1MB
            simultaneousUploads: 3,
            testChunks: false,
            throttleProgressCallbacks: 1,
            target: url,
            query: query,
            maxFiles: $target.data('max_file_upload'),
        };
        const resumable = new Resumable(option);

        if (resumable.support) {
            const $browser = $target.find('.dd-browser');
            const $callback = $target.find('.dd-callback');

            this.assign(resumable, $target, $browser);
            this.bindFileAdded(resumable, $target, $callback);
            this.bindFileSuccess(resumable, $target, $callback);
            this.bindFileError(resumable, $target, $callback);
            this.bindFileProgress(resumable, $target, $callback);

            return true;
        }
        alert('not support');
    }

    assign(resumable, $target, $browser) {
        resumable.assignDrop($target);
        resumable.assignBrowse($browser);
    }

    callback(obj, $target, $callback) {
        const type = $target.data('type');
        const maxFileUpload = $target.data('max_file_upload');

        switch (type) {
            case 'video':
                this.callbackVideo(obj, $target, $callback);
                break;
            case 'image':
                this.callbackImage(obj, $target, $callback);
                break;
            case 'document':
                this.callbackDocument(obj, $target, $callback);
                break;
        }
        const list = $target.find('.dd-callback__item');

        if (list.length > maxFileUpload) {
            $(list[0]).remove();
        }
    }

    callbackVideo(obj, $target, $callback) {
        const name = $target.data('name');

        const html = `
            <input type='hidden' value='${obj.id}' name='${name}[${obj.id}][id]'/>
            <input type='hidden' value='video' name='${name}[${obj.id}][type]'/>
            <input type='hidden' value='${obj.path}' name='${name}[${obj.id}][path]'/>
            <input type='hidden' value='${obj.original_name}' name='${name}[${obj.id}][original_name]'/>

            <video width="400" controls>
              <source src="${obj.url}" type="video/mp4">
              Your browser does not support HTML5 video.
            </video>
            <div class='dd-control'>
                <a href='/backend/media/download/${obj.id}' class='btn btn-outline-info btn-sm' title='Download'>Download</a>
                <span class='j-dd-remove btn btn-outline-danger btn-sm' title='Remove'>Remove</span>
            </div>
        `;

        $callback.find('.dd-preview').append(html);
    }

    callbackImage(obj, $target, $callback) {
        const name = $target.data('name');
        const html = `
            <input type='hidden' value='${obj.id}' name='${name}[${obj.id}][id]'/>
            <input type='hidden' value='image' name='${name}[${obj.id}][type]'/>
            <input type='hidden' value='${obj.path}' name='${name}[${obj.id}][path]'/>
            <input type='hidden' value='${obj.original_name}' name='${name}[${obj.id}][original_name]'/>
            <img width="400" src="${obj.url}" class='dd-preview-image'/>
            <div class='dd-control'>
                <a href='/backend/media/download/${obj.id}' class='btn btn-outline-info btn-sm' title='Download'>Download</a>
                <span class='j-dd-remove btn btn-outline-danger btn-sm' title='Remove'>Remove</span>
            </div>
        `;

        $callback.find('.dd-preview').append(html);
    }

    callbackDocument(obj, $target, $callback) {
        const name = $target.data('name');

        const html = `
            <input type='hidden' value='${obj.id}' name='${name}[${obj.id}][id]'/>
            <input type='hidden' value='document' name='${name}[${obj.id}][type]'/>
            <input type='hidden' value='${obj.path}' name='${name}[${obj.id}][path]'/>
            <input type='hidden' value='${obj.original_name}' name='${name}[${obj.id}][original_name]'/>
            <div class='dd-control'>
                <a href='/backend/media/download/${obj.id}' class='btn btn-outline-info btn-sm' title='Download'>Download</a>
                <span class='j-dd-remove btn btn-outline-danger btn-sm' title='Remove'>Remove</span>
            </div>
        `;

        $callback.find('.dd-preview').append(html);
    }

    validate(target, mediaType) {
        const fileName = target.fileName;
        const extMap = {
            'video': ['mp4'],
            'image': ['jpg', 'jpeg', 'png'],
            'document': ['zip', 'docx', 'doc', 'pdf', 'txt'],
        }
        const ext = fileName.substr(fileName.lastIndexOf('.') + 1);
        const allow = extMap[mediaType] || [];
        if (allow.indexOf(ext) === -1)
        {
            const ext = allow.join(', ');
            alert(`ファイルの拡張子を${ext}のいずれかにしてください。`);
            return false;
        }
        return true;
    }

    bindFileAdded(resumable, $target, $callback) {
        resumable.on('fileAdded', (file) => {
            if (this.validate(file, $target.data('type'))) {
                const html = `
                    <div class='dd-callback__item dd-callback__${file.uniqueIdentifier}'>
                        <span class="dd-callback__filename">[${file.fileName}]</span>
                        <span class="dd-callback__progress"></span>
                        <div class='dd-progress_bar'></div>
                        <div class='dd-preview'></div>
                    </div>
                `;
                $callback.append(html);
                resumable.upload();
            }
        });
    }

    bindFileSuccess(resumable, $target, $callback) {
        resumable.on('fileSuccess', (file, message) => {
            const $callback = $target.find(`.dd-callback__${file.uniqueIdentifier}`);
            $callback.find('.dd-callback__progress').html('');
            $callback.addClass('dd-completed');
            const obj = JSON.parse(message);
            this.callback(obj, $target, $callback);
        });
    }
    bindFileError(resumable, $target, $callback) {
        resumable.on('fileError', (file, message) => {
            const $target = $(`.dd-callback__${file.uniqueIdentifier}`);
            $target.find('.dd-callback__progress').html(`Error: [${message}]`);
        });
    }
    bindFileProgress(resumable, $target, $callback) {
        resumable.on('fileProgress', (file) => {
            const $target = $(`.dd-callback__${file.uniqueIdentifier}`);
            $target.find('.dd-callback__progress').html(Math.floor(file.progress() * 100) + '%');
            $target.find('.dd-progress_bar').css({width: Math.floor(resumable.progress() * 100) + '%'});
        });
    }
}