<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{route('blog.index')}}" class="nav-link">Blog</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->

                @auth
                    @if (!auth()->user()->hasRole('photographer'))
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                Stories <span class="caret"></span>
                            </a>
                        
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="{{ route('stories.index')}}" class="dropdown-item">All Stories</a>
                                <a class="dropdown-item" href="{{ route('stories.create') }}">Create Story</a>
                                @if (auth()->user()->can('publish-story'))
                                    <a href="{{ route('council.stories.index')}}" class="dropdown-item">Pending Stories</a>
                                @endif
                            </div>
                        </li>
                    @endif

                    @if (auth()->user()->can('read-category'))
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                Categories <span class="caret"></span>
                            </a>
                        
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('categories.index') }}">
                                    {{ __('All categories') }}
                                </a>
                        
                                @if (auth()->user()->can('create-category'))
                                    <a class="dropdown-item" href="{{ route('categories.create') }}">
                                        {{ __('Create') }}
                                    </a>
                                @endif
                            </div>
                        </li>
                    @endif

                    @if (auth()->user()->hasRole('superuser'))
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                            Manage <span class="caret"></span>
                        </a>
                    
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('superuser.dashboard') }}" >
                                {{ __('Dashboard') }}
                            </a>
                            <hr>
                            <a class="dropdown-item" href="{{ route('users.index') }}">
                                {{ __('All users') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('users.create') }}">
                                {{ __('Create User') }}
                            </a>
                            <hr>
                            <a class="dropdown-item" href="{{ route('permissions.index') }}">
                                {{ __('Permissions') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('roles.index') }}">
                                {{ __('Roles') }}
                            </a>
                        </div>
                    </li>
                    @endif
                @endauth
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a href="{{ route('dashboard')}}" class="dropdown-item">Dashboard</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>