<?php
session_start();
if (isset($_SESSION["username"])){
  header("location: ./../homepage.php");
  exit;
}
if (isset($_SESSION['error'])) {
    echo "<script>alert('{$_SESSION['error']}');</script>";
    unset($_SESSION['error']);
}

?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/registration_style.css">
    <link rel="icon" href="../../assets/favicon.ico" />
</head>

<body>
    <div class="wrapper">
        <h2>Masuk</h2>
        <form method="POST" action="login_action.php">
            <div class="input-box">
                <input type="text" name="username" placeholder="Masukkan Username" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Masukkan Password" required>
            </div>

            <div class="input-box button">
                <input type="Submit" value="Masuk">
            </div>
            <div class="text">
                <h3> Belum memiliki akun? <a href="registration.php">Daftar</a></h3>
            </div>
        </form>
    </div>
</body>

</html>