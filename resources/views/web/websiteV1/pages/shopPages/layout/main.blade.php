@extends('web.' . env('SELECTED_WEB') . '.layout.main')

@section('title', 'Shop')

@push('styles')
<link rel="stylesheet" href="{{asset('assets/web/css/news.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/web/css/news.320.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/web/css/news.768.css')}}"/>
@endpush

@section('content')
<br>
<br>
<div class="wrapper">

<div class="news-tab-btn-container" style="">
@foreach ($categories as $category)
    <div class="btn tab-btn {{session('selectedCategory')->id === $category->id ? 'on' : ''}}" data-type="all" data-tab="all">
        <a href="{{route('shopcategory', $category->id)}}">{{$category->name}}</a></div>
@endforeach
</div>

<br>
<br>
@yield('shopContent')

</div>

@endsection
@push('scripts')

@endpush
