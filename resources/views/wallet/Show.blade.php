@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Thông tin Ví</div>
                    <div class="card-body"> 
                        <a href="{{ url('/home') }}">BACK</a>
                        <br>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(empty($wallet))
                            <a href="{{ route('wallet.create') }}" class="btn btn-secondary">TẠO VÍ</a>
                        @else
                        <form action="" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">ID Wallet:</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext"  value="{{ $wallet->user_id }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Username:</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext"  value="{{ Auth::user()->username }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Name:</label>
                                <div class="col-sm-10">
                                  <input type="text" readonly class="form-control" value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3"  class="col-sm-2 col-form-label">Name wallet:</label>
                                <div class="col-sm-10">
                                  <input type="text" readonly class="form-control" value="{{ $wallet->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Money :</label>
                                <div class="col-sm-10">
                                  <input type="text" readonly class="form-control" value="{{ number_format($wallet->money) }}$">
                                </div>
                            </div>
                            <form action="{{ route('wallet.destroy', $wallet->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input onclick="return confirm('Ban co chac muon xoa vi nay hay khong?');" type="submit" class="btn btn-danger" value="DELETE" name="delete"/>
                            </form>
                        </form>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
