@extends('layouts.admin')
@section('content')
    <section class="body_section">
        <legend>products</legend>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary m-2">Create products</a>
        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Products Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Category</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $items)
                        <tr>
                            <td class="m-2">{{ $items->name }}</td>
                            <td class="m-2">{{ $items->description }}</td>
                            <td class="m-2">{{ $items->price }}</td>
                            <td class="m-2">{{ $items->category->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>
@endsection
