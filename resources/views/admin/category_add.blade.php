extends('templates.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Category
                <small>Add</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            <form action="" method="POST">
                <div class="form-group">
                    <label>Category Name</label>
                    <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" />
                </div>
                <div class="form-group">
                    <label>Category Order</label>
                    <input class="form-control" name="txtOrder" placeholder="Please Enter Category Order" />
                </div>
                <button type="submit" class="btn btn-default">Category Add</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <form>
        </div>
    </div>
    <!-- /.row -->
</div>
@endsection