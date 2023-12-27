@extends('admin.layout.master')
@section('title')
    @yield('section-title')
@endsection
@section('content')
    <div class="data">
        <div class="data-list">
           @yield('table')
        </div>
        <div class="data-add">
            @yield('form')
        </div>
    </div>
@endsection