let navLink = document.querySelector('.burger');
let searchLink = document.querySelectorAll('.js-search');
let userLink = document.querySelectorAll('.js-user');
let cartLink = document.querySelectorAll('.js-cart');

let btnCloseSearch = document.querySelector('.js-search-close');
let btnCloseNav = document.querySelector('.js-nav-close');
let btnCloseUser = document.querySelector('.js-close-user');
let btnCloseCart = document.querySelector('.js-cart-close');

let nav = document.querySelector('.nav-bar');
let search = document.querySelector('.nav-search');
let user = document.querySelector('.nav-user');
let cart = document.querySelector('.nav-cart');

navLink.addEventListener('click', () => {
    nav.classList.add('nav-active');
})
btnCloseNav.addEventListener('click', () => {
    nav.classList.remove('nav-active');
})
for (let i = 0; i < searchLink.length; i++) {
    const element = searchLink[i];
    element.addEventListener('click', () => {
        search.classList.add('nav-active');
    })
}
btnCloseSearch.addEventListener('click', () => {
    search.classList.remove('nav-active');
})

for (let i = 0; i < userLink.length; i++) {
    const element = userLink[i];
    element.addEventListener('click', () => {
        user.classList.add('nav-active-user');
    })
}
btnCloseUser.addEventListener('click', () => {
    user.classList.remove('nav-active-user');
})

for (let i = 0; i < cartLink.length; i++) {
    const element = cartLink[i];
    element.addEventListener('click', () => {
        cart.classList.add('nav-active-user');
    })
}
btnCloseCart.addEventListener('click', () => {
    cart.classList.remove('nav-active-user');
})




