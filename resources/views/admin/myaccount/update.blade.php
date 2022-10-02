@extends('admin.adminLayout.adminMaster')
@section('admin')
    <section class="content">

        <!-- Default box -->
        <div class="container">
            <h1 class="text-center py-5">Order Summery</h1>
            @foreach ($orders as $order)
                <div class="row py-5">
                    <div class="col-md-4">
                        <div class="cutomer_info">
                            <h5>Customer Info</h5>
                            <p>First Name: {{$order->first_name}}</p>
                            <p>Last Name: {{$order->last_name}}</p>
                            <p>Email: {{$order->email}}</p>
                            <p>Phone: {{$order->phone}}</p>
                            <p>Country Name: {{$order->country_name}}</p>
                            <p>City Name: {{$order->city_name}}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="order_detail">
                            <p>Order ID#{{$order->id}}</p>
                            <p>
                                Payment Type:
                                @if($order->payment_type == 'cash_on_delivery')
                                    <span>Cash On Delivery</span>
                                @else
                                    <span>Cars Stripe</span>
                                @endif
                            </p>
                            <p>Order Total: {{$order->order_total}}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="Order_place">
                            <p>Shipping Address</p>
                            <p>{{$order->customer_address}}</p>
                            <p>
                                <form action="{{ route('admin.customer_update', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                    <select id="inputStatuscat" class="form-control custom-select" name="order_status">
                                        <option>processing</option>
                                        <option>complete</option>
                                        <option>On Hold</option>
                                        <option>Cancelled</option>
                                        <option>Refund</option>
                                    </select>
                                    <button class="btn btn-success float-right my-5" type="submit">Update Status</button>
                                </form>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th style="width:70%">
                                    Product Name
                                </th>
                                <th style="width:10%">
                                    Cost
                                </th>
                                <th style="width:10%">
                                    QTY
                                </th>
                                <th style="width:10%">
                                    Total
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                @foreach($order->order_items as $item)

                                    <tr>
                                        <td>
                                            @php
                                                $similar_product = App\Models\Product::find($item->product_id)
                                            @endphp
                                            {{$similar_product->product_title}}
                                        </td>
                                        <td>{{$item->price}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->line_sum}}</td>


                                    </tr>
                                @endforeach
                                <tr>
                                    <th colspan="4">
                                        <h4 style="float:right;">Order Total:  {{ $order->order_total_sum  }}</h4>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

    </section>

@endsection
