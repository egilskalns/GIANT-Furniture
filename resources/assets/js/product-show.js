// Add to Wishlist
const wishlistBtn = document.querySelector('.add-to-wishlist');
let wishlist = JSON.parse(sessionStorage.getItem('wishlist') ?? "[]");

if (wishlistBtn) {
    if (wishlist.includes(wishlistBtn.getAttribute('data-id'))) {
        wishlistBtn.setAttribute('aria-checked', 'true');
    }

    wishlistBtn.addEventListener('click', (e) => {
        const productId = wishlistBtn.getAttribute('data-id');

        if (wishlistBtn.getAttribute('aria-checked') === 'true') {
            wishlistBtn.setAttribute('aria-checked', 'false');
            wishlist = wishlist.filter(pr => pr !== wishlistBtn.getAttribute('data-id'));
        } else {
            wishlistBtn.setAttribute('aria-checked', 'true');
            if (!wishlist.includes(productId)) {
                wishlist.push(productId);
            }
        }

        sessionStorage.setItem('wishlist', JSON.stringify(wishlist));

        console.log(sessionStorage.getItem('wishlist'));
    });
}

// Add to Cart
const addToCartBtn = document.querySelector('.add-to-cart');

if (addToCartBtn) {
    addToCartBtn.addEventListener('click', (e) => {
        if (addToCartBtn.getAttribute('aria-checked') === 'true') {
            addToCartBtn.setAttribute('aria-checked', 'false');
            addToCartBtn.innerText = "Add to Cart";
        } else {
            addToCartBtn.setAttribute('aria-checked', 'true');
            addToCartBtn.innerText = "Remove from Cart";
        }
    });
}