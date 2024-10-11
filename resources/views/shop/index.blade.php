@extends('layout')
@section('content')
    @include('components.header')
    <section class="container -card -hero">
        <div class="section-header padding-side-sm -list -fixed">
            <div class="left">
                @php
                    if ($subCategories) {
                        $mainCategory = $category;
                        $subCategory = null;
                    } else {
                        $mainCategory = $category->parent;
                        $subCategory = $category;
                    }
                @endphp
                @if($subCategory)
                    <div>
                        <a href="{{route('shop.index', ['category' => $mainCategory->slug])}}">{{$mainCategory->name}}</a> / <a href="{{route('shop.index', ['category' => $subCategory->slug])}}">{{$subCategory->name}}</a>
                    </div>
                @endif
                <h4>{{$category->name}} ({{$productsCount}})</h4>
            </div>
            <div class="right">
                <button class="h-filters">
                    <span>Hide Filters</span>
                    <x-carbon-settings-adjust class="icon"/>
                </button>
                <button aria-expanded="false" class="sort-drop">
                    <span>Sort By:</span>
                    <span class="sort-opt">Featured</span>
                    <span class="arrow arrow-down"></span>
                </button>
                <div aria-expanded="false" class="drop-list">
                    <button aria-current="true" class="featured">Featured</button>
                    <button aria-current="false" class="newest">Newest</button>
                    <button aria-current="false" class="p-desc">Price: High-Low</button>
                    <button aria-current="false" class="p-asc">Price: Low-High</button>
                </div>
            </div>
        </div>
        <div class="flex padding-side-sm -hero">
            <aside aria-expanded="true" class="filters-side">
                <div class="org">
                    @if($subCategories)
                        @foreach($subCategories as $subCategory)
                            <a href="{{route('shop.index', ['category' => $subCategory->slug])}}">{{$subCategory->name}}</a>
                        @endforeach
                    @endif
                </div>
                <div class="accordion">
                    <div class="item">
                        <button aria-expanded="false" class="accordion-header">
                            <span>Sale & Offers</span>
                            <span class="arrow arrow-down"></span>
                        </button>
                        <div aria-expanded="false" class="accordion-content">
                            <div class="option">
                                <input type="checkbox" name="sale" id="sale-filter">
                                <span>Sale</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <button aria-expanded="false" class="accordion-header">
                            <span>Availability</span>
                            <span class="arrow arrow-down"></span>
                        </button>
                        <div aria-expanded="false" class="accordion-content">
                            <div class="option">
                                <input type="checkbox" name="in_warehouse" id="in-warehouse-filter">
                                <span>In Warehouse</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <button aria-expanded="false" class="accordion-header">
                            <span>Color</span>
                            <span class="arrow arrow-down"></span>
                        </button>
                        <div aria-expanded="false" class="accordion-content">
                            <div class="grid">
                                @foreach($paginatedProducts as $product)
                                    <button aria-checked="false" class="color-picker">
                                        <span class="color" style="background-color: {{$product->color}}"></span>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <button aria-expanded="false" class="accordion-header">
                            <span>Price</span>
                            <span class="arrow arrow-down"></span>
                        </button>
                        <div aria-expanded="false" class="accordion-content">
                            <div class="slider-option">
                                <div class="slider-numeric">
                                    <div>
                                        <x-carbon-currency-euro title="EUR" class="icon" />
                                        <input type="number" min="{{$minPrice}}" max="{{$maxPrice}}" name="price-from" id="price-from-filter" value="{{$minPrice}}">
                                    </div>
                                    <span>-</span>
                                    <div>
                                        <x-carbon-currency-euro title="EUR" class="icon" />
                                        <input type="number" min="{{$minPrice}}" max="{{$maxPrice}}" name="price-to" id="price-to-filter" value="{{$maxPrice}}">
                                    </div>
                                </div>
                                <div class="slider">
                                    <div class="rail"></div>
                                    <div class="range"></div>
                                    <div class="from"></div>
                                    <div class="to"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <button aria-expanded="false" class="accordion-header">
                            <span>Dimensions</span>
                            <span class="arrow arrow-down"></span>
                        </button>
                        <div aria-expanded="false" class="accordion-content">
                            <div class="slider-option">
                                <div class="slider-numeric">
                                    <div>
                                        <x-carbon-arrow-right title="Length" class="icon" />
                                        <input type="number" min="{{$minPrice}}" max="{{$maxPrice}}" name="price-from" id="price-from-filter" value="{{$minPrice}}">
                                    </div>
                                    <span>-</span>
                                    <div>
                                        <x-carbon-arrow-right title="Length" class="icon" />
                                        <input type="number" min="{{$minPrice}}" max="{{$maxPrice}}" name="price-to" id="price-to-filter" value="{{$maxPrice}}">
                                    </div>
                                </div>
                                <div class="slider">
                                    <div class="rail"></div>
                                    <div class="range"></div>
                                    <div class="from"></div>
                                    <div class="to"></div>
                                </div>
                            </div>
                            <div class="slider-option">
                                <div class="slider-numeric">
                                    <div>
                                        <x-carbon-arrow-up-right title="Height" class="icon" />
                                        <input type="number" min="{{$minPrice}}" max="{{$maxPrice}}" name="price-from" id="price-from-filter" value="{{$minPrice}}">
                                    </div>
                                    <span>-</span>
                                    <div>
                                        <x-carbon-arrow-up-right title="Height" class="icon" />
                                        <input type="number" min="{{$minPrice}}" max="{{$maxPrice}}" name="price-to" id="price-to-filter" value="{{$maxPrice}}">
                                    </div>
                                </div>
                                <div class="slider">
                                    <div class="rail"></div>
                                    <div class="range"></div>
                                    <div class="from"></div>
                                    <div class="to"></div>
                                </div>
                            </div>
                            <div class="slider-option">
                                <div class="slider-numeric">
                                    <div>
                                        <x-carbon-arrow-up title="Width" class="icon" />
                                        <input type="number" min="{{$minPrice}}" max="{{$maxPrice}}" name="price-from" id="price-from-filter" value="{{$minPrice}}">
                                    </div>
                                    <span>-</span>
                                    <div>
                                        <x-carbon-arrow-up title="Width" class="icon" />
                                        <input type="number" min="{{$minPrice}}" max="{{$maxPrice}}" name="price-to" id="price-to-filter" value="{{$maxPrice}}">
                                    </div>
                                </div>
                                <div class="slider">
                                    <div class="rail"></div>
                                    <div class="range"></div>
                                    <div class="from"></div>
                                    <div class="to"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <div aria-expanded="false" class="product-list">
                @foreach($paginatedProducts as $product)
                    <a href="{{route('shop.show', ['category' => $category->slug, 'product' => $product->slug])}}" class="product-item">
                        <div class="cover-img">
                            <img src="{{$product->main_img}}" alt="{{$product->name}}">
                        </div>
                        <div class="product-info">
                            <div>
                                <p class="title">{{$product->name}}</p>
                                <span class="color" style="background-color: {{$product->color}}"></span>
                            </div>
                            <div class="dimensions">
                                <span><x-carbon-arrow-right class="arrow" /><span>{{json_decode($product->specification)->length}}mm</span></span>
                                <span><x-carbon-arrow-up-right class="arrow" /><span>{{json_decode($product->specification)->width}}mm</span></span>
                                <span><x-carbon-arrow-up class="arrow" /><span>{{json_decode($product->specification)->height}}mm</span></span>
                            </div>
                            <p class="price">
                                <x-carbon-currency-euro title="EUR" class="eur-icon" />
                                {{$product->price}}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @include('components.footer')
@endsection
