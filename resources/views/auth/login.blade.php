@extends('layouts.app') 
@section('content')

<section class="height-100 imagebg text-center" data-overlay="4">
    <div class="background-image-holder">
        <img alt="background" src="img/inner-6.jpg" />
    </div>
    <div class="container pos-vertical-center">
        <div class="row">
            <div class="col-md-7 col-lg-5">
                <h2>Login to continue</h2>
                <p class="lead">
                    Welcome back, sign in with your existing Stack account credentials
                </p>
                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" placeholder="Username" />
                        </div>
                        <div class="col-md-12">
                            <input type="password" placeholder="Password" />
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn--primary type--uppercase" type="submit">Login</button>
                        </div>
                    </div>
                    <!--end of row-->
                </form>
                <span class="type--fine-print block">Dont have an account yet?
                                    <a href="page-accounts-create-1.html">Create account</a>
                                </span>
                <span class="type--fine-print block">Forgot your username or password?
                                    <a href="page-accounts-recover.html">Recover account</a>
                                </span>
            </div>
        </div>
        <!--end of row-->
@endsection
 
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Login') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                            required autofocus> @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                            required> @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>