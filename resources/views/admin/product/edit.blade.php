@extends('admin.adminLayout.adminMaster')
@section('admin')

{{-- @error('product_qnty') is-invalid @enderror --}}


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
            <li class="breadcrumb-item active">Product Edit</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
      <form action="{{route('admin.products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if($errors->any())
            <div class="alert alert-danger">
                <p><strong>Opps Something went wrong</strong></p>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Product Name</label>
                                <input type="text" id="inputName" value="{{$product->product_title}}" name="product_title" class="form-control @error('product_title') is-invalid @enderror">
                                @error('product_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputClientCompany">Product Qnty</label>
                                <input type="text" id="inputClientCompany" name="product_qnty" class="form-control  @error('product_qnty') is-invalid @enderror" value="{{$product->product_qnty}}">
                                @error('product_qnty')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Product Status</label>
                                <select id="inputStatus" class="form-control custom-select" name="product_status">
                                    <option value="draft" {{ ($product->product_status=="draft") ? "selected" : ""  }}  >draft</option>
                                    <option value="publish" {{ ($product->product_status=="publish") ? "selected" : ""  }} >publish</option>
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
                                   @foreach ($category as $category)
                                        <option value="{{$category->id}}"

                                         {{   ($product->category_id == $category->id) ? "selected" : "" }}

                                            >{{$category->cat_title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Product Price</label>
                                <input type="number" name="amount" class="form-control" id="amount" value="{{$product->amount}}">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Product Description</label>
                                <textarea id="inputDescription" name="product_desc" class="form-control" rows="4">{{$product->product_desc}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Short Desc</label>
                                <input type="text" id="inputEstimatedBudget" name="product_short_desc" class="form-control" value="{{$product->product_short_desc}}">
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
