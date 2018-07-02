import Resumable from './resumable';

export default class ChuckUpload {
    bind($target, query = {}) {
        const url = $target.data('url');

        const resumable = new Resumable({
            chunkSize: 1 * 1024 * 1024, // 1MB
            simultaneousUploads: 3,
            testChunks: false,
            throttleProgressCallbacks: 1,
            target: url,
            query: query
        })

        if (resumable.support) {
            const $browser = $target.find('.dd-browser');
            const $callback = $target.find('.dd-callback');
            // const $status = $target.find('.dd-callback__progress');
            // const $preview = $target.find('.dd-preview');

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
    
    callback(obj, $target) {
        const name = $target.data('name');
        
        const html = `
            <input type='hidden' value='${obj.id}' name='${name}'/>
            <video width="400" controls>
              <source src="${obj.url}" type="${obj.media_type}">
              Your browser does not support HTML5 video.
            </video>
        `;
        $target.find('.dd-preview').append(html);
    }
    
    bindFileAdded(resumable, $target, $callback) {
        resumable.on('fileAdded', (file) => {
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
        });
    }
    bindFileSuccess(resumable, $target, $callback) {
        resumable.on('fileSuccess', (file, message) => {
            const $callback = $(`.dd-callback__${file.uniqueIdentifier}`);
            $callback.find('.dd-callback__progress').html(`completed`);
            $callback.addClass('dd-completed');
            const obj = JSON.parse(message);
            this.callback(obj, $target);
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