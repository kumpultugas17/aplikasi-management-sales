<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'db_mik1_sales_car');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $sale_date = $_POST['sale_date'];
   $sales_id = $_POST['sales_id'];
   $car_id = $_POST['car_id'];

   $query = $conn->query("INSERT INTO transactions (sale_date, sales_id, car_id) VALUES ('$sale_date', '$sales_id', '$car_id')");

   if ($query) {
      $_SESSION['success'] = 'Data baru berhasil ditambahkan!';
      header('location:transactions.php');
   } else {
      $_SESSION['failed'] = 'Data gagal ditambahkan, coba lagi!';
      header('location:transactions.php');
   }
}
