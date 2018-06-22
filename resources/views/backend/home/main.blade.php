@extends('layouts.backend.master')
@section('content')
    <div class="card">
        <div class="card-header">My Dashboard</div>
        <div class="card-body">
            <form action="/" id="MessageAdminIndexForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="aside">TEXT INPUT 1</td>
                            <td>
                                <input name="" class="form-control" id=""></input>
                            </td>
                            <td class="desc"></td>
                        </tr>
                        <tr>
                            <td class="aside">TEXT INPUT 2</td>
                            <td>
                                <input name="" class="form-control" id=""></input>
                            </td>
                            <td class="desc"></td>
                        </tr>
                        <tr>
                            <td class="aside">TEXT</td>
                            <td>
                                <textarea name="" rows="5" class="form-control" cols="30" id=""></textarea>
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