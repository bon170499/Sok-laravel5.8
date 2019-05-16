window.onload = () => {
    filterAll();
    filterMin();
    filtersMin();
    filtermMin();
    filterMax();
}
let fee = document.querySelectorAll('.js-fee');
let all = document.querySelector('.js-all');
let min = document.querySelector('.js-min');
let sMin = document.querySelector('.js-sMin');
let mMin = document.querySelector('.js-mMin');
let max = document.querySelector('.js-max');
let product = document.querySelectorAll('.js-product');
let valueFee = [];
let count = fee.length;
for (let i = 0; i < count; i++) {
    let element = fee[i];
    valueFee.push(parseFloat(element.innerHTML));
}
let filterAll = () => {
    all.addEventListener('click',() => {
        for (let i = 0; i < count; i++) {
            const ele = product[i];
            ele.style.display = 'block';
        }
    })
}
const filterMin = () => {
    min.onclick = () => {
        for (let i = 0; i < count; i++) {
            const ele = product[i];
            const val = valueFee[i];
            if(val > 300000)
                ele.style.display = 'none';
            else
                ele.style.display = 'block';
        }
    }
}
const filtersMin = () => {
    sMin.onclick= () => {
        for (let i = 0; i < count; i++) {
            const ele = product[i];
            const val = valueFee[i];
            if(val >= 300000 && val <= 500000)
                ele.style.display = 'block';
            else
                ele.style.display = 'none';
        }
    }
}
const filtermMin = () => {
    mMin.onclick = () => {
        for (let i = 0; i < count; i++) {
            const ele = product[i];
            const val = valueFee[i];
            if(val >= 500000 && val <= 700000)
                ele.style.display = 'block';
            else
                ele.style.display = 'none';
        }
    }
}
const filterMax = () => {
    max.onclick = () => {
        for (let i = 0; i < count; i++) {
            const ele = product[i];
            const val = valueFee[i];
            if(val < 700000)
                ele.style.display = 'none';
            else
                ele.style.display = 'block';
        }
    }
}




