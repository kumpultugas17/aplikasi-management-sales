<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'db_mik1_sales_car');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $id = $_POST['id_delete'];

   $query = $conn->query("DELETE FROM sales WHERE id = '$id'");

   if ($query) {
      $_SESSION['success'] = 'Data berhasil dihapus!';
      header('location:sales.php');
   } else {
      $_SESSION['failed'] = 'Data gagal dihapus!';
      header('location:sales.php');
   }
}
