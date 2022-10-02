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
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Slider Add</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        {{-- <form action="{{route('admin.slider.store')}}" method="POST" enctype="multipart/form-data"> --}}
        <form action="{{route('admin.slider.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Slider Label</label>
                                    <input type="text" id="label_name" name="label_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Slider Title</label>
                                    <input type="text" id="slide_text" name="slide_text" class="form-control @error('slide_text') is-invalid @enderror">
                                    @error('slide_text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputSpentBudget">Slider Image</label>
                                    <input type="file" name="slide_img" id="slide_img" class="@error('slide_img') is-invalid @enderror">
                                    @error('slide_img')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">Slider Status</label>
                                    <select id="inputStatus" class="form-control custom-select" name="slide_status">
                                        <option selected disabled>Select one</option>
                                        <option value="draft">draft</option>
                                        <option value="published">published</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-12">
                    <a href="{{ url('/') }}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Add Slider" class="btn btn-success float-right">
                </div>
            </div>


        </form>
    </section>
@endsection
