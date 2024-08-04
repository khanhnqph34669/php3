@extends('Layout.Client.main')
@section('title', 'Category')
@section('content')
    <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30 d-flex justify-content-between align-items-center">
                        <h2>What's New</h2>
                        <div class="properties__button">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link {{ !$slug ? 'active' : '' }}"
                                        href="{{ route('category.index') }}">All</a>
                                    @foreach ($categories as $category)
                                        <a class="nav-item nav-link {{ $slug == $category->slug ? 'active' : '' }}"
                                            href="{{ route('category.index', $category->slug) }}">{{ $category->name }}</a>
                                    @endforeach
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100 news-card">
                            <div class="news-img-container">
                                <img src="{{ \Storage::url($post->thumbnail) }}" class="card-img-top" alt="Ảnh bìa bài viết">
                            </div>
                            <div class="card-body">
                                <span class="badge bg-primary mb-2">{{ $post->category_name }}</span>
                                <h5 class="card-title"><a href="{{ url('/detail/' . $post->slug) }}" class="text-dark">{{ $post->title }}</a></h5>
                                <p class="card-text"><small class="text-muted">By {{ $post->author_name }}</small></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Whats New End -->

    <!--Start pagination -->
    <div class="pagination-area pb-45 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        {{ $posts->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End pagination  -->

    <style>
        .section-tittle h2 {
            font-size: 28px;
            font-weight: 600;
            color: #333;
        }
        .news-card {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }
        .news-img-container {
            height: 200px;
            overflow: hidden;
        }
        .news-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .news-card:hover .news-img-container img {
            transform: scale(1.05);
        }
        .card-title a {
            text-decoration: none;
            color: #333;
            transition: color 0.3s ease;
        }
        .card-title a:hover {
            color: #007bff;
        }
        .nav-tabs .nav-link {
            color: #333;
            border: none;
            padding: 10px 15px;
            transition: all 0.3s ease;
        }
        .nav-tabs .nav-link.active, .nav-tabs .nav-link:hover {
            color: #fff;
            background-color: #007bff;
            border-radius: 20px;
        }
    </style>
@endsection