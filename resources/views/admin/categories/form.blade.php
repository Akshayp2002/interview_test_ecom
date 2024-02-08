@extends('layouts.admin')
@section('content')
    <section class="body_section">
        <legend>Category</legend>
        <div class="card">
            <div class="card-body">
                <form
                    action="{{ isset($category->id) ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}"method="post">
                    @isset($category->id)
                        @method('put')
                    @endisset
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Category name</label>
                        <input class="form-control w-25" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="name">
                        <div id="emailHelp" class="form-text">..</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </section>
@endsection