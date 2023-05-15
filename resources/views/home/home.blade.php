@extends('layout.layout')
@section('content')
    <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Travel Blog</h1>
                </div>
            </div>
        </div>
    </div>
    </header>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- Post preview-->
            @foreach($posts as $post)
                <div class="post-preview">
                    <h2 class="post-title"><a href="{{ route('post.show', $post) }}">{{ $post->title }}</a></h2>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

