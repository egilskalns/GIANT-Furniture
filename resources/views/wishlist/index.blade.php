@extends('layout')
@section('content')
    @include('components.header')
    <section class="container -card -hero">
        <div class="section-header padding-side-lg -list">
            <div class="left">
                <h4>Your Wishlist</h4>
            </div>
            @guest
                <div class="right">
                    <h4 class="advice-text">To keep your data, we recommend that you <a class="mobile-menu-toggle-right">Log in</a> or <a href="{{route('register')}}">Register</a></h4>
                </div>
            @endguest
        </div>
        <div class="flex padding-side-lg">
            <div class="cart-content">
                <div class="cart-content__left">
                    @if(count($wishlist) == 0)
                        <div class="cart-empty">
                            <h4>There are no items in your wishlist.</h4>
                        </div>
                    @endif
                    @foreach($wishlist as $item)
                        <div class="cart-item">
                            <div class="group">
                                <div class="cart-item__left">
                                    <div class="cart-item-image">
                                        <img src="{{$item['attributes']['image']}}" alt="">
                                    </div>
                                </div>
                                <div class="cart-item__right">
                                    <div class="indent">
                                        <a href="{{route('shop.show', ["category" => $item['attributes']['category']['slug'], "product" => $item['attributes']['slug']])}}" class="cart-item-name">{{$item['name']}}</a>
                                        <div class="price">
                                            @if($item['attributes']['discount'] > 0)
                                                <span class="cart-item-disPrice">
                                                    <x-carbon-currency-euro class="eur-icon" />
                                                    <span>{{$item['price'] * (1 - $item['attributes']['discount'])}}</span>
                                                </span>
                                                <span class="cart-item-fulPrice">€{{$item['price']}}</span>
                                            @else
                                                <span class="cart-item-disPrice">
                                                    <x-carbon-currency-euro class="eur-icon" />
                                                    <span>{{$item['price']}}</span>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <p class="cart-item-category">{{$item['attributes']['category']['name']}}</p>
                                </div>
                            </div>
                            <div class="cart-item__bottom">
                                <button form="remove-item-from-wishlist" class="remove-item">
                                    <x-carbon-trash-can title="Remove Item" class="icon"/>
                                    Remove item
                                </button>
                                <form id="remove-item-from-wishlist" action="{{route('wishlist.remove', ['id' => $item['id']])}}" method="post">
                                    @csrf
                                    @method("DELETE")
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="cart-content__right">
                    <h4>Summary</h4>
                    <div class="group">
                        <div class="c-box">
                            <p>Subtotal</p>
                            <span>
                                <x-carbon-currency-euro class="eur-icon" />
                                {{$subtotal}}
                            </span>
                        </div>
                        <div class="c-box">
                            <p>Discount</p>
                            <span>
                                <x-carbon-currency-euro class="eur-icon" />
                                {{$total - $subtotal}}
                            </span>
                        </div>
                        <div class="c-box">
                            <p>Estimated Shipping & Handling</p>
                            <span>Free</span>
                        </div>
                        <div class="c-box">
                            <p>Estimated Tax</p>
                            <span>-</span>
                        </div>
                    </div>
                    <div class="c-box -indent">
                        <p>Total</p>
                        <span>
                            <x-carbon-currency-euro class="eur-icon" />
                            {{$total}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('components.footer')
@endsection
