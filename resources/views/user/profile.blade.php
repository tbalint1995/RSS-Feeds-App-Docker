@extends('layouts.main')

@php
    $title = auth()->user()->name.' '.__('profile home');
@endphp

@section('title', $title)

@section('headline', $title)
    
@section('content')
    
@endsection