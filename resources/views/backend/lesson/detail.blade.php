@extends('backend.layout.master')
@section('title', 'lesson_media一覧')
@section('content')
    <div class="card">
        <div class="card-header"><i class="fa fa-list"></i> lesson_media一覧</div>
        <div class="card-body">
            <div class="col-lg-12">
                <div class="form-group float-right">
                    <a class="btn btn-primary btn-sm" href="/backend/lesson/{{ $id }}/detail/create">新規</a>
                </div>
            </div>
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <table width="100%" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>lesson_media名</th>
                                    <th>レッスン一名</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lesson_media as $lesson)
                                <tr class="even">
                                    <td style="width: 5%">
                                        {{ $lesson->id }}
                                    </td>
                                    <td style="width: 25%">
                                        {{ $lesson->name }}
                                    </td>
                                    <td style="width: 25%">
                                        {{ $lesson->media_count }}
                                    </td>
                                    <td style="width: 20%;" class="text-center">
                                        <a class="btn btn-info btn-sm" href="/backend/lesson/{{ $lesson->id }}/detail/edit">編集</a>
                                        <a href="/backend/lesson/{{ $lesson->id }}/detail/delete" class="btn btn-danger btn-sm" onclick="return confirm('削除してよろしいですか？');">削除</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- pagination -->
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite"><!-- Showing 1 to 10 of 57 entries -->
                                {{$lesson_media->total()}}件  {{($lesson_media->currentpage()-1)*$lesson_media->perpage()+1}}~{{$lesson_media->currentpage()*$lesson_media->perpage()}}を表示 {{$lesson_media->currentPage()}}/{{$lesson_media->count()}}ページ
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                 {!! $lesson_media->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
