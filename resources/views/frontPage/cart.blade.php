@extends('frontPage.masterFile.layout')
@section('page-title', 'Cart')

@section('content')
    <!-- cart-area start -->
    <section class="cart-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="table-content table-responsive">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="product-price">Unit Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                    <th class="product-update">Update</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($items as $row)
{{--                                     {{dd($row)}}--}}
                                    <tr>
                                        <td class="product-thumbnail"><a href="product-details.html"><img
                                                    src="{{ asset($row->product_image) }}" alt=""></a></td>
                                        <td class="product-name"><a href="product-details.html">{{ $row->name }}</a></td>
                                        <td class="product-price"><span class="amount">${{ $row->price }}</span></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus"><input class="quantity" type="text"
                                                    value="{{ $row->quantity }}">
                                                <div class="dec qtybutton">-</div>
                                                <div class="inc qtybutton">+</div>
                                                <div class="dec qtybutton">-</div>
                                                <div class="inc qtybutton">+</div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal"><span
                                                class="amount">${{ $row->price * $row->quantity }}</span></td>
                                        <td class="product-remove"><a href="{{ route('remove.product', $row->id) }}"><i
                                                    class="fa fa-times"></i></a></td>
                                        <td class="product-update"><a href="javascript:void(0)" class="btn-tp-2 update-cart"
                                                name="update_product" data-token="{{ csrf_token() }}"
                                                data-id="{{ $row->id }}">Update cart</a></td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                    @if (count($items) == 0)
                    <h2 class="text-center">No Item In Your cart Return <a href="{{ url('/') }}" style="text-decoration: underline;">Shop</a></h2>
                    @endif
                    <div class="row justify-content-end">
                        <div class="col-md-5">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul class="mb-20">
                                    <li>Subtotal <span>${{ \Cart::getSubTotal() }} </span></li>
                                    <li>Total <span>${{ \Cart::getTotal() }}</span></li>
                                </ul>
                                @if (count($items) == 0)

                                @else

                                <a class="btn-tp-2" href="{{route('checkout')}}">Proceed to checkout</a>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- cart-area end -->
@endsection

@push('script')
    <script>
        $(".update-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update.cart') }}',
                method: 'patch',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });
    </script>
@endpush
