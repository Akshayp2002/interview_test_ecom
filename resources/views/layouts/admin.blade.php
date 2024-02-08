@extends('welcome')
@section('layout')
    {{-- @include('partials.admin.header') --}}
    <div class="main_container">
        @include('partials.admin.sidebar')

        @yield('content')
    </div>
@endsection
