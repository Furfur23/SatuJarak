<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/login.css') }}">
     <!-- <link rel="stylesheet" href="login.css"> -->
    <title>LOGIN PAGE</title>
</head>
<body>

<div class="left-side">
 <div class="container-leftside">
    <div class="content">
        <h2>Selamat datang</h2>
        <h4>Silahkan masuk ke akun anda untuk melanjutkan layanan</h4>
    </div>
        <img src="images/logo.png" alt="">
 </div>
</div>
    
<div class="right-side">
    <div class="login-container">
        <h2>Silahkan Login</h2>
        <form action="">
            <label for="username">NIK: </label>
            <input type="number" name="NIK" placeholder="Masukkan NIK Anda" required>
            
            <label for="username">Password: </label>
            <div class="pass-container">
            <input type="password" name="password" id="password" placeholder="Password Anda" required>
            <i class="fa-solid fa-eye" id="togglePassword"></i>
            </div>

              <a class="btn" type="submit">Login</a>
        </form>
       <span>Belum punya akun? <a href="daftar.html">Daftar</a></span>
    </div>
 </div>
    <!-- <script src="login.js"></script> -->
     <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>