


function togglePaymentFields() {
    const payment = document.querySelector('input[name="payment"]:checked')?.value;
    const cardFields = document.getElementById('card-fields');

    if (payment === 'card') {
        cardFields.style.display = 'block';
    } else {
        cardFields.style.display = 'none';
    }
}




