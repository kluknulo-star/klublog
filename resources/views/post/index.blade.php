@extends('layouts.main')


@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Блог</h1>
            <section class="featured-posts-section">
                <div class="row mb-4">
                    @foreach($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ asset('storage/' . $post->main_image)}}" alt="blog post">
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="blog-post-category">{{$post->category->title}}</p>
                                @auth()
                                    <form action="{{route('post.like.store', $post->post_id)}}" method="post">
                                        @csrf
                                        {{$post->liked_users_count}}
                                        @if(auth()->user()->likedPosts->contains($post->post_id))
                                            <button type="submit" class="border-0 bg-transparent"><i
                                                    class="fas fa-heart"></i>
                                            </button>
                                        @else
                                            <button type="submit" class="border-0 bg-transparent"><i
                                                    class="far fa-heart"></i>
                                            </button>
                                        @endif
                                    </form>
                                @endauth

                                @guest()
                                    <div>
                                        <span>{{$post->liked_users_count}}</span>
                                        <i class="far fa-heart"></i>
                                    </div>
                                @endguest
                            </div>
                            <a href="{{route('post.show', ['post' => $post->post_id])}}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{$post->title}}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="row mb-4">
                    <div class="m-auto" style="margin-top: -100px; ">
                        {{$posts->links()}}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-md-8">
                    <section>
                        <div class="row blog-post-row">
                            @foreach($randomPosts as $randomPost)
                                <div class="col-md-6 blog-post" data-aos="fade-up">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <img src="{{ asset('storage/' . $randomPost->main_image) }}" alt="blog post">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="blog-post-category">{{$randomPost->category->title}}</p>
                                        @auth()
                                            <form action="{{route('post.like.store', $randomPost->post_id)}}"
                                                  method="post">
                                                @csrf
                                                {{$randomPost->liked_users_count}}
                                                @if(auth()->user()->likedPosts->contains($randomPost->post_id))
                                                    <button type="submit" class="border-0 bg-transparent"><i
                                                            class="fas fa-heart"></i>
                                                    </button>
                                                @else
                                                    <button type="submit" class="border-0 bg-transparent"><i
                                                            class="far fa-heart"></i>
                                                    </button>
                                                @endif
                                            </form>
                                        @endauth
                                        @guest()
                                            <div>
                                                <span>{{$post->liked_users_count}}</span>
                                                <i class="far fa-heart"></i>
                                            </div>
                                        @endguest
                                    </div>
                                    <a href="{{route('post.show', ['post' => $randomPost->post_id])}}"
                                       class="blog-post-permalink">
                                        <h6 class="blog-post-title">{{$randomPost->title}}</h6>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
                <div class="col-md-4 sidebar" data-aos="fade-left">
                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Популярные посты</h5>
                        <ul class="post-list">
                            <li class="post">
                                @foreach($popularPosts as $popularPost)
                                    <a href="{{route('post.show', ['post' => $popularPost->post_id])}}"
                                       class="post-permalink media">
                                        <img src="{{ asset('storage/' . $popularPost->main_image) }}" alt="blog post">
                                        <div class="media-body">
                                            <h6 class="post-title">{{$popularPost->title}}</h6>
                                        </div>
                                    </a>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                    <div class="widget">
                        <h5 class="widget-title">Categories</h5>
                        <img src="{{ asset('assets/images/blog_widget_categories.jpg') }}" alt="categories"
                             class="w-100">
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
