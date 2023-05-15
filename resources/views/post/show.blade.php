@extends('layout.layout')
@section('content')
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <ul class="navbar-nav ms-auto py-4 py-lg-0">
            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('home')}}">Home</a></li>
        </ul>
    </div>
</nav>
<header class="masthead" style="background-image: url({{asset('storage/'.$post->images()->first()->path)}}); object-fit: contain">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>{{$post->title}}</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-preview">
                        <h3 class="post-subtitle">{!! $post->description !!}</h3>
                        </a>
                    </div>
                    <p>
                        Tags:
                        {{$post->tags}}
                    </p>
                <p>
                    Category: {{$post->category->name}}
                </p>
            </div>
        </div>
    </div>
</article>
@endsection
