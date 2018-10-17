@extends('layouts.app') 
@section('content')
<section class="height-100 imagebg" data-gradient-bg="#4876BD,#5448BD,#8F48BD,#BD48B1">
	<div class="container pos-vertical-center">
        <div class="row">
            <div class="col-md-7 col-lg-5">
                <h2>Login to DTUtimes</h2>
                <p class="lead">
                    Welcome back, sign in with your existing Stack account credentials
                </p>
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <input placeholder="Email" type="email" name="email" value="{{ old('email') }}"
                                required autofocus> 
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                        </div>
                        <div class="col-md-12">
                            <input placeholder="Password" type="password" name="password"
                                required>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="input-checkbox">
                                <input id="checkbox" type="checkbox" name="remember" {{ old( 'remember') ? 'checked' : '' }}>
                                <label for="checkbox"></label>
                            </div>
                            <span>Remember me</span>
                           
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn--primary type--uppercase" type="submit">Login</button>
                        </div>
                    </div>
                    <!--end of row-->
                </form>
                
                <span class="type--fine-print block">Forgot your username or password?
                                    <a href="page-accounts-recover.html">Recover account</a>
                                </span>
            </div>
        </div>
</section>
@endsection
 
{{-- 

    <div class="form-group row">
        <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
             @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 offset-md-4">
            <div class="form-check">
                

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
</form> --}}