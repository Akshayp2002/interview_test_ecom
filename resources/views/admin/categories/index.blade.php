@extends('layouts.admin')
@section('content')
    <section class="body_section">
        <legend>Category</legend>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary m-2">CreateCategory</a>
        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Category Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $items)
                        <tr>
                            <td class="m-2">{{ $items->name }}</td>
                            <td class="m-2">edit</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>
@endsection
