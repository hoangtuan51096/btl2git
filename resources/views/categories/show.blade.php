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
                        <a href="{{ route('category.create') }}">ADD</a>
                        <table border="1" cellspacing="0" cellpadding="10">
                            <tr>                           
                                <td>User_ID</td>
                                <td>Values</td>
                                <td>Resource</td>
                                <td>Type</td>
                                <td>Create_time</td>
                            </tr>
                            @foreach($category as $category)
                                <tr>
                                    <td>{{ $category->user_id }}</td>
                                    <td>{{ number_format($category->values) }}$</td>
                                    <td>{{ $category->resource }}</td>
                                    @if($category->type == 0)
                                        <td>Thu</td>
                                    @else
                                        <td>Chi</td>
                                    @endif
                                    <td>{{ $category->created_at }}</td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
