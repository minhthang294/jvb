@extends('templates.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User
                <small>Edit</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="col-lg-7" style="padding-bottom:120px">
            <form action="{{ url('admin/updateuser') }}/{{ $user->id }}" method="POST">
                @method('PATCH')
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="form-group">
                    <label>Full name</label>
                    <input class="form-control" name="name" placeholder="Please Enter Full Name" value="{{ $user->name }}" />
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Please Enter Username" value="{{ $user->username }}" />
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role">
                        <option value="1" {{ ($user->role == "1")? "selected":""}}>Admin</option>
                        <option value="2" {{ ($user->role == "2")? "selected":""}}>Sale</option>
                        <option value="3" {{ ($user->role == "3")? "selected":""}}>Editor</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <label class="radio-inline">
                        <input name="status" value="1" type="radio" {{ ($user->status == "1")? "checked":""}}>Active
                    </label>
                    <label class="radio-inline">
                        <input name="status" value="2" type="radio" {{ ($user->status == "2")? "checked":""}}>Lock
                    </label>
                </div>
                <button type="submit" class="btn btn-default">Update</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <form>
        </div>
    </div>
    <!-- /.row -->
</div>
@endsection