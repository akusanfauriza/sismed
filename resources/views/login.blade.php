<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
    padding: 0;
    margin: 0;
}
/* Container login */
.login-container {
    display: flex;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100vh; /* Pastikan tinggi memenuhi seluruh layar */
    background-image: url('img/Login.jpg'); /* Ganti dengan URL atau path gambar Anda */
    background-size: cover; /* Memastikan gambar memenuhi seluruh area */
    background-position: center; /* Memusatkan gambar */
    background-repeat: no-repeat; /* Tidak mengulang gambar */
    
}


/* Kotak login */
.login-box {
    padding: 30px 40px;
    border-radius: 10px;
    box-shadow: 0 20px 30px rgba(0, 0, 0, 0.2); /* Bayangan lembut */
    text-align: center;
    width: 350px;
}

.login-box h2 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
    text-transform: uppercase;
}

/* Label dan input */
.login-box label {
    display: block;
    text-align: left;
    margin-bottom: 8px;
    color: #555;
    font-weight: bold;
    font-size: 18px;
}

.login-box input[type="text"],
.login-box input[type="password"] {
    width: 100%;
    padding: 10px 15px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 15px;
    box-sizing: border-box;
}

.login-box input:focus {
    border-color: #000000;
    outline: none;
    box-shadow: 0 0 5px rgba(124, 62, 53, 0.5); /* Highlight input saat fokus */
}

/* Tombol login */
.login-box button {
    width: 100%;
    padding: 10px 15px;
    background-color: #000000;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.login-box button:hover {
    background-color: #48dec0;
    color: #000000;
}

/* Gaya untuk teks pendaftaran */
.login-box .register {
    margin-top: 15px;
    font-size: 14px;
    color: #333;
}

.login-box .register a {
    color: #000000;
    text-decoration: none;
    font-weight: bold;
}

.login-box .register a:hover {
    text-decoration: underline;
}
    </style>
</head>
<body>
    <div class="login-container">
    <div class="login-box">
    <h1>Login User</h1>
    @if($errors->any())
        <div>
            <strong>{{ $errors->first('login_error') }}</strong>
        </div>
    @endif
    <form method="POST" action="{{ route('login.post') }}">
        @csrf
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" placeholder="Masukan username" required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Masukkan password "required>
        <button type="submit">Login</button>
    </form>
    <p class="register">Belum punya akun? <a href="">Daftar Sekarang</a></p>
    </div>
</body>
<!-- <body>
    <div class="login-container">
        <div class="login-box">
            <h2>LOGIN USER</h2>
            <form>
                <label for="username">Username</label>
                <input type="text" id="username" placeholder="Masukkan username" required>
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Masukkan password" required>
                <button type="submit">LOGIN</button>
            </form>
            <p class="register">Belum punya akun? <a href="daftar.html">Daftar Sekarang</a></p>
        </div>
    </div>
</body> -->
</html>

