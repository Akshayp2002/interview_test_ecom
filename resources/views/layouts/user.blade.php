@extends('welcome')
@section('layout')
    @include('partials.admin.header')
    <div class="main_container">
        @yield('content')
    </div>
@endsection
