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
                    $item = $target->media->toArray();

                    $item['language'] = $target->language;
                    $item['lesson_detail_attachment__id'] = $target->id;

                    if (!empty($field_advance['source_code_content'][$target->id])) {
                        $tmp = $field_advance['source_code_content'][$target->id];
                        $item['display_name'] = $tmp['original_name']; 
                        $item['source_code_content_id'] = $tmp['id']; 
                    }

                    array_push($tmp, $item);
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
                            <span class="dd-callback__filename">[{{ @$target['original_name'] }}]</span>
                            <div class='dd-preview'>
                                @php
                                    $id = $target["id"];
                                    $media_path = $target['path'];
                                    $language = empty($target["language"]) ? '' : $target["language"];
                                    $lesson_detail_attachment__id = empty($target["lesson_detail_attachment__id"]) ? '' : $target["lesson_detail_attachment__id"];
                                @endphp

                                <input type='hidden' value='{{ $id }}' name='{{ $field_name }}[{{ $id }}][id]'/>
                                <input type='hidden' value='{{ $target["type"] }}' name='{{ $field_name }}[{{ $id }}][type]'/>
                                <input type='hidden' value='{{ $target["path"] }}' name='{{ $field_name }}[{{ $id }}][path]'/>
                                <input type='hidden' value='{{ $target["original_name"] }}' name='{{ $field_name }}[{{ $id }}][original_name]'/>
                                <input type='hidden' value='{{ $lesson_detail_attachment__id }}' name='{{ $field_name }}[{{ $id }}][lesson_detail_attachment__id]'/>

                                @if ($target['type'] === 'video')
                                    <video width="400" controls>
                                      <source src="@media_path($media_path)" type="video/mp4">
                                      Your browser does not support HTML5 video.
                                    </video>
                                @elseif ($target['type'] === 'image')
                                    <img width="400" src="@media_path($media_path)" class='dd-preview-image' />
                                @endif

                                @if ($field_attribute['data-type'] === 'msword')
                                <div class='j-filename_holder filename_holder'>
                                    <input type='hidden' name='{{ $field_name }}[{{ $id }}][source_code_content_id]' value='{{ $target['source_code_content_id'] ?? '' }}' />
                                    <span class='holder-label'>Display name</span>
                                    <input name='{{ $field_name }}[{{ $id }}][display_name]' value='{{ $target['display_name'] ?? '' }}' class='source_code_content__filename'/>
                                </div>
                                <div class='j-language_holder language_holder'>
                                    <span class='holder-label'>Language</span>
                                    <select class='language_holder j-select' name='{{ $field_name }}[{{ $id }}][language]'>
                                        @foreach($field_advance['languages'] as $lang_id => $lang)
                                        <option value='{{ $lang_id }}' @if($lang_id === $language) selected @endif>{{ $lang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                                <div class='dd-control'>
                                    <a href='/backend/media/download/{{ $target["id"] }}' class='btn btn-outline-info btn-sm' title='Download'>Download</a>
                                    <sapn class='j-dd-remove btn btn-outline-danger btn-sm' title='Remove'>Remove</sapn>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <span class="text-danger">{{ $errors->first($field_name) }}</span>
    </td>
</tr>