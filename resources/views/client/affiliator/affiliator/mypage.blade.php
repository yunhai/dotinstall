@extends('client.layout.master')
@section('title', 'マイページ')
@section('content')
<div class="card">
<div class="card-header">
    <i class="fa fa-list"></i>
    マイページ
</div>
<div class="card-body">

    <div class="d-block">
        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table width="100%" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>URL</th>
                                <th>姓名</th>
                                <th>メールアドレス</th>
                                <th>パス</th>
                                <th>料金率</th>
                                <th>利益</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    @php $qrlink = route('register.affiliator', ['token' => $affiliator['token']]); @endphp
                                    <img src="https://chart.googleapis.com/chart?cht=qr&amp;chs=100x100&amp;chl={{ $qrlink }}">
                                </td>
                                <td>{{ $qrlink }}</td>
                                <td>{{ $affiliator['fullname'] }}</td>
                                <td>{{ $affiliator['email'] }}</td>
                                <td>{{ $affiliator['password'] }}</td>
                                <td>{{ $affiliator['commission_rate'] }} %</td>
                                <td>{{ $affiliator['balance'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop
