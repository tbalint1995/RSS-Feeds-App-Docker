@extends('layouts.main')

@section('title', __('RSS News details: '.$item->title))

@section('headline', __($item->title))
    
@section('content')
    <div class="row mt-5">
         <div class="col-12 shadow">
          <p><b>{{ __('RSS Channel') }}</b>: <span>{{ $item->channel->name }}</span></p>
          <p><b>{{ __('Author') }}</b>: <span>{{ $item->author }}</span></p>
          <p><b>{{ __('Original') }}</b>: <span><a href="{{ $item->link }}" target="_blank" rel="noopener noreferrer">[{{__('link')}}]</a></span></p>
          <p><b>{{ __('Public date') }}</b>: <span>{{$item->pub_date}}</span></p>
         
            @if ($item->image)
            <p> <img src="{{ $item->image["url"] }}" alt="" class="col-12"> </p>
            @endif
            <p><b>{{ __('Description') }}</b>: <span>{{$item->description}}</span></p>

            @include('parts.back-button')
         </div>
    </div>
@endsection