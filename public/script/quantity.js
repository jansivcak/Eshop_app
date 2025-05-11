



document.addEventListener('DOMContentLoaded', () => {

    const sizeBtns     = document.querySelectorAll('.size-option');
    const minusBtn     = document.getElementById('qtyMinus');
    const plusBtn      = document.getElementById('qtyPlus');
    const qtyInput     = document.getElementById('qtyInput');
    const sizeInput    = document.getElementById('selectedSize');
    const stockDisplay = document.querySelector('.is_dostupnost');


    const min = 1;
    let   max = 1;


    function sanitize() {
        let v = parseInt(qtyInput.value, 10) || min;
        v = Math.max(min, Math.min(v, max));
        qtyInput.value = v;
        minusBtn.disabled = (v <= min);
        plusBtn.disabled  = (v >= max);
    }


    minusBtn.addEventListener('click', e => {
        e.preventDefault();
        sanitize();
        let v = parseInt(qtyInput.value, 10);
        if (v > min) {
            qtyInput.value = v - 1;
            sanitize();
        }
    });
    plusBtn.addEventListener('click', e => {
        e.preventDefault();
        sanitize();
        let v = parseInt(qtyInput.value, 10);
        if (v < max) {
            qtyInput.value = v + 1;
            sanitize();
        }
    });


    sizeBtns.forEach(btn => btn.addEventListener('click', () => {

        sizeBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');


        const size      = btn.getAttribute('data-size');
        const available = parseInt(btn.getAttribute('data-available'), 10) || 0;


        sizeInput.value = size;


        max = available;
        qtyInput.max = max;
        sanitize();


        stockDisplay.textContent = available > 0
            ? `Skladom: ${available} ks`
            : 'Nie je skladom';
    }));


    sanitize();
});
