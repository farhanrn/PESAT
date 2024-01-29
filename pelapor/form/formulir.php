<?php include "../../connection/connect.php";

session_start();
if (!isset($_SESSION["username"])){
  header("location: ./../account/login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/style/form_style.css">
    <link rel="icon" href="../../assets/favicon.ico" />
    <title>Form Laporan</title>
</head>

<body>

    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!----------------------- Login Container -------------------------->

        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <!--------------------------- Left Box ----------------------------->

            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #103cbe;">
                <div class="featured-image mb-3">
                    <img src="../../assets/img/hero-img.png" class="img-fluid" alt="Featured Image">
                </div>
                <h1 class="text-white fs-2 fw-bold">LaporIn</h1>
                <p class="text-white text-center">Melaporkan Kerusakan Alat</p>
            </div>

            <!-------------------- ------ Right Box ---------------------------->

            <div class="col-md-6 right-box">
                <h1 class="fw-bold mb-4">Buat Laporan</h1>
                <form method="post" action="form_action.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Pelapor</label>
                        <input type="text" name="nama_pelapor" class="form-control form-control-lg bg-light fs-6" id="name"
                            value="<?php echo $_SESSION["nama"]?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal Laporan</label>
                        <input type="date" name="tanggal" class="form-control form-control-lg bg-light fs-6" id="date">
                    </div>
                    <div class="select-box">
                        <div class="mb-3">
                            <label for="alat" class="form-label">Nama Alat</label>
                            <!-- <select id="alat" name= "alat" class="form-select form-select-lg bg-light fs-6" name="alat">
                                <option value="" selected disabled hidden>Pilih Nama Alat</option>
                                <?php
                                // $sql = "SELECT * from alat";
                                // $result = mysqli_query($connect, $sql);
                                // while ($data = mysqli_fetch_array($result)) {
                                //     ?>
                                //     <option value="<?php //echo $data['alat']; ?>">
                                //         <?php //echo $data['alat']; ?>
                                    </option>
                                    <?php
                                // }
                                ?>
                            </select> -->
                            <div class="select-option">
                            <input type = "text" name="alat" placeholder="Pilih Nama Alat" id="soValue" readonly name="" class="form-control form-control-lg bg-light fs-6">
                            </div>
                            <div class="select">
                            <div class="search">
                                <input type="text" id="optionSearch" placeholder="Cari" name="" class="form-control form-control-lg bg-light fs-6">
                            </div> 
                                <?php
                                    $sql    = "SELECT * from alat";
                                    $result = mysqli_query($connect, $sql);
                                    while ($data = mysqli_fetch_array($result)){
                                    ?>
                                    <ul class = "option">
                                        <li><?php echo $data['alat'];?></li>
                                    </ul>
                                    <?php
                                    }
                                    ?>    
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Kerusakan</label>
                        <input type="textarea" name="deskripsi_kerusakan" class="form-control form-control-lg bg-light fs-6" id="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Kerusakan</label>
                        <input type="file" name="gambar" class="form-control-file" id="gambar-kerusakan" name="gambar-kerusakan"
                            accept="image/*" capture="camera">
                    </div>
                    <button type="submit" name="submit" class="btn btn-lg btn-primary w-100 fs-6">Kirim Laporan</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
    const selectBox = document.querySelector('.select-box');
    const selectOption = document.querySelector('.select-option input');
    const options = document.querySelector('.option');
    const optionsList = document.querySelectorAll('.option li');
    const soValue = document.querySelector('#soValue');
    const optionSearch = document.querySelector('#optionSearch');

    selectOption.addEventListener('click', () => {
        selectBox.classList.toggle('active');
    });

    optionsList.forEach(function(optionsListSingle){
        optionsListSingle.addEventListener('click',function(){
            text = this.textContent;
            soValue.value = text;
            selectBox.classList.remove('active');
        })
    })
    optionSearch.addEventListener('input',function(){
        var filter, li, i, textValue;
        filter = optionSearch.value.toUpperCase();
        li = optionsList
        for(i = 0; i < li.length; i++){
            liCount = li[i];
            textValue = liCount.textContent || liCount.innerText;
            if(textValue.toUpperCase().indexOf(filter) > -1){
                li[i].style.display = '';
            }else{
                li[i].style.display = 'none';
            }
        }

    })
}); 
</script>
</body>

</html>