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
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Product Edit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <form action=" {{route('admin.order.update', $order->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
        @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Order Date:</strong> {{ $order->created_at->toDateString() }}</p>
                    <p><strong>Order Id:</strong> #{{ $order->id }}</p>
                    <p><strong>First Name:</strong> {{ $order->first_name}}</p>
                    <p><strong>Last Name:</strong> {{$order->last_name }}</p>
                    <p><strong>User Name:</strong> {{ $order->user_name }}</p>
                    <p><strong>User Email:</strong> {{ $order->email }}</p>
                    <p><strong>Phone Number:</strong> {{ $order->phone }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Address:</strong> {{ $order->customer_address}}</p>
                    <p><strong>Country Name:</strong> #{{ $order->country_name }}</p>
                    <p><strong>City Name:</strong> {{ $order->city_name}}</p>
                    <p class="order_total"><strong>Totla</strong><br> {{ $order->order_total}}</p>
                    <div class="form-group">
                        <label for="inputStatus">Order Status</label>
                        <select id="inputStatus" class="form-control custom-select" name="order_status">
                                <option value="processing" {{ ('processing' == $order->order_status) ? 'selected' : '' }}>processing</option>
                                <option value="on-hold" {{ ('on-hold' == $order->order_status) ? 'selected' : '' }}>on-hold</option>
                                <option value="complete" {{ ('complete' == $order->order_status) ? 'selected' : '' }}>complete</option>
                                <option value="cancelled" {{ ('cancelled' == $order->order_status) ? 'selected' : '' }}>cancelled</option>
                                <option value="refund" {{ ('refund' == $order->order_status) ? 'selected' : '' }}>refund</option>

                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <a href="" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Update Order" class="btn btn-success float-right">
                </div>
            </div>


        </form>
    </section>
@endsection
