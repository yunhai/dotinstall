@extends('layouts.backend.master')
@section('title', 'List')
@section('content')
    <div class="card">
        <div class="card-header"><i class="fa fa-list"></i> ユーザー</div>
        <div class="card-body">
            <div class="col-lg-12">
                <div class="form-group float-right">
                    <a class="btn btn-primary btn-sm" href="">新規</a>
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
                                <tr class="even">
                                    <td style="width: 5%">
                                        1
                                    </td>
                                    <td style="width: 25%">
                                        username
                                    </td>
                                    <td>
                                        your@example.com
                                    </td>
                                    <td style="width: 20%;" class="text-center">
                                        <a class="btn btn-info btn-sm text-white">閲覧</a>
                                        <!-- <a class="btn btn-info btn-sm text-white">更新</a> -->
                                    </td>
                                </tr>
                                <tr class="old">
                                    <td style="width: 5%">
                                        2
                                    </td>
                                    <td style="width: 25%">
                                        username
                                    </td>
                                    <td>
                                        your@example.com
                                    </td>
                                    <td style="width: 20%;" class="text-center">
                                        <a class="btn btn-info btn-sm text-white">閲覧</a>
                                        <!-- <a class="btn btn-info btn-sm text-white">更新</a> -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- pagination -->
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                    <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                    <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop