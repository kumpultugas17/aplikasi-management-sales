<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'db_mik1_sales_car');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $merk = $_POST['merk'];
   $model = $_POST['model'];
   $harga = $_POST['harga'];
   $tahun = $_POST['tahun'];

   $query = $conn->query("INSERT INTO cars (merk, model, harga, tahun) VALUES ('$merk', '$model', '$harga', '$tahun')");

   if ($query) {
      $_SESSION['success'] = 'Data baru berhasil ditambahkan!';
      header('location:cars.php');
   } else {
      $_SESSION['failed'] = 'Data gagal ditambahkan, coba lagi!';
      header('location:cars.php');
   }
}
