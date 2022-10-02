@extends('frontPage.masterFile.layout')
@section('content')


<!-- signin__area start -->
<section class="signin__area po-rel-z1 pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                <div class="sign__wrapper white-bg">

                <div class="sign__form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="sign__input-wrapper mb-25">
                            <h5>Email</h5>
                            <div class="sign__input">
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="e-mail address">
                            <i class="fal fa-envelope"></i>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="sign__input-wrapper mb-10">
                            <h5>Password</h5>
                            <div class="sign__input">
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                            <i class="fal fa-lock"></i>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="sign__action d-sm-flex justify-content-between mb-30">
                            <div class="sign__agree d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            <div class="sign__forgot">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-tp w-100">
                            {{ __('Login') }}
                        </button>
                        <div class="sign__new text-center mt-20">
                            <p>New to Markit? <a href="{{route('register')}}">Sign Up</a></p>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- signin__area end -->
@endsection
