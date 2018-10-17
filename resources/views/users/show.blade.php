@extends('layouts.app') 
@section('content')
<section class="bg--secondary space--sm">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="boxed boxed--lg boxed--border">
                    <div class="text-block text-center">
                        <img alt="avatar" src="{{ asset('img/avatar-round-2.png')}}" class="image--md" />
                        <span class="h5">{{ $user->name }}</span>
                        <span>{ user type }</span>
                        <span class="label">
                            @foreach ($user->roles as $item) {{$item->name}} @endforeach
                        </span>
                    </div>
                    <div class="text-block clearfix text-center">
                        <ul class="row row--list">
                            <li class="col-md-4">
                                <span class="type--fine-print block">Location</span>
                                <span>San Francisco&nbsp;</span>
                            </li>
                            <li class="col-md-4">
                                <span class="type--fine-print block">Joined </span>
                                <span>{{ $user->created_at->diffForHumans() }}</span>
                            </li>
                            <li class="col-md-4">
                                <span class="type--fine-print block">Contact</span>
                                <a href="#">{{ $user->email }}</a>
                            </li>
                    </div>
                    </ul>
                </div>
                <div class="boxed text-center">
                    <ul class="social-list list-inline list--hover">
                        <li>
                            <a href="#">
                                <i class="socicon socicon-google icon icon--xs"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="socicon socicon-twitter icon icon--xs"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="socicon socicon-facebook icon icon--xs"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="socicon socicon-instagram icon icon--xs"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="boxed boxed--border">
                    <ul class="row row--list clearfix text-center">
                        <li class="col-md-3 col-6">
                            <span class="h6 type--uppercase type--fade">Likes</span>
                            <span class="h3">220</span>
                        </li>
                        <li class="col-md-3 col-6">
                            <span class="h6 type--uppercase type--fade">Articles</span>
                            <span class="h3">14</span>
                        </li>
                        <li class="col-md-3 col-6">
                            <span class="h6 type--uppercase type--fade">Comments</span>
                            <span class="h3">2,129</span>
                        </li>
                        <li class="col-md-3 col-6">
                            <span class="h6 type--uppercase type--fade">Following</span>
                            <span class="h3">119</span>
                        </li>
                    </ul>
                </div>
                
                <div class="boxed boxes--border">
                    <h4>Permissions</h4>
                    <span class="label">
                        <a class="text-white" href="{{route('users.permission.edit', $user->uuid)}}">
                            Edit Permissions
                        </a>
                    </span>
                    <ul>
                        @foreach ($user->allPermissions() as $item) <li class="">{{$item->name}}</li> @endforeach
                    </ul>
                </div>
                
                <div class="boxed boxed--border">
                    <h4>Recent Activity</h4>
                    <ul>
                        <li class="clearfix">
                            <div class="row">
                                <div class="col-lg-2 col-3 text-center">
                                    <div class="icon-circle">
                                        <i class="icon icon--lg material-icons">comment</i>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-7">
                                    <span class="type--fine-print">21st July, 2017</span>
                                    <a href="#" class="block color--primary">Check out the relaunched Scope</a>
                                    <p>
                                        Discourse in writing dealing with a particular point or idea.
                                    </p>
                                </div>
                            </div>
                            <hr>
                        </li>
                        <li class="clearfix">
                            <div class="row">
                                <div class="col-lg-2 col-3 text-center">
                                    <div class="icon-circle">
                                        <i class="icon icon--lg material-icons">mode_edit</i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-7">
                                    <span class="type--fine-print">14th July, 2017</span>
                                    <a href="#" class="block color--primary">Tips for web typography</a>
                                    <p>
                                        To write beside or "written beside" is a self-contained unit of a discourse in writing dealing with a particular point or idea.
                                    </p>
                                </div>
                            </div>
                            <hr>
                        </li>
                        <li class="clearfix">
                            <div class="row">
                                <div class="col-lg-2 col-3 text-center">
                                    <div class="icon-circle">
                                        <i class="icon icon--lg material-icons">favorite</i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-7">
                                    <span class="type--fine-print">12th July, 2017</span>
                                    <a href="#" class="block color--primary">Where do you source your stock photography?</a>
                                </div>
                            </div>
                            <hr>
                        </li>
                        <li class="clearfix">
                            <div class="row">
                                <div class="col-lg-2 col-3 text-center">
                                    <div class="icon-circle">
                                        <i class="icon icon--lg material-icons">comment</i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-7">
                                    <span class="type--fine-print">3rd July, 2017</span>
                                    <a href="#" class="block color--primary">Share your rapid development workflow</a>
                                    <p>
                                        Of a discourse in writing dealing with a particular point or idea.
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <a href="#" class="type--fine-print pull-right">View All</a>
                </div>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section> 
    {{-- <p>name: {{$user->name}} </p>    
    <p>email: {{$user->email}} </p>    
    <p>username: {{$user->username}} </p>    
    <p>bio: {{$user->bio}} </p>
    <p>avatar: {{$user->avatar}} </p>
    <p>activated: {{$user->activated}} </p>
    <p>data_of_birth: {{$user->data_of_birth}} </p>
    <p>linkedin: {{$user->linkedin}} </p>
    <p>facebook: {{$user->facebook}} </p>
    <p>instagram: {{$user->instagram}} </p>
    <p>display_mail: {{$user->display_mail}} </p>
    <p>medium: {{$user->medium}} </p>
    <p>Role: 
           
    </p>
    <p>Permissions: 
        
    </p> --}}
@endsection