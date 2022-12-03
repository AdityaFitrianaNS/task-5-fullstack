@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="pt-2 card-header-text">
                <h3 class="card-title">All Posts</h3>
                <p class="sub-text">
                    Last update {{ $posts[0]->updated_at->format('d F, H:i') }}
                </p>
                
                @if (session()->has('success'))
                    <div class="alert alert-success col-lg-12" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="posts/create" class="btn btn-primary">
                    Add Post
                </a>
            </div>

            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="col-12 col-md-6 col-lg-4 mb-2 mt-3">
                        <div class="card" style="max-height: 22rem;">
                            <a href="/posts/{{ $post->id }}/edit"
                                class="btn btn-md btn-info btn-outline-info position-absolute"
                                style="left:7px; top: 7px;">
                                <i class="bi bi-lg bi-pencil text-white"></i>
                            </a>
                            <form action="/posts/{{ $post->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button onclick="return confirm('Are you sure delete?')"
                                    class="btn btn-md btn-danger btn-outline-light position-absolute"
                                    style="left:50px; top: 7px;">
                                    <i class="bi bi-lg bi-trash text-white"></i>
                                </button>
                            </form>
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top img-fluid thumbnail"
                                    alt="{{ $post->name }}" style="object-fit: cover; height: 125px;">
                            @else
                                <img src="img/img-post.jpg" class="img-fluid img-thumbnail" alt="{{ $post->name }}"
                                    style="object-fit: cover; height: 150px;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="/blog/{{ $post->title }}" class="text-decoration-none text-dark">
                                        {!! Str::limit($post->title, 20) !!}
                                    </a>
                                </h5>

                                <span>
                                    {{ strip_tags(Str::limit($post->content, 50)) }}
                                </span>

                                <p class="mt-2" style="margin-top:-5px">
                                    <small class="text-muted">
                                        Last update {{ $posts[0]->created_at->diffForHumans() }}
                                    </small>
                                </p>

                                <a href="/posts/{{ $post->id }}" class="btn btn-primary" style="margin-top:-10px">
                                    Go detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="error-page container">
                    <div class="col-md-8 col-12 offset-md-2">
                        <div class="text-center">
                            <h3 class="error-title fw-semibold mt-3">NOT FOUND</h3>
                            <p class='fs-5 text-gray-600'>Posts not found, please add new post.</p>
                            <a href="home" class="btn btn-md btn-outline-primary mt-3">Go Back</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
