@extends('layouts.main')

@section('title', __('Channels'))

@section('headline', __('Channels'))
    
@section('content')

    @include('parts.refreshall-button');

    @include('parts.add-button', [
        'url'=>route('user.channel.add')
    ])
    <table class="table table-striped">
        <tr>
            <th>{{ __('ID') }}</th>
            <th width="40%">{{ __('Name') }}</th>
            <th>{{ __('Last refresh') }}</th>
            <th>{{ __('Created at') }}</th>
            <th width="300">{{ __('Operations') }}</th>
        </tr>
        @foreach ($list as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->last_refresh ? date('Y.m.d H:i:s',$item->last_refresh) : 'n.a' }}</td>
            <td>{{ $item->created_at }}</td>
            <td>
                <form action="{{route('user.channel.delete', [
                    'rss_channel'=>$item->id
                                ])}}" method="post" rel="delete" class="d-flex justify-content-evenly">
                    @method('DELETE')
                    @csrf            
                    <a href="{{route('user.channel.edit', [
                    'rss_channel'=>$item->id
                                ])}}" class="btn btn-primary btn-sm">{{ __('Edit')  }}</a>
                                <button class="btn btn-danger btn-sm">{{__('Delete')}}</button>
                    <a href="{{route('user.channel.refresh', [
                        'rss_channel'=>$item->id
                                    ])}}" class="btn btn-success btn-sm">{{ __('Refresh')  }}</a>  
                    <a href="{{route('user.news.index', [
                        'rss_channel'=>$item->id
                                    ])}}" class="btn btn-secondary btn-sm text-nowrap">{{ __('News').' ('.$item->rssNews()->count().')'  }}</a> 

                </form>    
        </td>
        </tr>
        @endforeach
    </table>
@endsection