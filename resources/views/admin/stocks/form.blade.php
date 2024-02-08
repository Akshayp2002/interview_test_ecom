@extends('layouts.admin')
@section('content')
    <section class="body_section">
        <legend>Category</legend>
        <div class="card">
            <div class="card-body">
                <form action="{{ isset($stock->id) ? route('admin.stocks.update', $stock->id) : route('admin.stocks.store') }}"
                    method="post">
                    @isset($stock->id)
                        @method('put')
                    @endisset
                    @csrf
                    <div class="mb-3">
                        <label for="product_id" class="form-label">Product</label>
                        <select class="form-control" id="product_id" name="product_id" required>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}"
                                    {{ old('product_id', $stock->product_id ?? '') == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Stock Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity"
                            value="{{ old('quantity', $stock->quantity ?? '') }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>

    </section>
@endsection
