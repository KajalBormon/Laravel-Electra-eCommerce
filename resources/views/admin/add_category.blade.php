@extends('admin.index')

@section('container')

    <h3 class="text-center">Add Category</h3>
    @if(session('status'))
    <div>
        <p class="text-success text-center">{{ session('status') }}</p>
    </div>
    @endif
    <div class="category">
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            <div class="mt-4">
                <input type="text" class="form-control mt-2" name="category_name" placeholder="Category name">
                <input type="submit" value="Add Category" class="btn btn-primary mt-2 form-control">
            </div>
        </form>
    </div>
@endsection