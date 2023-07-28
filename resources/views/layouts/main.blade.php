<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{-- menü --}}

    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('home')}}">RSS</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('home')}}">{{__('Home')}}</a>
              </li>

              @guest
              <li class="nav-item">
                <a class="nav-link" href="{{route('guest.register')}}">{{__('Register')}}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('guest.login')}}">{{__('Login')}}</a>
              </li>
              @endguest

              @auth
              <li class="nav-item">
                <a class="nav-link" href="{{route('user.profile')}}">{{__('Profile')}}</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="{{route('user.channel.index')}}">{{__('Channels')}}</a>
              </li>          
              <li class="nav-item">
                <a class="nav-link" href="{{route('user.news.index')}}">{{__('News')}}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('user.logout')}}">{{__('Logout')}}</a>
              </li>
              @endauth

            </ul>
           
          </div>
        </div>
      </nav>

    {{-- //menü --}}

    <div class="container mt-5">
        <div class="row col-md-10 mx-auto">
            <div class="col-12">@hasSection ('headline')
                <h2 class="text-center">@yield('headline')</h2>
            @endif</div>
            <div class="col-12">
                @if(Session::has('successMessage'))
                    <div class="alert alert-success">{{Session::get('successMessage')}}</div>
                @enderror
                @yield('content')
            </div>
        </div>
    </div>

</body>
</html>