<?php 
session_start();
include "koneksi.php";
?>

<head>
	<title>nota</title>
	<link rel="stylesheet" type="text/css" href="nota.css">
</head>
<body>


            <?php
                $antrian = $_SESSION['antrian'];
                $sql = "SELECT * FROM  transaksi,customer,serviskomputer WHERE transaksi.no_antrian = '$antrian' AND serviskomputer.no_antrian = '$antrian' AND customer.username = serviskomputer.username_cus ";
                $result = mysqli_query($conn,$sql);
                $row = $result -> fetch_assoc();
            ?>

    <div class="wrapper">
        <div class="title">
        SERVIS KOMPUTER
        <p>No. Antrian : <?php echo $row['no_antrian'];?>
        </div>
        <div class="form"> 
          <div class="inputfield">
              <label>Customer</label>
              <input type="text" class="input" readonly value="<?php echo $row['nama'];?>">
           </div>
           <div class="inputfield">
              <label>Merek</label>
              <input type="text" class="input" readonly value="<?php echo $row['merek_komputer'];?>">
           </div> 
           <div class="inputfield">
              <label>Jumlah</label>
              <input type="text" class="input" readonly value="<?php echo $row['jumlah'];?>">
           </div>
           <div class="title">
            Biaya
            </div>
           <div class="inputfield">
              <label>Biaya Jasa</label>
              <input type="text" class="input" readonly value="<?php echo $row['biaya_jasa'];?>">
           </div>  
          <div class="inputfield">
              <label>Biaya Tambahan</label>
              <input type="text" class="input" readonly value="<?php echo $row['biaya_tambahan'];?>">
           </div> 
          <div class="inputfield">
              <label>Total Biaya</label>
              <input type="text" class="input" readonly value="<?php echo $row['total_biaya'];?>">
           </div>

         <div class="btn" href="dashboard.php">
            <a href="dashboard.php">Kembali</a>
          </div>
    </div>


</body>
</html>