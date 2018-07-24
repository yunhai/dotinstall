<div class="card">
    <div class="card-header">
        <i class="fa fa-list"></i>
        {{ $table['title'] }}
    </div>
    <div class="card-body">
        @yield('list_header')
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
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
                                            $func = $row['apply'][0];
                                            $content = $item[$row['apply'][1]];
                                            echo call_user_func_array($func, [$content])
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
                        <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite"><!-- Showing 1 to 10 of 57 entries -->
                            {{ $pager_total_item }}件
                            {{ $pager_begin }}~{{ $pager_end }}を表示
                            {{ $pager_current_page }}/{{ $pager_total_page}}ページ
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                             {!! $data->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>