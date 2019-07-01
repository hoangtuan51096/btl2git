@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Thông tin người dùng</div>
                    <div class="card-body"> 
                        <a href="{{ route('user.show', Auth::id()) }}">BACK</a>
                        <form action="{{ route('user.update', Auth::id()) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Username:</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext"  value="{{ $userbyID->username }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name='name' value="{{ $userbyID->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3"  class="col-sm-2 col-form-label">Email:</label>
                                <div class="col-sm-10">
                                  <input type="email" readonly class="form-control" name='email' value="{{ $userbyID->email }}">
                                </div>
                            </div>
                            <input type="submit" name="submit_edit" value="Update" />
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
