const loginBtn = document.getElementById('loginBtn');
const registerBtn = document.getElementById('registerBtn');
const loginForm = document.getElementById('login');
const registerForm = document.getElementById('register');

loginBtn.addEventListener('click', function (event) {
    event.preventDefault();
    loginForm.style.display = 'block';
    registerForm.style.display = 'none';
});

registerBtn.addEventListener('click', function (event) {
    event.preventDefault();
    loginForm.style.display = 'none';
    registerForm.style.display = 'block';
});