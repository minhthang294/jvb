@extends('templates.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User
                <small>List</small>
            </h1>
        </div>

        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Full name</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $row)
                <tr class="odd gradeX" align="center">
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->username}}</td>
                    <td>@if($row->role == 1)
                        Admin
                        @elseif($row->role == 2)
                        Sale
                        @elseif($row->role == 3)
                        Editor
                        @endif
                    </td>
                    <td>
                        @if($row->status == 1)
                        Active
                        @else
                        Locked
                        @endif
                    </td>
                    <td class="center">
                        <form method="POST" action="{{ url('/admin/delete/')}}/{{$row->id}}" onclick="return confirm('Are you sure to delete {{$row->name}}?')">
                            @method('DELETE')
                            @csrf
                            <button type="submit"><i class="fa fa-trash-o  fa-fw"></i></button>
                        </form>
                    </td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ url('/admin/edituser') }}/{{$row->id}}">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.row -->
</div>
@endsection