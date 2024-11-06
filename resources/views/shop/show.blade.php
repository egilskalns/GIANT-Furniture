@extends('layout')
@section('content')
    @include('components.header')
    <section class="container -card -hero">
        <div class="section-header padding-side-sm -list -fixed">
            <div class="left">
                <div>
                    <a href="{{route('shop.index', ['category' => $category->slug])}}">{{$category->name}}</a> / <a href="{{route('shop.index', ['category' => $subcategory->slug])}}">{{$subcategory->name}}</a>
                </div>
            </div>
        </div>
        <div class="flex padding-side-lg -hero">
            <div class="product-content">
                <div class="product-content__left">
                    <div class="product-images">
                        <div class="product-images__left">
                            @foreach(json_decode($product->alt_img) as $alt_img)
                                <div class="secondary-image"><img src="{{$alt_img}}" alt="{{$product->name}} - image"></div>
                            @endforeach
                        </div>
                        <div class="product-images__right">
                             <div class="primary-image">
                                 <img src="{{$product->main_img}}" alt="{{$product->name}} - image">
                                 <div class="controls">
                                     <button class="back"></button>
                                     <button class="next"></button>
                                 </div>
                             </div>
                        </div>
                    </div>
                </div>
                <div class="product-content__right">
                    <div class="product-content-header">
                        <div>
                            <h1>{{$product->name}}</h1>
                            <button aria-checked="false" data-id="{{$product->id}}" class="add-to-wishlist">
                                <x-carbon-favorite title="Add to Wishlist" class="favorite-icon -empty" />
                                <x-carbon-favorite-filled title="Add to Wishlist" class="favorite-icon -filled" />
                            </button>
                        </div>
                        <p>{{$product->category->name}}</p>
                        <p class="price">
                            <x-carbon-currency-euro title="EUR" class="eur-icon" />{{$product->price * (1-$product->discount)}}
                        </p>
                        @if($product->isInCart())
                            <button type="submit" form="remove-from-cart" aria-checked="true" class="add-to-cart primary-btn" >
                                Remove from Cart
                            </button>
                        @else
                            <button type="submit" form="add-to-cart" aria-checked="false" class="add-to-cart primary-btn" >
                                Add to Cart
                            </button>
                        @endif
                        <form hidden id="add-to-cart" action="{{route('cart.add')}}" method="post">
                            @csrf
                            <input name="id" value="{{$product->id}}" type="hidden">
                            <input name="name" value="{{$product->name}}" type="hidden">
                            <input name="price" value="{{$product->price}}" type="hidden">
                            <input name="attributes[discount]" value="{{$product->discount}}" type="hidden">
                            <input name="attributes[subcategory][name]" value="{{$subcategory->name}}" type="hidden">
                            <input name="attributes[subcategory][slug]" value="{{$subcategory->slug}}" type="hidden">
                            <input name="attributes[category][name]" value="{{$category->name}}" type="hidden">
                            <input name="attributes[category][slug]" value="{{$category->slug}}" type="hidden">
                            <input name="attributes[slug]" value="{{$product->slug}}" type="hidden">
                            <input name="attributes[image]" value="{{$product->main_img}}" type="hidden">
                        </form>
                        <form hidden id="remove-from-cart" action="{{route('cart.remove', ['id' => $product->id])}}" method="post">
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                    <div class="product-content-opt">
                        <h4>Specifications</h4>
                        <div class="spec-item"><p>Length: </p><span>{{json_decode($product->specification)->length}}mm</span></div>
                        <div class="spec-item"><p>Width: </p><span>{{json_decode($product->specification)->width}}mm</span></div>
                        <div class="spec-item"><p>Height: </p><span>{{json_decode($product->specification)->height}}mm</span></div>
                        <div class="spec-item"><p>Weight: </p><span>{{json_decode($product->specification)->weight}}kg</span></div>
                    </div>
                    <div class="product-content-opt">
                        <h4>Description</h4>
                        <p class="description">{{$product->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('components.footer')
@endsection
