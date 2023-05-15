@extends('admin.layout.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Post: {{$post->title}}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ url()->previous() }}"> Back</a>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <img src="{{ asset('storage/uploads').'/'.$post->image }}" width="180px">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $post->title }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Id:</strong>
                    {{ $post->id }}
                </div>
            </div>
        </div>

{{--        <div class="row">--}}
{{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                <div class="form-group">--}}
{{--                    <strong>Category:</strong>--}}
{{--                    <a class="btn btn-warning"--}}
{{--                       href="{{ route('admin.categories.show', $product->subcategory->category) }}"> {{ $product->subcategory->category->name }}</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="row">--}}
{{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                <div class="form-group">--}}
{{--                    <strong>Subcategory:</strong>--}}
{{--                    <a class="btn btn-warning"--}}
{{--                       href="{{ route('admin.subcategories.show', $product->subcategory) }}"> {{ $product->subcategory->name }}</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="row">--}}
{{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                <div class="form-group">--}}
{{--                    <strong>Price:</strong>--}}
{{--                    {{ $product->price }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="row">--}}
{{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                <div class="form-group">--}}
{{--                    <strong>Model:</strong>--}}
{{--                    {{ $product->model }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
