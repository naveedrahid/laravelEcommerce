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
      <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Product Name</label>
                                <input type="text" id="inputName" name="product_title" class="form-control @error('product_title') is-invalid @enderror">
                                @error('product_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputClientCompany">Product Qnty</label>
                                <input type="number" id="inputClientCompany" name="product_qnty" class="form-control @error('product_qnty') is-invalid @enderror">
                                @error('product_qnty')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Product Status</label>
                                <select id="inputStatus" class="form-control custom-select" name="product_status">
                                    <option selected disabled>Select one</option>
                                    <option value="draft">draft</option>
                                    <option value="publish">publish</option>
                                </select>
                            </div>
                        </div>
                    </div>
            <!-- /.card-body -->
                </div>
            <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputStatus">Product Category</label>
                                <select id="inputStatuscat" class="form-control custom-select" name="category_id">
                                    @foreach (App\Models\Category::all() as $model)
                                        @php
                                            $i = [];
                                            $i = $model->getAttributes();
                                        @endphp
                                        <option value="{{$i['id']}}">{{$i['cat_title']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Product Price</label>
                                <input type="number" name="amount" class="form-control" id="amount">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Product Description</label>
                                <textarea id="inputDescription" name="product_desc" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Short Desc</label>
                                <input type="text" id="inputEstimatedBudget" name="product_short_desc" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputSpentBudget">Product Image</label>
                                <input type="file" name="product_image" id="product_img">
                            </div>
                        </div>
                <!-- /.card-body -->
                    </div>
                <!-- /.card -->
                </div>
            </div>
            <div class="col-12">
                <a href="{{ url('/')}}" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Add Product" class="btn btn-success float-right">
            </div>
        </div>


      </form>
  </section>
@endsection
