@extends('admin.adminLayout.adminMaster')
@section('admin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Projects</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Projects</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Orders List</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    {{-- <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button> --}}
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 10%">
                            Order ID
                        </th>
                        <th style="width: 15%">
                            Customer Name
                        </th>
                        <th style="width: 15%">
                            Address
                        </th>
                        <th style="width: 10%">
                           Country
                        </th>
                        <th style="width: 10%">
                            City
                        </th>
                        <th style="width: 5%">
                            Total
                        </th>
                        <th style="width: 10%">
                            Phone
                        </th>
                        <th style="width: 10%">
                            Order Status
                        </th>
                        <th style="width: 10%">
                            Card/Cash
                        </th>
                        <th style="width: 5%">
                            Order Detail                           
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>#{{$order->id}}</td>
                                <td>{{$order->first_name . ' ' . $order->last_name}}</td>
                                <td>{{$order->customer_address}}</td>
                                <td>{{$order->country_name}}</td>
                                <td>{{$order->city_name}}</td>
                                <td>{{$order->order_total}}</td>
                                <td>{{$order->phone}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>
                                @if($order->payment_type == 'cash_on_delivery')
                                    <span>Cash On Delivery</span>
                                @else
                                    <span>Card Stripe</span>
                                @endif
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.edit', $order->id) }}">
                                        Edit
                                        <i class="fas fa-eye">
                                        </i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
