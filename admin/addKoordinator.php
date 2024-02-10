<?php
session_start();


if (!isset($_SESSION["username"])) {
    header("Location:../index.php");
    exit;
}
if ($_SESSION['role'] === 'koordinator') {
    header("Location:./../koordinator/koordinator.php");
} else if ($_SESSION['role'] === 'teknisi') {
    header("Location:./../teknisi/dashboard.php");
} else if ($_SESSION['role'] === 'pelapor') {
    header("Location:./../pelapor/homepage.php");
} else {
    $id_user = $_SESSION["id_user"];
    $username = $_SESSION["username"];
    $name = $_SESSION["name"];
    $email = $_SESSION["email"];
    ?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Tambah User Koordinator</title>
                <link rel="icon" href="img/favicon.ico" />
                <style>
                    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

                    * {
                        margin: 0;
                        padding: 0;
                        box-sizing: border-box;
                    }

                    body {
                        font-family: 'Inter', sans-serif;
                    }

                    .formbold-mb-3 {
                        margin-bottom: 15px;
                    }

                    .formbold-relative {
                        position: relative;
                    }

                    .formbold-opacity-0 {
                        opacity: 0;
                    }

                    .formbold-stroke-current {
                        stroke: currentColor;
                    }

                    #supportCheckbox:checked~div span {
                        opacity: 1;
                    }

                    .formbold-main-wrapper {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        padding: 48px;
                    }

                    .formbold-form-wrapper {
                        margin: 0 auto;
                        max-width: 570px;
                        width: 100%;
                        background: white;
                        padding: 40px;
                    }

                    .formbold-img {
                        margin-bottom: 45px;
                    }

                    .formbold-form-title {
                        margin-bottom: 30px;
                    }

                    .formbold-form-title h2 {
                        font-weight: 600;
                        font-size: 28px;
                        line-height: 34px;
                        color: #07074d;
                    }

                    .formbold-form-title p {
                        font-size: 16px;
                        line-height: 24px;
                        color: #536387;
                        margin-top: 12px;
                    }

                    .formbold-input-flex {
                        display: flex;
                        gap: 20px;
                        margin-bottom: 15px;
                    }

                    .formbold-input-flex>div {
                        width: 50%;
                    }

                    .formbold-form-input {
                        text-align: center;
                        width: 100%;
                        padding: 13px 22px;
                        border-radius: 5px;
                        border: 1px solid #dde3ec;
                        background: #ffffff;
                        font-weight: 500;
                        font-size: 16px;
                        color: #536387;
                        outline: none;
                        resize: none;
                    }

                    .formbold-form-input:focus {
                        border-color: #6a64f1;
                        box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
                    }

                    .formbold-form-label {
                        color: #536387;
                        font-size: 14px;
                        line-height: 24px;
                        display: block;
                        margin-bottom: 10px;
                    }

                    .formbold-checkbox-label {
                        display: flex;
                        cursor: pointer;
                        user-select: none;
                        font-size: 16px;
                        line-height: 24px;
                        color: #536387;
                    }

                    .formbold-checkbox-label a {
                        margin-left: 5px;
                        color: #6a64f1;
                    }

                    .formbold-input-checkbox {
                        position: absolute;
                        width: 1px;
                        height: 1px;
                        padding: 0;
                        margin: -1px;
                        overflow: hidden;
                        clip: rect(0, 0, 0, 0);
                        white-space: nowrap;
                        border-width: 0;
                    }

                    .formbold-checkbox-inner {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        width: 20px;
                        height: 20px;
                        margin-right: 16px;
                        margin-top: 2px;
                        border: 0.7px solid #dde3ec;
                        border-radius: 3px;
                    }

                    .formbold-btn {
                        font-size: 16px;
                        border-radius: 5px;
                        padding: 14px 25px;
                        border: none;
                        font-weight: 500;
                        background-color: blue;
                        color: white;
                        cursor: pointer;
                        margin-top: 25px;
                    }

                    .formbold-btn-red {
                        background-color: red;
                    }

                    .formbold-btn:hover {
                        box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
                    }
                </style>
            </head>

            <body>
                <div class="formbold-main-wrapper">
                    <!-- Author: FormBold Team -->
                    <!-- Learn More: https://formbold.com -->
                    <div class="formbold-form-wrapper">
                        <img src="../assets/img/addKoordinator.png" alt="Image" width="600" height="400">
                        <form action="addKoordinatorAction.php" method="POST">
                            <div class="formbold-form-title">
                                <h2>Tambah Data Koordinator</h2>
                                <p>
                                    Tambahkan Data Koordinator
                                </p>
                            </div>
                            <div class="formbold-mb-3">
                                <label for="username" class="formbold-form-label">Username</label>
                                <input type="text" name="username" class="formbold-form-input">
                            </div>
                            <div class="formbold-mb-3">
                                <label for="name" class="formbold-form-label">Nama</label>
                                <input type="text" name="name" class="formbold-form-input">
                            </div>

                            <div class="formbold-input-flex">
                                <div>
                                    <label for="email" class="formbold-form-label">Email</label>
                                    <input type="email" name="email" class="formbold-form-input">
                                </div>
                                <div>
                                    <label for="password" class="formbold-form-label">Password</label>
                                    <input type="text" name="password" class="formbold-form-input">
                                </div>
                            </div>
                            <a href="dashboard.php" class="formbold-btn formbold-btn-red">Kembali</button></a>
                            <button class="formbold-btn" input type="Submit">Buatkan Akun Koordinator Baru</button>
                        </form>
                    </div>
                </div>

            </body>

            </html>

<?php } ?>