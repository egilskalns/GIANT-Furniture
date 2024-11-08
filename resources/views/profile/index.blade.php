@extends('layout')
@section('content')
    @include('components.header')
    <nav class="target-header -hero -fixed">
        <h4>my<span>GIANT</span></h4>
        <div class="tabs">
            <a href="" class="tab">Overview</a>
            <a href="" aria-selected="true" class="tab">My Profile</a>
            <a href="" class="tab">My Orders</a>
        </div>
    </nav>
    <section class="container -hero -gray-bg padding-side-lg">
        <div class="profile-header">
            <h4>My Profile</h4>
        </div>
        <div class="profile-content">
            <div class="profile-content__left">
                <div class="content-box">
                    <h4>Personal Information</h4>
                    <div class="content-box__content">
                        <form action="" method="post">
                            <span>Mandatory fields*</span>
                            <span class="label">Title*</span>
                            <select name="title" id="title">
                                <option value="{{$profile->title}}">{{$profile->title}}</option>
                                @foreach($allTitles as $title)
                                    @if($title !== $profile->title)
                                        <option value="{{$title}}">{{$title}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <span class="label">First Name*</span>
                            <input type="text" name="first_name" id="first_name" value="{{$profile->first_name}}">
                            <span class="label">Last Name*</span>
                            <input type="text" name="last_name" id="last_name" value="{{$profile->last_name}}">
                            <span class="label">Country/Region*</span>
                            <select name="country_region" id="country_region">
                                <option value="{{$profile->country_region()->id}}">{{$profile->country_region()->name}}</option>
                                @foreach($allCountries as $country)
                                    @if($country->id !== $profile->country_region()->id)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="flex">
                                <input type="checkbox" name="" id="">
                                <span>Contactable by mail</span>
                            </div>
                            <div class="flex">
                                <input type="checkbox" name="" id="">
                                <span>Contactable by phone</span>
                            </div>
                            <button class="primary-btn" type="submit" aria-checked="false">Save your information</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="profile-content__right">
                <div class="content-box">
                    <h4>Login Information</h4>
                    <div class="content-box__content">
                        <span class="label">Email</span>
                        <div class="email">
                            <span>{{$profile->email}}</span>
                        </div>
                        <span class="label">Password</span>
                        <a class="primary-btn left" href="" aria-checked="false">Change password</a>
                    </div>
                </div>
                <div class="content-box">
                    <h4>My Address Book</h4>
                    <div class="content-box__content">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="main-footer -margin-0 padding-side-lg">
        <div class="footer-items">
            <div class="left">
                <x-carbon-language class="language-icon"/>
                <span>English (INTL)</span>
            </div>
            <div class="right">
                <a href="">Legal & privacy</a>
                <a href="">Cookies</a>
            </div>
        </div>
        <div class="logo-box">
            <a href="{{route('home')}}">GIANT</a>
        </div>
    </footer>
@endsection
