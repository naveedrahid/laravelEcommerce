@extends('frontPage.masterFile.layout')
@section('content')
<section class="signup__area po-rel-z1 pt-100 pb-100">
    <div class="container">
       <div class="row">
          <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
             <div class="sign__wrapper white-bg">
                <div class="sign__form">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                      <div class="sign__input-wrapper mb-25">
                         <h5> {{ __('Full Name') }}</h5>
                         <div class="sign__input">
                             <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Full name" required autocomplete="name" autofocus>
                            <i class="fal fa-user"></i>

                             @error('name')
                             <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror
                         </div>
                      </div>
                      <div class="sign__input-wrapper mb-25">
                         <h5>{{ __('E-Mail Address') }}</h5>
                         <div class="sign__input">
                             <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="e-mail address" required autocomplete="email">
                            <i class="fal fa-envelope"></i>

                             @error('email')
                             <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror
                         </div>
                      </div>
                      <div class="sign__input-wrapper mb-25">
                         <h5>{{ __('Password') }}</h5>
                         <div class="sign__input">
                             <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                            <i class="fal fa-lock"></i>

                             @error('password')
                             <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror
                         </div>
                      </div>
                      <div class="sign__input-wrapper mb-10">
                         <h5>{{ __('Confirm Password') }}</h5>
                         <div class="sign__input">
                             <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            <i class="fal fa-lock"></i>
                         </div>
                      </div>
                        <button type="submit" class="btn-tp w-100">
                            {{ __('Register') }}
                        </button>
                      <div class="sign__new text-center mt-20">
                         <p>Already in Markit ? <a href="{{route('login')}}"> Sign In</a></p>
                      </div>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </div>
</section>
@endsection

