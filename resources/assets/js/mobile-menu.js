const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
const mobileMenu = document.getElementById('mobile-menu');
const body = document.querySelector('body');

function menuToggle() {
    if (mobileMenu.getAttribute('aria-expanded') === 'true') {
        mobileMenu.setAttribute('aria-expanded', 'false');
        mobileMenuToggle.setAttribute('aria-expanded', 'false');
        body.style.overflow = 'auto';
    } else {
        mobileMenu.setAttribute('aria-expanded', 'true');
        mobileMenuToggle.setAttribute('aria-expanded', 'true');
        body.style.overflow = 'clip';
    }
}

mobileMenuToggle.addEventListener('click', menuToggle);
