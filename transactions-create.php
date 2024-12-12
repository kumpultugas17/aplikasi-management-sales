<?php
session_start();
// Connection Database
$conn = mysqli_connect('localhost', 'root', '', 'db_mik1_sales_car');
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="Aplikasi Menegement Sales">
   <meta name="author" content="M. Iqbal Adenan">
   <title>Aplikasi Management Sales | Sales</title>
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <!-- Tabler Icons CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
   <!-- Gogole Font -->
   <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
   <!-- Select 2 -->
   <link rel="stylesheet" href="assets/select2/css/select2.min.css">
   <!-- Sweetalert -->
   <link rel="stylesheet" href="assets/sweetalert2/sweetalert2.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

   <!-- jQuery -->
   <script src="assets/js/jquery-3.7.1.min.js"></script>
   <!-- My Style -->
   <link rel="stylesheet" href="assets/css/app.css">
   <style>
      * {
         padding: 0;
         margin: 0;
         font-family: 'Nunito', Courier, monospace;
         font-optical-sizing: auto;
         font-weight: 600;
         font-style: normal;
      }

      body {
         display: flex;
         flex-direction: column;
         min-height: 100vh;
         margin: 0;
      }

      main {
         flex: 1;
      }
   </style>
</head>

<body class="d-flex flex-column h-100">
   <header>
      <!-- Navbar Top -->
      <nav class="navbar navbar-top fixed-top bg-primary text-white">
         <div class="container">
            <a href="dashboard.php" class="d-inline navbar-brand text-white">
               <img src="assets/images/logo-dashboard.png" alt="Logo" width="32" class="align-text-bottom me-2">
               <span class="fs-4 text-uppercase">Apliaksi Management Sales</span>
            </a>
         </div>
      </nav>
      <!-- Navbar Menu -->
      <nav class="navbar navbar-menu fixed-top navbar-expand-lg bg-light shadow-lg-sm">
         <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                     <a href="dashboard.php" class="nav-link text-nowrap me-3">
                        <i class="ti ti-home align-text-top me-1"></i> Dashboard
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="sales.php" class="nav-link text-nowrap me-3">
                        <i class="ti ti-users align-text-top me-1"></i> Sales
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="cars.php" class="nav-link text-nowrap me-3">
                        <i class="ti ti-car-suv align-text-top me-1"></i> Cars
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="transactions.php" class="nav-link text-nowrap me-3 active">
                        <i class="ti ti-shopping-cart-copy align-text-top me-1"></i> Transactions
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="report.php" class="nav-link text-nowrap me-3">
                        <i class="ti ti-file-description align-text-top me-1"></i> Report
                     </a>
                  </li>
               </ul>

               <div class="d-flex nav-item">
                  <a href="logout.php" class="nav-link text-nowrap">
                     <i class="ti ti-logout align-text-top me-1"></i> Logout
                  </a>
               </div>

            </div>
         </div>
      </nav>
   </header>

   <!-- Main Content -->
   <main class="flex-shrink-0">
      <div class="container">
         <div class="page-content">
            <div class="d-flex flex-column flex-lg-row mb-2">
               <!-- Page Title -->
               <div class="flex-grow-1">
                  <h5 class="page-title">Transactions</h5>
               </div>
               <div class="pt-lg-1">
                  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                           <a href="dashboard.php" class="text-breadcrumb text-decoration-none">
                              <i class="ti ti-home fs-6"></i>
                           </a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                           Create
                        </li>
                     </ol>
                  </nav>
               </div>
            </div>

            <div class="bg-white rounded-2 shadow-sm pt-4 px-4 pb-3 mb-5">
               <!-- form -->
               <form action="process-create-transaction.php" method="post">
                  <div class="mb-3 row align-items-center">
                     <label for="merk" class="col-sm-2 form-label">Sales Date</label>
                     <div class="col-sm-10">
                        <input type="date" name="sale_date" id="sale_date" class="datepicker" placeholder="Enter sale date" required>
                     </div>
                  </div>
                  <div class="mb-3 row align-items-center">
                     <label for="model" class="col-sm-2 form-label">Sales Name</label>
                     <div class="col-sm-10">
                        <select name="sales_id" class="select2">
                           <option value="">Choose Sales</option>
                           <?php
                           $sales = $conn->query("SELECT * FROM sales");
                           foreach ($sales as $s) :
                           ?>
                              <option value="<?= $s['id'] ?>"><?= $s['name'] ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                  </div>
                  <div class="mb-3 row align-items-center">
                     <label for="cars_name" class="col-sm-2 form-label">Cars Name</label>
                     <div class="col-sm-10">
                        <select name="car_id" class="select2">
                           <option value="">Choose Car</option>
                           <?php
                           $cars = $conn->query("SELECT * FROM cars");
                           foreach ($cars as $c) :
                           ?>
                              <option value="<?= $c['id'] ?>"><?= $c['merk'] . ' ' . $c['model'] . ' ' . $c['tahun']  ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                  </div>
                  <div class="d-grid gap-3 d-sm-flex justify-content-md-start pt-1 offset-lg-2 offset-md-2">
                     <button type="submit" class="btn btn-primary py-2 px-4" style="margin-left: 3px">Save</button>
                     <a href="transactions.php" class="btn btn-outline-secondary py-2 px-3">Cancel</a>
                  </div>

               </form>
               <!-- end form -->
            </div>

         </div>
      </div>
   </main>

   <!-- Footer -->
   <footer class="footer bg-white shadow mt-auto py-3">
      <div class="container">
         <div class="d-flex flex-column flex-md-row align-items-center align-items-md-left">
            <!-- copyright -->
            <div class="copyright text-center mb-2 mb-md-0">
               &copy; 2024 - <a href="#" target="_blank" class="fw-semibold">ELTIBIZ Koding</a>. All rights reserved.
            </div>
            <!-- link -->
            <div class="link ms-md-auto">
               <a href="#" target="_blank">Terms & Conditions</a>
            </div>
         </div>
      </div>
   </footer>

   <!-- Bootstrap JS -->
   <script src="assets/js/bootstrap.bundle.min.js"></script>
   <!-- Sweetalert -->
   <script src="assets/sweetalert2/sweetalert2.all.min.js"></script>
   <!-- Select 2 -->
   <script src="assets/select2/js/select2.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
   <!-- Pesan Berhasil -->
   <?php if (isset($_SESSION['success'])) { ?>
      <script>
         Swal.fire({
            position: "top-end",
            icon: "success",
            title: "<?= $_SESSION['success'] ?>",
            showConfirmButton: false,
            timer: 1500
         });
      </script>
   <?php }
   unset($_SESSION['success']);  ?>
   <!-- Pesan Gagal -->
   <?php if (isset($_SESSION['failed'])) { ?>
      <script>
         Swal.fire({
            position: "top-end",
            icon: "error",
            title: "<?= $_SESSION['failed'] ?>",
            showConfirmButton: false,
            timer: 1500
         });
      </script>
   <?php }
   unset($_SESSION['failed']);  ?>
   <script>
      $(document).ready(function() {
         $('.select2').select2();

         flatpickr(".datepicker", {
            altInput: true,
            altFormat: "j F Y",
            dateFormat: "Y-m-d",
            disableMobile: "true"
         });
      });
   </script>
</body>

</html>