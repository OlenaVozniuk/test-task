@extends('admin.layout.layout')

@section('content')
    <div class="row">
        <div class="container mt-2">
            <div class="pull-left">
                <h2>Categories Editor</h2>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" style="margin-top:10px" href="{{route('categories.create')}}"> Create
                        Category</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">


                    <table class="table">
                        <tr>
                            <th width="300px">Category Name</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($categories as $category)
                            <tr>
                                <td><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a>
                                </td>
                                <td>
                                    <form action="{{ route('categories.destroy',$category->id) }}" method="Post">
                                        <a class="btn btn-primary"
                                           href="{{ route('categories.edit', $category) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            {!! $categories->links() !!}
        </div>
    </div>

@endsection
