@extends('layouts.user')
@section('content')
    <section class="body_section">
        <div class="text-center py-5">
            <form action="{{ route('user.dashboard') }}" method="GET">
                @csrf

                <label for="category">Select Category:</label>
                <select name="category_id" id="category">
                    <option value="" {{ !$selectedCategoryId ? 'selected' : '' }}>All</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $selectedCategoryId == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
            <div class="row">
                @foreach ($products as $item)
                    <div class="col-lg-5 col-md-12 mb-4 card_prod">
                        <div class="card">
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                                data-mdb-ripple-color="light">
                                @if ($item->image_path)
                                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach (json_decode($item->image_path) as $index => $image)
                                                <div class="image_size carousel-item {{ $index == 0 ? ' active' : '' }}">
                                                    <img src="{{ asset('storage/' . $image) }}" class="d-block w-100"
                                                        alt="{{ asset('storage/noimage.png') }}">
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                @else
                                    <img src="{{ asset('storage/noimage.png') }}" class="d-block w-100" alt="">
                                @endif
                                <a href="#!">
                                    <div class="mask">
                                        <div class="d-flex justify-content-start align-items-end h-100">
                                            <h5><span class="badge bg-primary ms-2">New</span></h5>
                                        </div>
                                    </div>
                                    <div class="hover-overlay">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="card-body">
                                <a href="" class="text-reset">
                                    <h5 class="card-title mb-3">{{ $item->name ?? '' }}</h5>
                                </a>
                                <a href="" class="text-reset">
                                    <p>{{ $item->category->name ?? '' }}</p>
                                </a>
                                <h6 class="mb-3">${{ $item->price ?? '' }}</h6>
                                <a href="#" class="btn btn-primary addToCart" data-item-id="{{ $item->id }}">Add
                                    Cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $('.addToCart').click(function(e) {
                e.preventDefault();

                var itemId = $(this).data('item-id');
                console.log(itemId);

                $.ajax({
                    url: "{{ route('user.carts.add') }}",
                    type: "POST",
                    data: {
                        itemId: itemId,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        console.log(data);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
