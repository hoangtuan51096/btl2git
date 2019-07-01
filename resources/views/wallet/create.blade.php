@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Tạo Ví</div>
                    <div class="card-body"> 
                        <a href="{{ url('/home') }}">BACK</a>
                        <form action="{{ route('wallet.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
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
                                  <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Money :</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="money">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-info" name="submit_add" value="Add" />
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
