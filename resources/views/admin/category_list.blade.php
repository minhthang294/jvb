@extends('templates.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Category
                <small>List</small>
            </h1>
        </div>
        @if(session()->has('success_del'))
        <div class="alert alert-success">
            {{ session()->get('success_del') }}
        </div>
        @endif
        @if(session()->has('successupdate'))
        <div class="alert alert-success">
            {{ session()->get('successupdate') }}
        </div>
        @endif
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $row)
                <tr class="odd gradeX" align="center">
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->index }}</td>
                    <td class="center">
                        <form method="POST" action="{{ url('/admin/deletecate/')}}/{{$row->id}}" onclick="return confirm('Are you sure to delete {{$row->name}}?')">
                            @method('DELETE')
                            @csrf
                            <button type="submit"><i class="fa fa-trash-o  fa-fw"></i></button>
                        </form>
                    </td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ url('admin/editcate') }}/{{ $row->id }}">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.row -->
</div>
@endsection