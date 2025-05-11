

document.addEventListener('DOMContentLoaded', () => {
    const options = document.querySelectorAll('.size-option');
    const dostEl  = document.querySelector('.is_dostupnost');

    options.forEach(opt => {
        opt.addEventListener('click', () => {
            options.forEach(o => o.classList.remove('active'));
            opt.classList.add('active');


            const raw = opt.getAttribute('data-available');
            const qty = parseInt(raw, 10);
            const isAvail = qty > 0;

            if (qty > 0) {
                dostEl.textContent = `Skladom: ${qty} ks`;
            } else {
                dostEl.textContent = 'Nie je skladom';
            }
        });
    });
});
