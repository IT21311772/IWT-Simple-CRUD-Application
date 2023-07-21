const form = document.getElementById('form');
const name = document.getElementById('name');
const email = document.getElementById('email');
const phone = document.getElementById('phone');
const username = document.getElementById('username');
const password = document.getElementById('password');

form.addEventListener('submit', e => {
    e.preventDefault();

    validateInputs();
});

const validateInputs = () => {
    const nameValue = name.value.trim();
    const emailValue = email.value.trim();
    const phoneValue = phone.value.trim();
    const usernameValue = username.value.trim();
    const passwordValue = password.value.trim();
}