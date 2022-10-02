@extends('frontPage.masterFile.layout')
@section('page-title', 'Checkout')

@section('content')
    {{-- {{dd(Auth::user()->id)}} --}}

    <!-- checkout-area start -->
    <section class="checkout-area pb-85 pt-5">
        <div class="container">
            <div class="panel-body">
                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
                <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                    data-cc-on-file="false"
                    data-stripe-publishable-key="pk_test_51LehAwDsdN9q4plZnOjngwrTDKHhvqjjVXUsjMeFt1hb8D6Rpe6d7PJZtZdOxYsjNKUyD1aZmvAVI0AFTFPCp2hD00piCFLtse"
                    id="payment-form">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkbox-form">
                                <h3>Billing Details</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>First Name <span class="required">*</span></label>
                                            <input type="text" name="first_name" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Last Name <span class="required">*</span></label>
                                            <input type="text" name="last_name" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Address <span class="required">*</span></label>
                                            <input type="text" name="customer_address" placeholder="Street address">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Town / City <span class="required">*</span></label>
                                            <input type="text" name="city_name" placeholder="Town / City">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>State / County <span class="required">*</span></label>
                                            <input type="text" name="country_name" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Postcode / Zip <span class="required">*</span></label>
                                            <input type="text" name="zip_code" placeholder="Postcode / Zip">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Email Address <span class="required">*</span></label>
                                            <input type="email" name="email" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Phone <span class="required">*</span></label>
                                            <input type="text" name="phone" placeholder="Postcode / Zip">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="your-order mb-30 ">
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($items as $item)
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        {{ $item->name }} <strong class="product-quantity"> ×
                                                            {{ $item->quantity }}</strong>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">${{ $item->price }}.00</span>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount">${{ \Cart::getTotal() }}</span></td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount">${{ \Cart::getTotal() }}</span></strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="cash_on_delivery" name="payment_method" type="radio"
                                        value="cash_on_delivery" class="custom-control-input pay_methods" required>
                                    <label class="custom-control-label" for="cash_on_delivery">Cash On Delivery</label>
                                </div>

                                <div class="custom-control custom-radio">
                                    <input id="stripe" name="payment_method" type="radio" value="stripe"
                                        class="custom-control-input pay_methods" required>
                                    <label class="custom-control-label" for="stripe">Stripe</label>
                                </div>
                                <div id="stripe_div">
                                    <div class='form-row row' id="stripe_div">
                                        <div class='col-xs-12 form-group required'>
                                            <label class='control-label'>Name on Card</label> <input class='form-control'
                                                size='4' type='text'>
                                        </div>
                                    </div>
                                    <div class='form-row row'>
                                        <div class='col-xs-12 form-group card required'>
                                            <label class='control-label'>Card Number</label> <input autocomplete='off'
                                                class='form-control card-number' value='4242424242424242' size='20'
                                                type='text'>
                                        </div>
                                    </div>
                                    <div class='form-row row'>
                                        <div class='col-xs-12 col-md-4 form-group cvc required'>
                                            <label class='control-label'>CVC</label> <input autocomplete='off'
                                                class='form-control card-cvc' placeholder='ex. 311' size='4'
                                                type='text' value='123'>
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                            <label class='control-label'>Expiration Month</label> <input
                                                class='form-control card-expiry-month' value='12' placeholder='MM'
                                                size='2' type='text'>
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                            <label class='control-label'>Expiration Year</label> <input
                                                class='form-control card-expiry-year' value='27' placeholder='YYYY'
                                                size='4' type='text'>
                                        </div>
                                    </div>
                                </div>
                                <div id="paypal_div">&nbsp;</div>
                            </div>
                            <button class="btn-tp-2" type="submit">Pay Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection



@push('newscript')
    <script>
        $(function() {
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');
                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }
            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
            $("#stripe_div").hide();
            $("#paypal_div").hide();

            $('.pay_methods').on('click', function(e) {

                if ($(this).val() == "stripe") {
                    $("#stripe_div").show();
                } else if ($(this).val() == "cash_on_delivery") {
                    $("#paypal_div").show();
                    $("#stripe_div").hide();
                } else {
                    $("#stripe_div").hide();
                    $("#paypal_div").hide();
                }
            });
        });

    </script>
@endpush
