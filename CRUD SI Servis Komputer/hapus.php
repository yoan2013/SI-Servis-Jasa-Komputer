<?php

include "koneksi.php";


    $no_antrian = $_GET['id'];
    $sql = "DELETE FROM serviskomputer WHERE no_antrian = '$no_antrian'";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        header("Location: dashboard.php?msg= Berhasil menghapus");
    }
    else{
        echo "Error: ".mysqli_error($conn);
    }



?>