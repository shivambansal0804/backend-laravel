@extends('layouts.app') 
@section('content') 
@include('inc.errors')
<section class="cover">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <h1>Create New User</h1>
                <p class="lead">
                    Build lean, beautiful websites with a clean and contemporary look to suit a range of purposes.
                </p>
                <hr>
            </div>
        </div>
        <!--end of row-->
        
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <form method="POST" action="{{ route('users.store') }}" class="row">
                    @csrf
                    <div class="col-md-12">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Name" class="validate-required" value="{{ old('name') ? old('name') : '' }}" required />
                    </div>
                    <div class="col-md-12">
                        <label>Email Address:</label>
                        <input type="email" name="email" placeholder="Your Email" class="validate-required" value="{{ old('email') ? old('email') : '' }}" />
                    </div>

                    <div class="col-md-12">
                        <h4 class="mb-0 mt-1">Role</h4>
                    </div>

                    <div class="col-md-12">
                        @foreach ($roles as $item)
                            <div class="input-radio input-radio--innerlabel">
                                <input id="{{ $item->name }}" type="radio" name="role" value="{{ $item->name }}" />
                                <label for="{{ $item->name }}">{{$item->display_name}}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Create new User') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end of container-->
</section>
@endsection