@extends('templates.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User
                <small>Add</small>
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
            <form action="{{ url('admin/storeuser') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Full name</label>
                    <input class="form-control" name="name" placeholder="Please Enter Full Name" value="{{ old('name') }}" />
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Please Enter Username" value="{{ old('username') }}" />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Please Enter Password" />
                </div>
                <div class="form-group">
                    <label>Re-Enter Password</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Please Re-Enter Password" />
                </div>
                <div class="form-group" class="required">
                    <label>Role</label>
                    <label class="radio-inline">
                        <input name="role" value="1" type="radio">Admin
                    </label>
                    <label class="radio-inline">
                        <input name="role" value="2" type="radio">Sale
                    </label>
                    <label class="radio-inline">
                        <input name="role" value="3" type="radio">Editor
                    </label>
                </div>
                <div class="form-group">
                    <label class="radio-inline">
                        <input name="status" value="1" type="radio" checked hidden>
                    </label>
                </div>
                <button type="submit" class="btn btn-default">Add</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <form>
        </div>
    </div>
    <!-- /.row -->
</div>
@endsection