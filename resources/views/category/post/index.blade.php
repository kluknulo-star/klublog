@extends('layouts.main')


@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Посты по категории "{{$category->title}}"</h1>
            <section class="featured-posts-section">
                @if (!count($posts))
                    <h2 data-aos="fade-left"> Нет постов по заданной категории</h2>
                @endif
                <div class="row mb-4">
                    @foreach($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-left">
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
        </div>

    </main>
@endsection
