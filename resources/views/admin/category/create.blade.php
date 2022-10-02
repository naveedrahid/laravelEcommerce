@extends('admin.adminLayout.adminMaster')
@section('admin')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Product Add</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active">Product Add</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
      <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Category Name</label>
                                <input type="text" id="inputName" name="cat_title" class="form-control">

                            </div>
                        </div>
                    </div>
            <!-- /.card-body -->
                </div>
            <!-- /.card -->
            </div>
            <div class="col-12">
                <a href="{{ url('/')}}" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Add Category" class="btn btn-success float-right">
            </div>
        </div>
      </form>
  </section>
@endsection