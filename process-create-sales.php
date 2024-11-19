<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'db_mik1_sales_car');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $name_sales = $_POST['name_sales'];
   $email_sales = $_POST['email_sales'];
   $phone_number = $_POST['phone_number'];

   $query = $conn->query("INSERT INTO sales (name, email, phone) VALUES ('$name_sales', '$email_sales', '$phone_number')");

   if ($query) {
      $_SESSION['success'] = 'Data baru berhasil ditambahkan!';
      header('location:sales.php');
   } else {
      $_SESSION['failed'] = 'Data gagal ditambahkan, coba lagi!';
      header('location:sales.php');
   }
}
