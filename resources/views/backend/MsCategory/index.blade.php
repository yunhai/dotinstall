@extends('layouts.backend.master')
@section('title', 'カテゴリー')
@section('content')
    <div class="card">
        <div class="card-header"><i class="fa fa-list"></i> カテゴリー</div>
        <div class="card-body">
            <div class="col-lg-12">
                <div class="form-group float-right">
                    <a class="btn btn-primary btn-sm" href="/backend/category/create">新規</a>
                </div>
            </div>
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <table width="100%" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>カテゴリー名</th>
                                    <th>表示順序</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ms_categories as $category)
                                <tr class="even">
                                    <td style="width: 5%">
                                        {{ $category->id }}
                                    </td>
                                    <td style="width: 25%">
                                        {{ $category->name }}
                                    </td>
                                    <td>
                                        {{ $category->sort }}
                                    </td>
                                    <td style="width: 20%;" class="text-center">
                                        <a class="btn btn-info btn-sm" href="/backend/category/edit/{{ $category->id }}">編集</a>
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
                                {{$ms_categories->total()}}件  {{($ms_categories->currentpage()-1)*$ms_categories->perpage()+1}}~{{$ms_categories->currentpage()*$ms_categories->perpage()}}を表示 {{$ms_categories->currentPage()}}/{{$ms_categories->count()}}ページ
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                 {!! $ms_categories->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop