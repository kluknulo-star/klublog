@extends('layouts.main')


@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200"> {{$date}}
                • {{$post->comments->count()}} Комментария(-иев)</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('storage/' . $post->main_image)}}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>
            <section class="likes">
                <div class="d-flex justify-content-end">
                    @auth()
                        <form action="{{route('post.like.store', $post->post_id)}}" method="post">
                            @csrf

                            @if(auth()->user()->likedPosts->contains($post->post_id))
                                <span>{{$post->liked_users_count}}</span>
                                <button type="submit" class="border-0 bg-transparent"><i class="fas fa-heart"></i>
                                </button>
                            @else
                                <span>{{$post->liked_users_count}}</span>
                                <button type="submit" class="border-0 bg-transparent"><i class="far fa-heart"></i>
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
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">


                    @if($relatedPosts->count())
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Рекомендации</h2>
                        <div class="row">
                            @foreach($relatedPosts as $relatedPost)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <a href="{{route('post.show', ['post' => $relatedPost->post_id])}}">
                                        <img src="{{asset('storage/' . $relatedPost->main_image)}}" alt="related post"
                                             class="post-thumbnail">
                                        <p class="post-category">{{$relatedPost->category->title}}</p>
                                        <h5 class="post-title">{{$relatedPost->title}}</h5>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    @endif
                    <section class="comment-list">
                        <h2 class="section-title mb-5" data-aos="fade-up">Комментарии ({{$post->comments->count()}})</h2>

                        @foreach($post->comments as $comment)
                        <div class="comment-text">
                    <span class="username">
                      <div><b>{{$comment->user->name}}</b></div>
                      <span class="text-muted float-right">{{$comment->getDateAsCarbon()}}</span>
                    </span><!-- /.username -->
                            {{$comment->message}}
                        </div>
                        </br>
                        @endforeach
                    </section>
                    @auth()
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Отправить комментарий</h2>
                        <form action="{{route('post.comment.store', $post->post_id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="comment" class="sr-only">Comment</label>
                                    <textarea name="message" id="comment" class="form-control"
                                              placeholder="Оставьте свой комментарий"
                                              rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Send Message" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                        @endauth()
                </div>
            </div>
        </div>
    </main>
@endsection
