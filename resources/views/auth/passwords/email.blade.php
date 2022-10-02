@extends('frontPage.masterFile.layout')

@section('content')
    <section class="signup__area po-rel-z1 pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="sign__wrapper white-bg">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf


                            <label for="email">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12 mb-5">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <button type="submit" class="btn-tp w-100 mt-5">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                    </form>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
