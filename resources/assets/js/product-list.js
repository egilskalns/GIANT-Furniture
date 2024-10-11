// Hide/Show filters
const hideShowBtn = document.querySelector('.h-filters');
const filters = document.querySelector('.filters-side');
const productList = document.querySelector('.product-list');
const footer = document.querySelector('.main-footer');

const btnTextElement = hideShowBtn.querySelector('span');

document.addEventListener('scroll', () => {
    let windowY = window.scrollY + window.innerHeight;
    let footerY = document.documentElement.scrollHeight - footer.getBoundingClientRect().height;

    if (windowY - footerY >= 0) {
        filters.style.bottom = windowY - footerY + 'px';
    } else {
        filters.style.bottom = '0';
    }
});

function filtersVisibility() {
    if (filters.getAttribute('aria-expanded') === 'true') {
        filters.setAttribute('aria-expanded', 'false');
        productList.setAttribute('aria-expanded', 'true');
        btnTextElement.innerHTML = "Show Filters";
    } else {
        filters.setAttribute('aria-expanded', 'true');
        productList.setAttribute('aria-expanded', 'false');
        btnTextElement.innerHTML = "Hide Filters";
    }
}

hideShowBtn.addEventListener('click', filtersVisibility);


// Sort drop-down menu
const dropBtn = document.querySelector('.sort-drop');
const dropList = document.querySelector('.drop-list');

function listControls() {
    if (dropBtn.getAttribute('aria-expanded') === 'true') {
        dropBtn.setAttribute('aria-expanded', 'false');
        dropList.setAttribute('aria-expanded', 'false');
    } else {
        dropBtn.setAttribute('aria-expanded', 'true');
        dropList.setAttribute('aria-expanded', 'true');
    }
}

dropBtn.addEventListener('click', listControls);

// Accordion
const accordionHeader = document.querySelectorAll('.accordion-header');

function accordionControls(e) {
    const btn = e.target;
    const content = e.target.parentNode.lastElementChild

    if (btn.getAttribute('aria-expanded') === 'true') {
        btn.setAttribute('aria-expanded', 'false');
        content.setAttribute('aria-expanded', 'false');
    } else {
        btn.setAttribute('aria-expanded', 'true');
        content.setAttribute('aria-expanded', 'true');
    }
}

accordionHeader.forEach((btn) => {
    btn.addEventListener('click', accordionControls);
});

// Slider
