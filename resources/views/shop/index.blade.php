@extends('layout')
@section('content')
    @include('components.header')
    <section class="container -card">
        <div class="section-header">
            <h4>Explore a Wide Range of Premium Furniture</h4>
        </div>
        <div class="grid padding-side-lg">
            @foreach($products as $product)
                <a href="{{route('shop.show', ['category' => $category->slug, 'product' => $product->slug])}}" class="card">
                    <div class="cover-img">
                        <img src="{{$product->main_img}}" alt="">
                    </div>
                    <div class="card-title">
                        <p>{{$product->name}}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
    @include('components.footer')
@endsection
