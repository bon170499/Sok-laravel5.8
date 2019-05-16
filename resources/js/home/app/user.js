let signUp = document.querySelector('#js-up');
let signIn = document.querySelector('#js-in');
let btnIn = document.querySelector('#btn-in');
let btnUp = document.querySelector('#btn-up');
btnUp.addEventListener('click', () => {
    signIn.style.display = 'none';
    signUp.style.display = 'block';
    btnIn.classList.add('nav-title-click');
    btnUp.classList.remove('nav-title-click');
})
btnIn.addEventListener('click', () => {
    signIn.style.display = 'block';
    signUp.style.display = 'none';
    btnUp.classList.add('nav-title-click');
    btnIn.classList.remove('nav-title-click');
})
