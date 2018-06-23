@extends('layouts.backend.master')
@section('title', '管理者パスワード変更')
@section('content')
    <div class="card">
        <div class="card-header"><i class="fa fa-fw fa-lock"></i> 管理者パスワード変更</div>
        <div class="card-body">
            <form action="/" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="aside">前のパスワード</td>
                            <td>
                                <input name="" class="form-control" id=""></input>
                            </td>
                            <td class="desc"></td>
                        </tr>
                        <tr>
                            <td class="aside">新しいパスワード</td>
                            <td>
                                <input name="" class="form-control" id=""></input>
                            </td>
                            <td class="desc"></td>
                        </tr>
                        <tr>
                            <td class="aside">確認パスワード</td>
                            <td>
                                <input name="" class="form-control" id=""></input>
                            </td>
                            <td class="desc"></td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary btn-sm" value="更新">
                </div>
            </form>
        </div>
    </div>
@stop