const loginBtn = document.getElementById('loginBtn');
const registerBtn = document.getElementById('registerBtn');
const loginForm = document.getElementById('login');
const registerForm = document.getElementById('register');
if(loginBtn){
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
}

//URL actual
const currentUrl = window.location.href;

// Verificar si la URL contiene "ProductsController.php"
if (currentUrl.includes("ProductsController.php")) {
    // Crear un objeto URLSearchParams con la URL
    const urlParams = new URLSearchParams(window.location.search);

    // Obtener el valor del parámetro "select"
    var selectValue = urlParams.get('select');

    // Verificar si el valor de "select" existe
    if (selectValue !== null) {
        console.log('Valor de "select":', selectValue);
    } else {
        console.log('El parámetro "select" no está presente en la URL.');
    }
    if(selectValue==="peripherals"){
        const a = document.querySelector("#periphericals");
        if (a) {
            a.style.color = "#08B451"; 
        } 
    }else if(selectValue==="all"){
        const a = document.querySelector("#all");
        if (a) {
            a.style.color = "#08B451"; 
        } 
    }else if(selectValue==="hardware"){
        const a = document.querySelector("#hardware");
        if (a) {
            a.style.color = "#08B451"; 
        } 
    }else if(selectValue==="key caps"){
        const a = document.querySelector("#keyCaps");
        if (a) {
            a.style.color = "#08B451"; 
        } 
    }
} else {
    console.log('La URL no contiene "ProductsController.php".');
}
