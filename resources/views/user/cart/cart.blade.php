@extends('layouts.user')
@section('content')
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                </div>
                @if ($products->count() > 0)
                    @foreach ($products as $cartItems)
                        <div class="card rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-5 col-lg-2 col-xl-2">
                                        <img src="{{ isset(json_decode($cartItems->image_path)[0]) ? asset('storage/' . json_decode($cartItems->image_path)[0]) : '' }}"
                                            class="img-fluid rounded-3 cart_image_size" alt="Cotton T-shirt">
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <p class="lead fw-normal mb-2 d-flex">{{ $cartItems->name }}</p>
                                    </div>
                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                        <h5 class="mb-0">${{ $cartItems->price }}</h5>
                                    </div>
                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                        <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="card">
                        <div class="card-body justify-content-between d-flex">
                            <form action="{{ route('user.index') }}" method="get">
                                @csrf
                                <input type="hidden" name="total_price" value="{{ $totalPrice }}">
                                <button type="submit" class="btn btn-warning btn-block btn-lg">Proceed to Pay</button>
                                <h4>Total Price: ${{ $totalPrice }}</h4>
                            </form>

                        </div>
                    </div>
                @else
                    <div class="card">
                        <div class="card-body justify-content-between d-flex">
                            <button type="button" class="btn btn-warning btn-block btn-lg">No Items in Cart</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
