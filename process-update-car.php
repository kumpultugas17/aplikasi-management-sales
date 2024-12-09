<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'db_mik1_sales_car');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $id = $_POST['id'];
   $merk = $_POST['merk'];
   $model = $_POST['model'];
   $harga = $_POST['harga'];
   $tahun = $_POST['tahun'];

   $query = $conn->query("UPDATE cars SET merk='$merk', model='$model', harga='$harga', tahun='$tahun' WHERE id = '$id'");

   if ($query) {
      $_SESSION['success'] = 'Data berhasil diupdate!';
      header('location:cars.php');
   } else {
      $_SESSION['failed'] = 'Data gagal diupdate!';
      header('location:cars.php');
   }
}
