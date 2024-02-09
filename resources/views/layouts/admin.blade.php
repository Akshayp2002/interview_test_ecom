@extends('welcome')
@section('layout')
    <div class="main_container">
        @include('partials.admin.sidebar')

        @yield('content')
    </div>
@endsection
