@extends('backend.layout.master')
@section('title', 'Detail')
@section('content')
    <div class="card">
        <div class="card-header"><i class="fa fa-list"></i> DETAIL</div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <table width="100%" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>header 1</th>
                                    <th>header 2</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="even">
                                    <td style="width: 5%">
                                        1
                                    </td>
                                    <td style="width: 25%">
                                    </td>
                                    <td>
                                        lorem ipsum
                                    </td>
                                    <td style="width: 30%" class="text-center">
                                        <input type="file" class="btn btn-file btn-info btn-sm text-white" title=' <i class="fa fa-plus-square"></i> エクセルファイル導入'>
                                        <input type="button" class="btn btn-info btn-sm" value='一括送信'>
                                    </td>
                                </tr>
                                <tr class="old">
                                    <td style="width: 5%">
                                        2
                                    </td>
                                    <td style="width: 25%">
                                    </td>
                                    <td>
                                        lorem ipsum
                                    </td>
                                    <td style="width: 20%;" class="text-center">
                                        <input type="file" class="btn btn-file btn-info btn-sm text-white" title=' <i class="fa fa-plus-square"></i> エクセルファイル導入'>
                                        <input type="button" class="btn btn-info btn-sm" value='一括送信'>
                                    </td>
                                </tr>
                                <tr class="even">
                                    <td style="width: 5%">
                                        3
                                    </td>
                                    <td style="width: 25%">
                                    </td>
                                    <td>
                                        lorem ipsum
                                    </td>
                                    <td style="width: 20%;" class="text-center">
                                        <input type="file" class="btn btn-file btn-info btn-sm text-white" title=' <i class="fa fa-plus-square"></i> エクセルファイル導入'>
                                        <input type="button" class="btn btn-info btn-sm" value='一括送信'>
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