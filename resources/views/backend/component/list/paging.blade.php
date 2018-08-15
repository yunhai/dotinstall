<div class="card">
    <div class="card-header">
        <i class="fa fa-list"></i>
        {{ $table['title'] }}
    </div>
    <div class="card-body">
        @if(Session::has('input.success'))
        <div class="alert alert-success" role="alert">
            保存成功しました。
        </div>
        @elseif(Session::has('delete.success'))
        <div class="alert alert-success" role="alert">
          削除しました。
        </div>
        @endif
        <div class="d-block">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                @yield('list_header')
                <div class="row">
                    <div class="col-sm-12">
                        <table width="100%" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    @foreach ($table['header'] as $item)
                                        <th>{{ $item }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    @foreach ($table['body'] as $row)
                                    <td
                                        @if (!empty($row['attr']))
                                            @foreach($row['attr'] as $key => $value)
                                                {{ $key }}="{{ $value }}"
                                            @endforeach
                                        @endif
                                    >
                                        @if ($row['field'])
                                            @if (empty($row['option']))
                                                {{ $item[$row['field']] }}
                                            @else
                                                {{ $row['option'][$item[$row['field']]] ?? '' }}
                                            @endif
                                        @elseif (!empty($row['apply']))
                                            @php
                                                $func = array_shift($row['apply']);

                                                $params = $row['apply'];
                                                foreach($params as &$param) {
                                                    if ($param === 'apply_value') {
                                                        $param = '';
                                                        if (!empty($row['apply_value'])) {
                                                            $param = $item[$row['apply_value']] ?? '';
                                                        }
                                                    }
                                                }

                                                echo call_user_func_array($func, $params);
                                            @endphp
                                        @elseif (!empty($row['tpl']))
                                            @if (empty($row['tpl_arg']))
                                                {{ $row['tpl'] }}
                                            @else
                                                @php
                                                    $html = $row['tpl'];
                                                    foreach($row['tpl_arg'] as $key => $value) {
                                                        $html = str_replace($key, $item[$value], $html);
                                                    }
                                                    echo $html;
                                                @endphp
                                            @endif
                                        @endif
                                    </td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- pagination -->
                <div class="row">
                    @php
                        $pager_total_item = $data->total();
                        $pager_begin = ($data->currentpage () - 1) * ($data->perpage() + 1);
                        $pager_end = ($data->currentpage ()) * ($data->perpage());
                        $pager_current_page = $data->currentPage();
                        $pager_total_page = $data->count();
                    @endphp
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info hidden" id="dataTable_info" role="status" aria-live="polite"><!-- Showing 1 to 10 of 57 entries -->
                            {{ $pager_total_item }}件
                            {{ $pager_begin }}~{{ $pager_end }}を表示
                            {{ $pager_current_page }}/{{ $pager_total_page}}ページ
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                             {!! $data->appends(request()->except('page'))->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
