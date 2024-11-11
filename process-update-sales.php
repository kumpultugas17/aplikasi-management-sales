<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'db_mik1_sales_car');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $id = $_POST['id'];
   $name_sales = $_POST['name_sales'];
   $email_sales = $_POST['email_sales'];
   $phone_number = $_POST['phone_number'];

   $query = $conn->query("UPDATE sales SET name='$name_sales', email='$email_sales', phone='$phone_number' WHERE id = '$id'");

   if ($query) {
      $_SESSION['success'] = 'Data berhasil diupdate!';
      header('location:sales.php');
   } else {
      $_SESSION['failed'] = 'Data gagal diupdate!';
      header('location:sales.php');
   }
}
