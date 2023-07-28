@extends('layouts.main')

@section('title', __('Login'))

@section('headline', __('Register or log in'))
    
@section('content')
    <div class="row mt-5 flex-column">
        <form action="{{route('guest.register.post')}}" method="post" class="row col-md-6  mx-auto g-3  shadow">
            @csrf
            <div class="form-floating mb-3">
              <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Your name" autocomplete="new-password" value="{{ old('name') }}">
              <label for="name">{{__('Your name')}}</label>
              @error('name')
                  <span class="invalid-feedback">{{$message}}</span>
              @enderror
            </div>

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

              <div class="form-floating">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password confirmation" autocomplete="new-password">
                <label for="password_confirmation">{{__('Password confirmation')}}</label>
                @error('password_confirmation')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
              </div>

              <div class="col-12 text-center mb-4">
                <button class="btn btn-success">{{ __('Register') }}</button>
              </div>
        </form>

        <p class="my-4 text-center">
            <a href="{{route('guest.login')}}">{{__('Login')}}</a> 
        </p>
    </div>
@endsection