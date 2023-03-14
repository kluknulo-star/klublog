@extends('layouts.main')


@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Категории</h1>
            <section class="featured-posts-section">
                <div class="row justify-content-center">
                    @foreach($categories as $category)
                    <div class="col-sm-4 mb-3">
                        <a href="{{route('category.posts.index', $category->category_id)}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-dark">{{$category->title}}</h5>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endforeach
                </div>

            </section>
        </div>

    </main>
@endsection
