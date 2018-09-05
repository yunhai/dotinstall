@extends('backend.layout.master')
@section('title', 'Youtubeリンク')
@section('content')
<div class="card">
    <div class="card-header">
        <i class="fa fa-list"></i>
        Youtubeリンク
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
                <div class="row">
                    <div class="col-sm-12">
                        <div id="dataTable_filter" class="dataTables_filter">
                            <label>
                                <a class="btn btn-primary btn-sm" href="{{ route('backend.youtube_link.create') }}">新規</a>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table width="100%" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Video名</th>
                                    <th>URL</th>
                                    <th>公開状況</th>
                                    <th>Display</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td style="width:40%">
                                        @if ($item->type == YOUTUBE_TYPE_VIDEO)
                                            <a href="https://www.youtube.com/embed/5b91dFhZz0g" target="_blank">https://www.youtube.com/embed/5b91dFhZz0g</a>
                                        @else 
                                            @php
                                                $path = '';
                                                if (!empty($item->media) && !empty(($item->media)->first())) {
                                                    $path = ($item->media)->first()->path;
                                                }
                                            @endphp
                                            <a href="@media_path($path)" target="_blank">@media_path($path)</a>
                                        @endif
                                    </td>
                                    <td style="width:10%" class="text-center">
                                        {{ $form['mode'][$item->mode] }}
                                    </td>
                                    <td style="width:10%" class="text-center">
                                        {{ $form['type'][$item->type] }}
                                    </td>
                                    <td style="width:15%" class="text-center">
                                        <a class="btn btn-info btn-sm" href="{{ route('backend.youtube_link.edit', ['youtube_link_id' => $item->id]) }}">編集</a>
                                        <a href="{{ route('backend.youtube_link.delete', ['youtube_link_id' => $item->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm(\'削除してよろしいですか？\');">削除</a>                                    
                                    </td>
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


@stop
