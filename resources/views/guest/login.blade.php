@extends('layouts.main')

@section('title', __('Login'))

@section('headline', __('Login or register'))
    
@section('content')
    <div class="row mt-5 flex-column">
        <form action="{{route('guest.login.post')}}" method="post" class="row col-md-6  mx-auto g-3  shadow">
            @error('loginError')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            @csrf
              <div class="form-floating mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" autocomplete="new-password" value="{{ old('email') }}">
                <label for="email">{{__('Email address')}}</label>
                @error('email')
                    <span class="invalid-feedback">{{$message}}</span>
                @enderror
              </div>

              <div class="form-floating">
                <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" autocomplete="new-password">
                <label for="password">{{__('Password')}}</label>
                @error('password')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
              </div>

              <div class="col-12">
                <div class="form-check">
                    <input type="checkbox" id="remember" name="remember" class="form-check-input">
                    <label for="remember" class="form-check-label">{{__('Remember me')}}</label>
                </div>
              </div>

              <div class="col-12 text-center mb-4">
                <button class="btn btn-success">{{ __('Login') }}</button>
              </div>
        </form>

        <p class="my-4 text-center">
            <a href="{{route('guest.register')}}">{{__('Register')}}</a> 
        </p>
    </div>
@endsection