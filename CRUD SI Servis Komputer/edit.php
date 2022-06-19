<?php

include "koneksi.php";



            $id = $_GET['id'];
            $sql = "select * from serviskomputer where no_antrian='$id'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);


if(isset($_POST['submit']))
{
    $status_servis = $_POST['status_servis'];
    $merek_komputer = $_POST['merek_komputer'];
    $jumlah = $_POST['jumlah'];
   
    


    $sql ="UPDATE `serviskomputer` SET `status_servis`='$status_servis' WHERE no_antrian = '$id'";

    $result = mysqli_query($conn,$sql);

    if($result)
    {
        header("Location:dashboard.php?msg=Catatan servis baru telah berhasil dibuat");
    }
    else{
        echo "Failed: ".mysqli_error($conn);
    }


}
        
        

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Tambah Simpanan</title>
</head>
<body>

    <ul>
    <li><b>SI SERVIS KOMPUTER</b>
    <li style="float:right"><a href="servis_selesai.php">Proses Servis Selesai</a></li>
    <li style="float:right"><a href="catat_servis.php">Catat Servis</a></li>
    <li style="float:right"><a href="dashboard.php">Data Servis</a></li>
    </ul>
    <div class="container">
        <div class="text-center mb-4">

            <h3>Edit Data Simpanan</h3>
            <p class="text-muted">Klik Update setelah selesai</p>

        </div>



        <div class="container d-flex justify-content-center">
            <form action="" method = "post" style="width:50vw; min-width : 300px;">
                <div class="row">


                <div class="mt-3">
                    
                    <label class="form-label">Status Service</label>
                    <select name="status_servis" class="form-select" aria-label="Default select example">
                      <option selected>Pilih Status Disini</option>
                      <option value="Dalam Antrean">Dalam Antrean</option>
                      <option value="Dalam Proses Servis">Dalam Proses Servis</option>
                      <option value="Selesai Servis">Selesai Servis</option>
                    </select>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success" name="submit">Simpan</button>
                    <a href="dashboard.php" class="btn btn-danger">Batal</a>
                </div>
        
        
            </form>


        </div>


    </div>


    <!-- Boostrap bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>