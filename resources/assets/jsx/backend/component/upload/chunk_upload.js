import Resumable from './resumable';
import CaptureVideo from './capture_video';

export default class ChuckUpload {
    bind($target, query = {}) {
        const url = $target.data('url');

        const option = {
            chunkSize: 2 * 1024 * 1024, // 1MB
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
            default:
                this.callbackDocument(obj, $target, $callback);
                break;
        }
        const list = $target.find('.dd-callback__item');

        if (list.length > maxFileUpload) {
            $(list[0]).remove();
        }
    }

    callbackVideo(obj, $target, $callback) {
        console.log(obj);
        const $dd_preview = $callback.find('.dd-preview');
        const player_id = new Date().getTime();

        const name = $target.data('name');
        const html = `
            <input type='hidden' value='${obj.id}' name='${name}[${obj.id}][id]'/>
            <input type='hidden' value='video' name='${name}[${obj.id}][type]'/>
            <input type='hidden' value='${obj.path}' name='${name}[${obj.id}][path]'/>
            <input type='hidden' value='${obj.original_name}' name='${name}[${obj.id}][original_name]'/>

            <video width="400" controls id='j-video_player--${player_id}' preload="metadata">
              <source src="${obj.url}" type="video/mp4">
              Your browser does not support HTML5 video.
            </video>

            <div class='dd-control'>
                <a href='/backend/media/download/${obj.id}' class='btn btn-outline-info btn-sm' title='ダウンロード'>ダウンロード</a>
                <span class='j-dd-remove btn btn-outline-danger btn-sm' title='削除'>削除</span>
            </div>
        `;
        $dd_preview.append(html);

        const videoPlayer = document.getElementById(`j-video_player--${player_id}`);
        videoPlayer.addEventListener('loadedmetadata', function() {
            let duration = 0;
            if (typeof(videoPlayer.duration) != 'NaN') {
                duration = parseInt(videoPlayer.duration);
                const html3 = `<input type='hidden' value='${duration}' name='${name}[${obj.id}][duration]'/>`;
                $dd_preview.append(html3);
            }
        });

        const $target2 = $('.j-poster');
        const $callback2 = $target2.find('.dd-callback');
        if ($callback2.find('.dd-preview-image').length === 0) {
            const html2 = `
                <div class='dd-callback__item'>
                    <span class="dd-callback__filename"></span>
                    <span class="dd-callback__progress"></span>
                    <div class='dd-progress_bar hidden'></div>
                    <div class='dd-preview'></div>
                </div>
            `;
            $callback2.append(html2);

            const captureVideo = new CaptureVideo();
            const fcallback = this.callbackImage;

            captureVideo.capture(obj, fcallback, $target2, $callback2);
        }
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
                <a href='/backend/media/download/${obj.id}' class='btn btn-outline-info btn-sm' title='ダウンロード'>ダウンロード</a>
                <span class='j-dd-remove btn btn-outline-danger btn-sm' title='削除'>削除</span>
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
            <div class='j-filename_holder filename_holder'></div>
            <div class='j-language_holder language_holder'></div>
            <div class='dd-control'>
                <a href='/backend/media/download/${obj.id}' class='btn btn-outline-info btn-sm' title='ダウンロード'>ダウンロード</a>
                <span class='j-dd-remove btn btn-outline-danger btn-sm' title='削除'>削除</span>
            </div>
        `;

        $callback.find('.dd-preview').append(html);

        if ($target.data('type') === 'msword') {
            const $selector = $($('#j-template').find('.j-template_language')).clone();
            $selector.attr('name', `${name}[${obj.id}][language]`);
            $selector.removeClass('j-template_language');

            const $holder = $callback.find('.j-language_holder');
            $holder.append(`<span class='holder-label'>Language</span>`);
            $holder.append($selector);

            $selector.selectpicker({
                liveSearch: true,
                showTick: true,
                noneResultsText: '対象が見つかりません'
            });

            const filenameHTML = `
                <span class='holder-label'>Display name</span>
                <input name='${name}[${obj.id}][display_name]' value='${obj.original_name}' class='source_code_content__filename' />
            `;

            const $filename_holder = $callback.find('.j-filename_holder');
            $filename_holder.append(filenameHTML);
        }
    }

    validate(target, mediaType) {
        if (mediaType === 'all') {
            return true;
        }

        const fileName = target.fileName;
        const extMap = {
            'video': ['mp4'],
            'image': ['jpg', 'jpeg', 'png'],
            'document': ['zip', 'docx', 'doc', 'pdf', 'txt'],
            'msword': ['docx', 'doc'],
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