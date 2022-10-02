@extends('admin.adminLayout.adminMaster')
@section('admin')

{{-- @error('product_qnty') is-invalid @enderror --}}


  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active">Product Edit</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    {{-- {{route('admin.products.update', $product->id)}} --}}
      <form action="{{route('admin.category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Category Name</label>
                                <input type="text" id="cat_title" value="{{$category->cat_title}}" name="cat_title" class="form-control @error('cat_title') is-invalid @enderror">

                            </div>
                        </div>
                    </div>
            <!-- /.card-body -->
                </div>
            <!-- /.card -->
            </div>
            <div class="col-12">
                <a href="{{ route('admin.category.index')}}" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Update Category" class="btn btn-success float-right">
            </div>
        </div>


      </form>
  </section>

@endsection
