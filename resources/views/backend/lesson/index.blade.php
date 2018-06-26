@extends('backend.layout.master')
@section('title', 'レッスン一覧')
@section('content')
    <div class="card">
        <div class="card-header"><i class="fa fa-list"></i> レッスン一覧</div>
        <div class="card-body">
            <div class="col-lg-12">
                <div class="form-group float-right">
                    <a class="btn btn-primary btn-sm" href="/backend/lesson/create">新規</a>
                </div>
            </div>
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <table width="100%" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>レッスン一名</th>
                                    <th>メディアカウント</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lessons as $lesson)
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
                                        <a class="btn btn-info btn-sm" href="/backend/lesson/{{ $lesson->id }}/edit">編集</a>
                                        <a href="/backend/lesson/{{ $lesson->id }}/delete" class="btn btn-danger btn-sm" onclick="return confirm('削除してよろしいですか？');">削除</a>
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
                                {{$lessons->total()}}件  {{($lessons->currentpage()-1)*$lessons->perpage()+1}}~{{$lessons->currentpage()*$lessons->perpage()}}を表示 {{$lessons->currentPage()}}/{{$lessons->count()}}ページ
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                 {!! $lessons->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
