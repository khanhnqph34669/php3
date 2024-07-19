@extends('Layout.Client.main')
@section('content')
<div class="container pt-5">
    <h2>Search Results for "{{ $query }}"</h2>
    @if($resultPost->isEmpty())
        <p>No results found.</p>
    @else
        <div class="row">
            @foreach($resultPost as $post)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="{{ $post->thumbnail }}" class="card-img-top" alt="{{ $post->title }}">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('detailPost', $post->id) }}">{{ $post->title }}</a></h5>
                            <p class="card-text">{{ Str::limit($post->content, 150) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $resultPost->links('vendor.pagination.bootstrap-5') }}
    @endif
    
@endsection