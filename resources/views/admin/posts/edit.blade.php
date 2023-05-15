@extends('admin.layout.layout')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Edit post</h2>
                </div>
                <div class="pull-right mb-4">
                    <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back </a>
                </div>
            </div>
        </div>
        <form action="{{ route('posts.update', ['post' => $post]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Post Title:</strong>
                        <input type="text" name="title" value="{{old('title', $post->title)}}" class="form-control"
                               placeholder="Post Title">
                        @error('title')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label><strong>Description</strong></label>
                        <textarea class="form-control" name="description"
                                  id="summernote">{{old('description', $post->description)}}</textarea>
                        @error('description')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <strong>
                            <label for="categories">Choose a Category:</label></strong>
                        <select name="category_id" class="form-control">
                            <option>Select category</option>
                            @foreach($categories as $category)
                                <option
                                    value="{{$category->id}}" {{$category->id === old('category_id', $post->category_id) ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                            @error('category_id')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </select>
                    </div>

                    <div class="form-group">
                        <strong>Tags:</strong>
                        <input type="text" name="tags" value="{{old('tags', $post->tags)}}" class="form-control"
                               placeholder="Post Tags (separated with comma)">
                        @error('tags')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <strong>Upload image:</strong>
                            <input type="file" name="image" class="form-control" placeholder="image">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3 ml-3">Submit</button>
            </div>
        </form>
    </div>
@endsection
