@extends('layouts.main')

@section('title', __('Edit channel'))

@section('headline', __('Edit channel'))
    
@section('content')
    @include('parts.back-button')
    <div class="row mt-5 flex-column">
        <form action="{{ route('user.channel.edit.put') }}" method="post" class="row col-md-6  mx-auto g-3  shadow">
            @method('PUT')
            @csrf
              <div class="form-floating mb-3">
                <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Channel name" autocomplete="new-password" value="{{ old('name', $item->name) }}">
                <label for="name">{{__('Channel name')}}</label>
                @error('name')
                    <span class="invalid-feedback">{{$message}}</span>
                @enderror
              </div>

              <div class="form-floating">
                <input type="url" class="form-control  @error('url') is-invalid @enderror" id="url" name="url" placeholder="Channel URL" autocomplete="new-password" value="{{ old('url', $item->url) }}">
                <label for="url">{{__('Channel URL')}}</label>
                @error('url')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
              </div>

              <div class="form-floating">
                <input type="number" class="form-control  @error('refresh_interval') is-invalid @enderror" id="refresh_interval" name="refresh_interval" placeholder="Refresh interval" autocomplete="new-password" value="{{ old('refresh_interval', $item->refresh_interval) }}">
                <label for="url">{{__('Refresh interval (min)')}}</label>
                @error('refresh_interval')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
              </div>

              

              <div class="col-12 text-center mb-4">
                <button class="btn btn-success">{{ __('Save') }}</button>
              </div>
        </form>
 
    </div>
@endsection