<!DOCTYPE HTML>
<html>
    <head>
        <title>Halaman Daftar</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
          <h1>Daftar</h1>
            <form method="POST" action="daftar.php">

                <input type="hidden" name="tujuan" value="DAFTAR">

                <label>Username</label>
                <br>
                <input name="username" type="text">
                <br>
                <label>Password</label>
                <br>
                <input name="password" type="password">
                <br>
                <label>Nama</label>
                <br>
                <input name="nama" type="text">
                <br>
                <label>Alamat</label>
                <br>
                <input name="alamat" type="text">
                <br>
                <label>No. Telepon</label>
                <br>
                <input name="no_telp" type="text">
                <br>

                <button name="submit">Daftar</button>

                <p> Sudah punya akun?
                  <a href="index.php">Login di sini</a>
                </p>
            </form>
        </div>
    </body>
</html>

<?php 
    require 'koneksi.php';
    if(isset($_POST['submit'])){
        $usernames = $_POST['username'];
        $passwords = $_POST['password'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];

        $sql = "INSERT INTO customer VALUES (NULL,'$usernames', '$passwords','$nama','$alamat','$no_telp')"; 


        if(mysqli_query($conn, "SELECT username FROM akun where username='$usernames'")-> num_rows != 1){
            mysqli_query($conn, $sql);
            header("Location: index.php?msg= Berhasil buat akun!");
        }elseif(mysqli_query($conn, "SELECT username FROM akun where username='$usernames'")-> num_rows>0){
            echo "<script>alert('Username Sudah Ada')</script>";
        }else{
            echo "<script>alert('Erorr!')</script>";
        }
    }
 ?>