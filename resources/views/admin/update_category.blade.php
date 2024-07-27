@extends('admin.index')

@section('container')
    <h3 class="text-center text-light">Update Category</h3>
    <div class="category">
        <form action="{{ route('categories.update',$category->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="mt-4">
                <input type="text" class="form-control mt-2" name="category_name" value="{{ $category->category_name }}">
                <input type="submit" value="Update Category" class="btn btn-primary mt-2 form-control">
            </div>
        </form>
    </div>
@endsection