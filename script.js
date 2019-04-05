let sendToEmailCheckbox = document.querySelector('#send-to-email-checkbox');
let emailInput = document.querySelector('#email');

console.log('sdf');

if (sendToEmailCheckbox.checked) {
    console.log('asdf');
    emailInput.style.display = 'table-row';
}

sendToEmailCheckbox.addEventListener('change', function (e) {
    if (this.checked) {
        emailInput.style.display = 'table-row';
    } else {
        emailInput.style.display = 'none';
    }
});