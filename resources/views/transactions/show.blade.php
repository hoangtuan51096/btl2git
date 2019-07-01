@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Danh muc </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('search') }}" method="POST">
                        @csrf
                            <div class="row">
                                <input type="hidden" name="id" value="{{ Auth::id() }}">
                                <select name="type">
                                    <option>Chon loai loc</option>
                                    <option value="0">Danh muc</option>
                                    <option value="1">Ngay gio</option>
                                </select>
                                <input type="text" name="values" value="{{ session('searchgiaodich') }}">
                                <input type="submit" class="btn btn-info" name="Search" value="Search">
                            </div><br>
                            <div class="export">
                                <a href ="{{ route('export') }}" class="btn btn-info export" id="export-button"> Export file </a>
                            </div><br>
                        </form>
                        <table border="1" cellspacing="0" cellpadding="10">
                            <tr>
                                <th>ID</th>
                                <th>From_wallet_id</th>
                                <th>To_wallet_id</th>
                                <th>Values</th>
                                <th>Type</th>
                                <th>Desc</th>
                                <th>Create_time</th>
                            </tr>
                            @foreach($data as $key => $transaction)
                                <tr>
                                    <td>{{ $key + 1}}</td>
                                    <td>{{ $transaction->fromWallet->user->username }}</td>
                                    <td>{{ $transaction->toWallet->user->username }}</td>
                                    <td>{{ number_format($transaction->values) }}$</td>
                                    @if($transaction->fromWallet->user_id == Auth::id() && $transaction->type == 0)
                                        <td>Gui tien</td>
                                    @elseif($transaction->toWallet->user_id == Auth::id() && $transaction->type == 0)
                                        <td>Nhan tien</td>
                                    @else
                                        <td>Thu/Chi</td>
                                    @endif
                                    <td>{{ $transaction->desc }}</td>
                                    <td>{{ $transaction->created_at }}</td>
                                </tr>
                            @endforeach
                    </table>
                    <br>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
