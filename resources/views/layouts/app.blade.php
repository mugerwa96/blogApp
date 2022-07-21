<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <link rel="stylesheet" href="{{asset('asset\css\bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('asset\css\mdb.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset\css\style.css')}}">
    <link rel="stylesheet" href="{{asset('asset\webfonts\all.css')}}">
    

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                   <!-- Authentication Links -->
                   @guest
                   @if (Route::has('login'))
                       <li class="nav-item">
                           <a class="nav-link {{request()->is('/login') ?'active':""}} " href="{{ route('login') }}">{{ __('Login') }}</a>
                       </li>
                   @endif

                   @if (Route::has('register'))
                       <li class="nav-item">
                           <a class="nav-link {{request()->is('/register')?'active':""}} " href="{{ route('register') }}">{{ __('Register') }}</a>
                       </li>
                   @endif
               @else
               <li class="nav-item">
                <a class="nav-link {{request()->is('/blog')?'active':""}} " href="{{ route('blog.index') }}">Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->is('/blog/add')?'active':''}}" href="{{ route('blog.add') }}">Add Post</a>
            </li>
               <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                   {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <li><a class="dropdown-item" href="#">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                               {{ __('Logout') }}
                           </a>

                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                               @csrf
                           </form>
                  </a></li>
                  <li><a class="dropdown-item" href="#">My Profile</a></li>
               
                </ul>
              </li>
                   
               @endguest
                
              </div>
            </div>
          </nav>
      

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{asset('asset\js\bootstrap.js')}}"></script>
    <script src="{{asset('asset\js\mdb.min.js')}}"></script>
    <script src="{{asset('asset\js\jquery.js')}}"></script>
 
    @yield('scripts')
    
</body>
</html>
