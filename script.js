document.querySelector('#send-to-email-checkbox').addEventListener('change', function (e) {
    let emailInput = document.querySelector('#email');

    if (this.checked) {
        emailInput.style.display = 'table-row';
    } else {
        emailInput.style.display = 'none';
    }
});