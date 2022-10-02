@extends('frontPage.masterFile.layout')
@section('page-title', 'My Account')

@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="container">

            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-8">

                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width:20%">
                                        Order ID
                                    </th>
                                    <th style="width:30%">
                                        Date
                                    </th>
                                    <th style="width:30%">
                                        Order Status
                                    </th>
                                    <th style="width:20%">
                                       View Order
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>
                                            #{{$order->id}}
                                        </td>
                                        <td>
                                            {{$order->created_at->format('d M Y')}}
                                        </td>
                                        <td>
                                            @switch($order->order_status)
                                                @case('complete')
                                                    <button class="btn btn-success">complete</button>
                                                    @break
                                                @case('on-hold')
                                                    <button class="btn btn-warning">On Hold</button>
                                                    @break
                                                @case('cancelled')
                                                    <button class="btn btn-danger">Cancelled</button>
                                                    @break
                                                @case('refund')
                                                    <button class="btn btn-dark">Refund</button>
                                                    @break
                                                @default
                                                    <button class="btn btn-secondary">Processing</button>
                                            @endswitch
                                        </td>
                                        <td>
                                            <a href="{{route('order', $order->id)}}" class="btn-tp-2">View Detail</a>
                                        </td>
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
