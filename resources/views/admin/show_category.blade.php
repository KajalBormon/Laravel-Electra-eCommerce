@extends('admin.index')

@section('container')
    <h3 class="text-center text-light">Display All Category</h3>
    @if(session('status'))
    <div>
        <p class="text-success text-center">{{ session('status') }}</p>
    </div>
    @endif
    <div class="display_cat_table">
        <table class="table table-bordered">
            <thead>
                <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->category_name }}</td>
                
                    <td>
                        <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-sm btn-success">Update</a>
                    </td>
                    <td>
                       {{--  <a href="{{ route('categories.destroy',$category->id) }}" class="btn btn-sm btn-danger" onclick="confirmation(event)">Delete</a> --}}
                       <form action="{{ route('categories.destroy',$category->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="confirmation(event)">Delete</button>
                       </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection