window.onscroll = function () {
    stickNav()
    scrollFunction()
}
let nav = document.querySelector('.header-main')
let stickMenu = document.querySelector('#header-fixed')
let prev = window.pageYOffset
const stickNav = () => {
    if (prev > 100)
        stickMenu.classList.add('stick')
    else
        stickMenu.classList.remove('stick')
}
const scrollFunction = () => {
    let current = window.pageYOffset
    if (prev > current)
        stickMenu.style.top = '0'
    else
        stickMenu.style.top = '-100px'
    prev = current
}

