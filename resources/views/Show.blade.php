@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Thông tin người dùng</div>
                    <div class="card-body"> 
                        <a href="{{ url('/user') }}">BACK</a>
                        <form action="" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Username:</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext"  value="{{ $userbyID->username }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Name:</label>
                                <div class="col-sm-10">
                                  <input type="text" readonly class="form-control" name='name' value="{{ $userbyID->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3"  class="col-sm-2 col-form-label">Email:</label>
                                <div class="col-sm-10">
                                  <input type="email" readonly class="form-control" name='email' value="{{ $userbyID->email }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Ví :</label>
                                <div class="col-sm-10">
                                  <input type="text" readonly class="form-control" name='vi' value="{{ $userbyID->vi }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Money :</label>
                                <div class="col-sm-10">
                                  <input type="text" readonly class="form-control" name='name' value="{{ $userbyID->money }}$">
                                </div>
                            </div>
                            <div class="export">
                             <a href ="{{ route('user.edit', Auth::id()) }}" class="btn btn-info export" id="export-button"> Chỉnh sửa </a>
                        	</div>
                        	<br>
                        	<div class="export">
                             <a href ="{{ route('changepass.edit', Auth::id()) }}" class="btn btn-info export" id="export-button"> Đổi mật khẩu </a>
                        	</div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
