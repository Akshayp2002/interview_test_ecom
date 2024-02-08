@extends('layouts.admin')
@section('content')
    <section class="body_section">
        <legend>Stocks</legend>
        <a href="{{ route('admin.stocks.create') }}" class="btn btn-primary m-2">Create Stocks</a>
        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Product name</th>
                        <th scope="col">Stock count</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stocks as $stock)
                        <tr>
                            <td class="m-2">{{ $stock->product->name }}</td>
                            <td class="m-2">{{ $stock->quantity }}</td>
                            <td class="m-2">
                                <a href="{{ route('admin.stocks.edit', $stock->id) }}" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>
@endsection
