@extends('layouts.admin')
@section('content')
    <section class="body_section">
        <legend>Products</legend>
        <div class="card">
            <div class="card-body">
                <form
                    action="{{ isset($product->id) ? route('admin.products.update', $product->id) : route('admin.products.store') }}"
                    method="post" enctype="multipart/form-data">
                    @isset($product->id)
                        @method('put')
                    @endisset
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name:</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $product->name ?? '') }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $product->description ?? '') }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Product Price:</label>
                        <input type="text" class="form-control" id="name" name="price"
                            value="{{ old('price', $product->price ?? '') }}" required>
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Industry:</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status:</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1"
                                {{ old('status', $product->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="0"
                                {{ old('status', $product->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive
                            </option>
                            <!-- Add more status options as needed -->
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image_paths" class="form-label">Product Images:</label>
                        <input type="file" class="form-control" id="image_paths" name="image_paths[]" multiple
                            accept="image/*">
                        @error('image_paths')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">{{ isset($product->id) ? 'Update' : 'Create' }}
                        Product</button>
                </form>

            </div>
        </div>

    </section>
@endsection
