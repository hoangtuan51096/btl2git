@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Them danh muc</div>
                    <div class="card-body"> 
                        <a href="{{ url('/home') }}">BACK</a>
                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <input type="hidden" name='user_id' value="{{ Auth::id() }}">
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3"  class="col-sm-2 col-form-label">Values :</label>
                                <div class="col-sm-10">
                                    <input  type="text" class="form-control @error('values') is-invalid @enderror" name="values" value="{{ old('values') }}" required autocomplete="values" autofocus>
                                    @error('values')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Resource :</label>
                                <div class="col-sm-10">
                                    <input  type="text" class="form-control @error('resource') is-invalid @enderror" name="resource" value="{{ old('resource') }}" required autocomplete="resource" autofocus>
                                    @error('resource')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Thu/Chi :</label>
                                <label class="radio-inline"><input type="radio" name="type" value="0">Thu</label>
                                <br>
                                <label class="radio-inline"><input type="radio" name="type" value="1">Chi</label>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-info" name="submit_add" value="Add" />
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
