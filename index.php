<?php
    session_start();

    if (isset($_SESSION["username"])) {
        if ($_SESSION['role'] === 'admin') {
            header("Location:./admin/dashboard.php");
            exit;
        } else {
            header("Location:./teknisi/dashboard.php");
            exit;
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Load file CSS Boostrap Untuk Styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="icon" href="assets/favicon.ico" />
    
</head>
<body>
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Sitem Pelaporan Kerusakan Alat Stasiun Meteorologi Kelas I Sultan Hasanuddin</h1>
        <p class="col-lg-10 fs-4">Silahkan login sesuai akun yang diberikan</p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <form method="post" action="login_action.php" class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
          <div class="form-floating mb-3">
            <input type="text" name="username" class="form-control" id="floatingInput">
            <label for="floatingInput">Masukkan Username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="password" class="form-control" id="floatingPassword">
            <label for="floatingPassword">Password</label>
          </div>
          <div class="checkbox mb-3">
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
          <hr class="my-4">
        </form>
      </div>
    </div>
  </div>
   <!-- <div class="container">
            <h2>Login</h2><br>
        <form method="post" action="login_action.php">
        <div class="form-group">
            <label>Username:</label>
            <input type="text" class="form-control" name="username" placeholder="Masukan Username">
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Masukan Password">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Login">
        </div>
        </form>
    </div> -->
</body>
</html>