@extends('layouts.main')

@section('title', __('RSS news'))

@section('headline', __('RSS news'))
    
@section('content')
 
    @include('parts.refreshall-button')
 
    <table class="table table-striped">
        <tr>
            <th>{{ __('ID') }}</th>
            <th width="40%">{{ __('Title') }}</th>
            <th>{{ __('Channel') }}</th>
            <th>{{ __('Created at') }}</th>
            <th>{{ __('Operations') }}</th>
        </tr>
        @foreach ($list as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->title }}</td>
            <td><a href="{{route('user.channel.edit', ['rss_channel'=>$item->channel->id])}}">{{ $item->channel->name }}</a></td>
            <td>{{ $item->created_at }}</td>
            <td>
                
                    <a href="{{route('user.news.details', [
                    'rss_news'=>$item->id
                                ])}}" class="btn btn-primary btn-sm">{{ __('Details')  }}</a>        
          
        </td>
        </tr>
        @endforeach
    </table>
@endsection