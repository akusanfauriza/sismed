<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sismed</title>
    <!-- <link rel="stylesheet" href="/resources/css/app.css"> -->
     <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Pastikan body memiliki tinggi minimal layar */
    background-image: url("/img/bg.jpg");
}

header {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
    padding: 10px 8%;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    justify-content: space-between;
    display: flex;
    align-items: center;
}

header h1 {
    margin: 1%;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
}

nav ul li {
    margin: 0 15px;
}

nav ul li a {
    color: rgb(0, 0, 0);
    text-decoration: none;
    font-weight: bold;
    font-size: 25px;
}

main {
    flex: 1; /* Membuat konten utama fleksibel untuk mengisi ruang */
    display: flex;
    flex-direction: column;
}

.hero {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 80px 55px;
    background-image: url("/img/klinik.jpg"); /*Tambahkan gambar background */
    background-size: cover; /* Membuat gambar memenuhi seluruh container */
    background-position: center; /* Menyelaraskan gambar ke tengah */
    background-repeat: no-repeat; /* Mencegah pengulangan gambar */
    color: white; /* Mengubah teks menjadi putih untuk kontras */
    border-radius: 10px; /* Membuat sudut melengkung */
    margin: 110px;
    max-width: 90%; /* Membatasi lebar hero */
    position: relative; /* Penting untuk overlay */
}

/* Konten teks di hero section */
.hero-text {
    flex: 1;
    max-width: 50%;
    margin-right: 20px;
    z-index: 2; /* Supaya konten berada di atas overlay */
    position: relative;
}

.hero-text h2 {
    font-size: 2.5rem;
    color: #000000; /* Teks warna emas */
    margin-bottom: 15px;
}

.hero-text p {
    font-size: 1.2rem;
    line-height: 2.3;
    color: rgb(0, 0, 0);
    margin: 5px;
}

.hero-text button {
    background-color: #51aa6b;
    font-weight: bold;
    color: #000000;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    transition: background-color 0.3s, box-shadow 0.3s;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
}

.hero-text button:hover {
    background-color: rgb(54, 109, 68);
    font-weight: bold;
    color: #ffffff;
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3);
}

.hero-image {
    flex: 1;
    text-align: center;
}

.hero-image img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 15px 15px rgba(0, 0, 0, 0.2);
}

/* section about  */
.about-section {
    display: flex;
    align-items: center; /* Sejajarkan gambar dan teks */
    justify-content: space-between; /* Jarak antar konten */
    border-radius: 10px;
    margin: 50px;
    box-shadow: 0 4px 10px rgba(8, 8, 8, 0.1); /* Tambahkan bayangan */
    background-image: url("/img/body.jpg");
    background-position: start;
    max-width: 100em; /* Batasi lebar kontainer */
    overflow: hidden; /* Agar konten tetap rapi */
}

.container {
    margin-bottom: 20px;
    padding: 10px;
    text-align: center;
}

.about-section .section-title {
    font-size: 2.5rem;
    color: #000000;
    margin-bottom: 20px;
}

.about-content {
    margin: 30px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: flex-start;
    gap: 30px;
}

.about-text {
    flex: 1;
    min-width: 300px;
    text-align: left;
}

.about-text p {
    font-size: 1.3rem;
    line-height: 2rem;
    color: rgb(0, 0, 0);
    margin-bottom: 20px;
    text-align: center;
}

.about-text h3 {
    font-size: 2rem;
    text-align: center;
    line-height: 2.5rem;
    color: #000000;
    margin-top: 20px;
}

.about-text ul {
    list-style-type: disc;
}

.about-text li {
    font-size: 1.3rem;
    list-style-type: none;
    text-align: center;
}

/* Footer */
footer {
    color: rgb(33, 29, 29);
    text-align: center;
    padding: 15px 0;
    font-size: 18px;
    margin-top: auto; /* Membuat footer selalu berada di bawah */
}

     </style>
</head>
<body>
<body>
    <header>
            <h1>KLINIK SISMED</h1>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="{{ route('login.form') }}">Login</a></li>
                </ul>
            </nav>
    </header>
    <main>
        <section id="home" class="hero">
            <div class="hero-text">
                <h2>Klinik Sismed Membantu Pengobatan Anda!!</h2>
                <p>
                    Selamat Datang Di Klinik Sismed, Kami Siap Melayani Anda Dengan Perawatan 
                    yang Berkualitas dan Dokter Profesional. Temukan Solusi Pengobatan Anda di 
                    Tempat Aman dan terpercaya.
                </p>
                <button>More Info</button>
            </div>
            <div class="hero-image">
                <img src="/img/doctors.jpg" alt="Doctors">
            </div>
        </section>
        <section id="about" class="about-section">
            <div class="container">
              <h2 class="section-title">About Us</h2>
              <div class="about-content">
                <div class="about-text">
                  <p>
                    Klinik Sismed adalah pusat layanan kesehatan terpercaya yang berdedikasi memberikan pelayanan terbaik bagi masyarakat. Dengan tim medis profesional dan peralatan modern, kami berkomitmen untuk mendukung kesehatan Anda.
                  </p>
                  <h3>Visi</h3>
                  <p>
                    Menjadi klinik pilihan utama dengan layanan kesehatan berkualitas tinggi, mudah diakses, dan ramah pasien.
                  </p>
                  <h3>Misi</h3>
                  <ul>
                    <li>Menyediakan pelayanan kesehatan yang holistik dan profesional.</li>
                    <li>Memberikan pengalaman pasien yang nyaman dan aman.</li>
                    <li>Meningkatkan kualitas hidup masyarakat melalui edukasi kesehatan.</li>
                  </ul>
                </div>
              </div>
            </div>  
</section>   
    </main>
    <footer>
            <p>&copy; 2011 Klinik Sismed.</p>
    </footer>
</body>
</body>
</html>