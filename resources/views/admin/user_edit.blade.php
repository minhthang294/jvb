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
                <div class="form-group" class="required">
                    <label>Role</label>
                    <label class="radio-inline">
                        <input name="role" value="1" type="radio" {{ ($user->role == "1")? "checked":""}}>Admin
                    </label>
                    <label class="radio-inline">
                        <input name="role" value="2" type="radio" {{ ($user->role == "2")? "checked":""}}>Sale
                    </label>
                    <label class="radio-inline">
                        <input name="role" value="3" type="radio" {{ ($user->role == "3")? "checked":""}}>Editor
                    </label>
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