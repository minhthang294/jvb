@extends('templates.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Category
                <small>Edit</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            <form action="{{ url('/admin/updatecate') }}/{{$category->id}}" method="POST">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label>Category Name</label>
                    <input class="form-control" name="name" value="{{$category->name}}" />
                </div>
                <div class="form-group">
                    <label>Category Order</label>
                    <input type="number" class="form-control" name="index" value="{{$category->index}}" />
                </div>
                <button type="submit" class="btn btn-default">Category Edit</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <form>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
@endsection