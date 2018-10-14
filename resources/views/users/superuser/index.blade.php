@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-md-5 text-center">
                <div class="mt-3">
                    <img src="{{ asset('svg/admin.svg')}}" alt="" srcset="" width="250">
                </div>
                <br>
                <h2>Welcome {{ auth()->user()->name }}</h2>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit eligendi, rem autem porro provident veniam aperiam dicta deserunt 
                    nemo reprehenderit illo eum soluta eos atque beatae exercitationem ad omnis deleniti.
                </p>
            </div>
        </div>
    </div>
@endsection