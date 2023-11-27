@extends('admin.layout.master')
@section('title')
    @yield('section-title')
@endsection
@section('content')
    <div class="data">
        <div class="data-list">
           @yield('data-list')
        </div>
        <div class="data-add">
            @yield('data-add')
        </div>
    </div>
@endsection