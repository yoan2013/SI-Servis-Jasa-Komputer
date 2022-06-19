<?php
session_start();
include "koneksi.php";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="navbar.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Beranda</title>
</head>
<body>

<ul>
    <li><b>SI SERVIS KOMPUTER</b>
    <li style="float:right"><a class="active" href="dashboard.php">Data Servis Komputer Saya</a></li>
    </ul>
    <div class="container">
    
        <?php
            if(isset($_GET['msg']))
            {
                $msg=$_GET['msg'];
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                '.$msg.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
        ?>

        <table class="table table-hover text-center mt-3">
        <thead class="table-primary">
            <tr>
            <th scope="col">Nomor Antrian</th>
            <th scope="col">Merek Komputer</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Status Servis</th>
            </tr>
        </thead>
        
        <tbody>

            <?php
                include "koneksi.php";
                $username = $_SESSION['index']['username'];


                $sql = "SELECT * FROM  serviskomputer WHERE username_cus = '$username'";
                $result = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_assoc($result))
                {
                    ?>
                        <tr>
                        <th><?php echo $row['no_antrian'] ?></th>
                        <td><?php echo $row['merek_komputer'] ?></td>
                        <td><?php echo $row['jumlah'] ?></td>
                        <td><?php echo $row['status_servis'] ?></td>         
                        </tr>
                    <?php

                }
            ?>


           
        </tbody>
    </table>
       

    </div>


    <!-- Boostrap bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- font awesome (untuk icon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</body>
</html>