@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="pt-2 card-header-text mb-2">
                <h3 class="card-title">My Blog</h3>
                <p class="sub-text">
                    Last update {{ $posts[0]->updated_at->format('d F, H:i') }}
                </p>
            </div>

            @foreach ($posts as $post)
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <div class="card" style="max-height: 22rem;">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top img-fluid"
                                alt="{{ $post->name }}" style="object-fit: cover; height: 125px;">
                        @else
                            <img src="https://picsum.photos/500?{{ $post->name }}" class="img-fluid"
                                alt="{{ $post->name }}" style="object-fit: cover; height: 150px;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="/blog/{{ $post->title }}" class="text-decoration-none text-dark">
                                    {!! Str::limit($post->title, 20) !!}
                                </a>
                            </h5>

                            <span>
                                {{ strip_tags(Str::limit($post->content, 50))  }}
                            </span>

                            <p class="mt-2" style="margin-top:-5px">
                                <small class="text-muted">
                                    Last update {{ $posts[0]->created_at->diffForHumans() }}
                                </small>
                            </p>

                            <a href="/blog/{{ $post->title }}" class="btn btn-primary" style="margin-top:-10px">
                                Go detail
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
