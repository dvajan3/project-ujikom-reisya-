@extends('layouts.app')

@section('title', 'Categories - News')

@section('content')
<!-- Category Area Start -->
<section class="category-area pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center mb-50">
                    <h3>News Categories</h3>
                    <p>Browse news by category</p>
                </div>
            </div>
        </div>
        <div class="row">
            @if($categories->count() > 0)
                @foreach($categories as $category)
                <div class="col-lg-4 col-md-6">
                    <div class="single-category mb-30">
                        <div class="category-img">
                            <a href="{{ route('blog') }}">
                                @if($category->articles->first() && $category->articles->first()->foto)
                                    @if(str_starts_with($category->articles->first()->foto, 'assets/'))
                                        <img src="{{ asset($category->articles->first()->foto) }}" alt="{{ $category->nama_kategori }}">
                                    @else
                                        <img src="{{ asset('storage/' . $category->articles->first()->foto) }}" alt="{{ $category->nama_kategori }}">
                                    @endif
                                @else
                                    <img src="{{ asset('assets/img/gallery/category1.png') }}" alt="{{ $category->nama_kategori }}">
                                @endif
                            </a>
                        </div>
                        <div class="category-caption">
                            <h4><a href="{{ route('blog') }}">{{ $category->nama_kategori }}</a></h4>
                            <p>{{ $category->articles->count() }} Articles</p>
                            <div class="category-articles">
                                @foreach($category->articles->take(3) as $article)
                                <div class="single-article mb-15">
                                    <h6><a href="{{ route('blog-details', $article->id_artikel) }}">{{ Str::limit($article->judul, 50) }}</a></h6>
                                    <span>{{ $article->created_at->format('M d, Y') }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <h4>No categories found</h4>
                    <p>Please check back later.</p>
                </div>
            @endif
        </div>
    </div>
</section>
<!-- Category Area End -->
@endsection