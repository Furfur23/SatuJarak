const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
        // Toggle tipe atribut input antara 'password' dan 'text'
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        
        // Toggle ikon antara mata terbuka dan mata tertutup
        this.classList.toggle('fa-eye-slash');
    });