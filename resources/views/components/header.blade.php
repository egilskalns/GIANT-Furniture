<header class="main-header">
    <div class="left">
        <div class="menu-box">
            <x-carbon-menu class="menu-icon" />
            <span>Menu</span>
        </div>
        <div class="search-box">
            <x-carbon-search class="search-icon" />
            <span>Search</span>
        </div>
    </div>
    <div class="logo"><a href="{{route('home')}}">GIANT</a></div>
    <div class="right">
        <div class="contact">
            <p>Call Us</p>
        </div>
        <div class="items">
            <x-carbon-shopping-cart class="cart-icon" />
            <x-carbon-favorite class="favorite-icon" />
            <x-carbon-user class="user-icon" />
        </div>
    </div>
</header>
