@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Thuc hien giao dich</div>
                    <div class="card-body"> 
                        <a href="{{ url('/home') }}">BACK</a>
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ route('transaction.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <input type="hidden" name="from_wallet_id" value="{{ Auth::id() }}">
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3"  class="col-sm-2 col-form-label">Nguoi nhan :</label>
                                <div class="col-sm-10">
                                     <select name="to_wallet_id">
                                         <option value="">Chon Account</option>
                                         @foreach($data_user as $user)
                                            <option value="{{ $user->id }}">{{ $user->username }}</option>
                                         @endforeach
                                     </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label" required >So tien :</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="values">
                                  @error('values')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Noi dung :</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="desc">
                                </div>
                            </div>
                            <div class="form-group row">
                                <input type="hidden" name="type" value="0">
                            </div>
                            <input type="submit" class="btn btn-info" name="submit_add" value="Add" />
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
