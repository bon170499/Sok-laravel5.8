let hidden = () => {
    $('.js-desc').click(function () {
        $(this).toggleClass('active-desc');
        $('.info-right__desc p').slideToggle(500);
    })
}

let modal = () => {
    let modal = document.getElementById('myModal');
    let img = document.querySelectorAll('.js-modal');
    let modalImg = document.getElementById("img01");
    for (let i = 0; i < img.length; i++) {
        const ele = img[i];
        ele.onclick = function () {
            modal.style.display = "block";
            modalImg.src = this.src;
        }
    }
    let span = document.querySelector("#modal-close");
    span.addEventListener('click', () => {
        modal.style.display = "none";
    })
}
$(document).ready(function () {
    hidden();
    modal();
})
