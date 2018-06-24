@extends('layouts.backend.master')
@section('content')
    <div class="card">
        <div class="card-header"><i class="fa fa-edit"></i> カテゴリー</div>
        <div class="card-body">
            <form method="post">
                @csrf
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="aside">カテゴリー名</td>
                            <td>
                                <input name="ms_category[name]" class="form-control" id=""></input>
                            </td>
                            <td class="desc"></td>
                        </tr>
                        <tr>
                            <td class="aside">表示順序</td>
                            <td>
                                <input name="ms_category[sort]" class="form-control" id=""></input>
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
