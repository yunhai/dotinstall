@extends('backend.layout.master')
@section('title', 'ユーザー')
@section('content')
    <div class="card">
        <div class="card-header"><i class="fa fa-list"></i> ユーザー</div>
        <div class="card-body">
            <div class="col-lg-12">
                <div class="form-group float-right">
                    <a class="btn btn-primary btn-sm" href="/backend/ms_category/create">新規</a>
                </div>
            </div>
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <table width="100%" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ユーザー名</th>
                                    <th>メールアドレス</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr class="even">
                                    <td style="width: 5%">
                                        {{ $user->id }}
                                    </td>
                                    <td style="width: 25%">
                                        {{ $user->name }}
                                    </td>
                                    <td style="width: 25%">
                                        {{ $user->email }}
                                    </td>
                                    <td style="width: 20%;" class="text-center">
                                        <a class="btn btn-info btn-sm" href="/backend/user/{{ $user->id }}/edit">編集</a>
                                        <a href="/backend/ms_category/{{ $user->id }}/delete" class="btn btn-danger btn-sm" onclick="return confirm('削除してよろしいですか？');">削除</a>
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
                                {{$users->total()}}件  {{($users->currentpage()-1)*$users->perpage()+1}}~{{$users->currentpage()*$users->perpage()}}を表示 {{$users->currentPage()}}/{{$users->count()}}ページ
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                 {!! $users->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
