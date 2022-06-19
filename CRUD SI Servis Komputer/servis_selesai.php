<?php
session_start();
include "koneksi.php";

if(isset($_POST['submit']))
{
    $biaya_jasa = $_POST['biaya_jasa'];
    $biaya_tambahan = $_POST['biaya_tambahan'];
    $total_biaya = $biaya_jasa + $biaya_tambahan;
    $no_antrian = $_POST['no_antrian'];



    $sql ="INSERT INTO transaksi VALUES (NULL,'$biaya_jasa','$biaya_tambahan','$total_biaya','$no_antrian')";

    $result = mysqli_query($conn,$sql);

    if($result)
    {
        $_SESSION['antrian'] = $no_antrian;
        header("Location:nota.php");
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
    <link rel="stylesheet" href="navbar.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Catat Servis Komputer</title>
</head>
<body>

    <ul>
    <li><b>SI SERVIS KOMPUTER</b>
    <li style="float:right"><a class="active" href="servis_selesai.php">Pembayaran</a></li>
    <li style="float:right"><a href="catat_servis.php">Catat Servis</a></li>
    <li style="float:right"><a href="dashboard.php">Data Servis</a></li>
    </ul>
    <div class="container">
        <div class="text-center mb-4">

            <h3>Proses Servis Selesai</h3>
        
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method = "post" style="width:50vw; min-width : 300px;">
                <div class="row">
                    <div class="col">
                        <label class="form-label">Biaya Jasa</label>
                        <input type="number" class="form-control" name="biaya_jasa" maxlength=9>
                    </div>
                </div>

                <div class="mt-3">
                    
                    <label class="form-label">Biaya Tambahan</label>
                    <input type="number" class="form-control" name="biaya_tambahan" maxlength=9>

                </div>
                <div class="mt-3">
                    
                    <label class="form-label">No Antrian</label>
                    <input type="text" class="form-control" name="no_antrian" maxlength=20>

                </div>


                <div class="mt-3">
                    <button type="submit" class="btn btn-success" name="submit">Checkout</button>
                    <a href="dashboard.php" class="btn btn-danger">Batal</a>
                </div>
                
                
        
        
            </form>


        </div>


    </div>


    <!-- Boostrap bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>
