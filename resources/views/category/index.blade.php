@extends('layouts.main')


@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Категории</h1>
            <section class="featured-posts-section">
                <div class="row mb-4">
                    <ul>
                    @foreach($categories as $category)
                        <li>
                            <a href="{{route('category.posts.index', $category->category_id)}}"> {{$category->title}}</a>
                        </li>
                    @endforeach
                    </ul>


                </div>

            </section>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, autem distinctio explicabo labore
                necessitatibus ratione voluptatibus? Aliquid asperiores consequatur dolores libero minima quas quia
                quisquam, quo reprehenderit, temporibus ut, vero?</p>
        </div>

    </main>
@endsection
