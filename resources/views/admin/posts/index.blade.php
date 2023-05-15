@extends('admin.layout.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Posts Editor</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
            </div>
        </div>
    </div>
    <br>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" style="margin-top:10px">
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Tags</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->getKey() }}</td>
                        {{--                <td><img src="{{ asset('storage/uploads').'/'.$post->image }}" width="100px"></td>--}}
                        <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                        <td>{!! $post->description !!}</td>
                        <td>
                            <a href="{{ route('categories.show', $post->category) }}">{{ $post->category->name }}</a>
                        </td>
                        <td>{{$post->tags}}</td>

                        <td>
                            <form action="{{ route('posts.destroy',$post->id) }}" method="POST">

                                <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $posts->links() !!}
        </div>
    </div>
@endsection
