<header class="main-header">
    <div class="left">
        <button aria-expanded="false" class="mobile-menu-toggle">
            <span class="mobile-menu-icon">
                <span></span>
            </span>
            <span class="mobile-menu-options">
                <span>Menu</span>
                <span>Close.</span>
            </span>
        </button>
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
    <div id="mobile-menu" aria-expanded="false" class="mobile-menu">
        <aside class="side-container">
            <div class="options">
                <div class="opt-box">
                    <a href="" class="option">New</a>
                    <x-carbon-close class="opt-icon" />
                </div>
                <a href="">Sofas</a>
                <a href="">Beds & Headboards</a>
                <a href="">Nightstands</a>
                <a href="">Beds</a>
                <a href="">Beds</a>
                <a href="">Beds</a>
                <a href="">Beds</a>
            </div>
        </aside>
    </div>
</header>
