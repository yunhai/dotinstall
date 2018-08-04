<tr>
    <td class="aside">{{ $field_label }}</td>
    <td>
        @php
            if ($errors->all()) {
                $field_value = old($field_name, []);
            }

            if ($field_value && !is_array($field_value)) {
                $tmp = [];
                foreach($field_value as $key => $target) {
                    array_push($tmp, $target->toArray());
                }
                $field_value = $tmp;
            }
            $empty_flag = empty($field_value);
        @endphp

        <div class='dd-container {{ @$field_class }}'
            @foreach ($field_attribute as $key => $value)
                {{ $key }}="{{ $value }}"
            @endforeach
            data-name="{{ $field_name }}"
        >
            <div class='dd-browser'>Upload / Drag and drop here</div>
            <div class='dd-callback'>
                @if (!$empty_flag)
                @foreach($field_value as $target)
                <div class='dd-callback__item'>
                    <span class="dd-callback__filename">[{{ $target['original_name'] }}]</span>
                    <div class='dd-preview'>
                        @php
                            $id = $target["id"];
                            $media_path = $target['path'];
                        @endphp
                        <input type='hidden' value='{{ $id }}' name='{{ $field_name }}[{{ $id }}][id]'/>
                        <input type='hidden' value='{{ $target["type"] }}' name='{{ $field_name }}[{{ $id }}][type]'/>
                        <input type='hidden' value='{{ $target["path"] }}' name='{{ $field_name }}[{{ $id }}][path]'/>
                        <input type='hidden' value='{{ $target["original_name"] }}' name='{{ $field_name }}[{{ $id }}][original_name]'/>

                        @if ($target['type'] === 'video')
                            @php
                                $video_duration = 0;
                                if (isset($target["duration"])) {
                                    $video_duration = $target["duration"];
                                } else {
                                    $video_duration = $field_attribute['data-video_duration'];
                                }
                            @endphp
                            <input type='hidden' value='{{ $video_duration }}' name='{{ $field_name }}[{{ $id }}][duration]'/>
                            <video width="400" controls>
                              <source src="@media_path($media_path)" type="video/mp4">
                              Your browser does not support HTML5 video.
                            </video>
                        @elseif ($target['type'] === 'image')
                            <img width="400" src="@media_path($media_path)" class='dd-preview-image' />
                        @endif
                        <div class='dd-control'>
                            <a href='/admin/media/download/{{ $target["id"] }}' class='btn btn-outline-info btn-sm' title='ダウンロード'>ダウンロード</a>
                            <sapn class='j-dd-remove btn btn-outline-danger btn-sm' title='削除'>削除</sapn>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
        @if (!empty($errors->first($field_name)))
            <span class="text-danger d-block mt-2">{{ $errors->first($field_name) }}</span>
        @endif
    </td>
</tr>
