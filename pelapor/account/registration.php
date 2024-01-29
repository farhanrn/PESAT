<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration or Sign Up form in HTML CSS | BMKG </title> 
    <link rel="stylesheet" href="../assets/css/registration_style.css">
    <link rel="icon" href="../../assets/favicon.ico"/>
   </head>
<body>
  <div class="wrapper">
    <h2>Registrasi</h2>
    <form method="POST" action="registration_action.php">
      <div class="input-box">
        <input type="text" name="nama" placeholder="Masukkan Nama Anda" required>
      </div>
      <div class="input-box">
        <input type="text" name="email" placeholder="Masukkan Email Anda" required>
      </div>
      <div class="input-box">
        <input type="text" name="username" placeholder="Masukkan Username" required>
      </div>
      <div class="input-box">
        <input type="text" name="password" placeholder="Masukkan Password" required>
      </div>
    
      <div class="input-box button">
        <input type="Submit" value="Daftar Sekarang">
      </div>
      <div class="text">
        <h3> Sudah memiliki akun? <a href="login.php">Masuk</a></h3>
      </div>
    </form>
  </div>
</body>
</html>