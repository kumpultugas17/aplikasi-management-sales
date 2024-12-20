<?php
session_start();
if (!isset($_SESSION['login'])) {
   header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="Aplikasi Menegement Sales">
   <meta name="author" content="M. Iqbal Adenan">
   <title>Aplikasi Management Sales | Report</title>
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <!-- Tabler Icons CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
   <!-- Gogole Font -->
   <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
   <!-- Sweetalert -->
   <link rel="stylesheet" href="assets/sweetalert2/sweetalert2.min.css">
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
            <a href="#" class="d-inline navbar-brand text-white">
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
                     <a href="transactions.php" class="nav-link text-nowrap me-3">
                        <i class="ti ti-shopping-cart-copy align-text-top me-1"></i> Transactions
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="report.php" class="nav-link text-nowrap me-3 active">
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
                  <h5 class="page-title">Report Transactions</h5>
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
                           Report
                        </li>
                     </ol>
                  </nav>
               </div>
            </div>

            <div class="bg-white rounded-2 shadow-sm p-4 mb-4">
               <div class="row">
                  <div class="d-grid d-lg-block col-lg-12 col-xl-7 mb-4 mb-lg-0">
                     <!-- button form add data -->
                     <form action="" method="get" class="d-flex gap-2 align-items-center">
                        <input type="date" name="start_date" class="form-control py-2" required>
                        <span>to</span>
                        <input type="date" name="end_date" class="form-control py-2" required>
                        <button type="submit" class="btn btn-primary py-2 px-2" style="width: 250px;">
                           <i class="ti ti-search me-2"></i> Search
                        </button>
                     </form>
                  </div>
               </div>
            </div>

            <?php if (isset($_GET['start_date']) && $_GET['end_date'] !== '') { ?>
               <div class="bg-white rounded-2 shadow-sm pt-4 px-4 ">
                  <!-- tabel tampil data -->
                  <div class="table-responsive mb-3">
                     <table class="table table-bordered table-striped table-hover" style="width:100%">
                        <thead>
                           <th class="text-center">No.</th>
                           <th class="text-center">Sale Date</th>
                           <th class="text-center">Sales Name</th>
                           <th class="text-center">Merk/Model</th>
                           <th class="text-center">Price</th>
                        </thead>
                        <tbody>
                           <?php
                           // Connection Database
                           $conn = mysqli_connect('localhost', 'root', '', 'db_mik1_sales_car');
                           // Ambil nilai pencarian
                           $start_date = isset($_GET['start_date']) ? trim($_GET['start_date']) : '';
                           $end_date = isset($_GET['end_date']) ? trim($_GET['end_date']) : '';
                           // Bersihkan input untuk menghindari SQL injection
                           $start_date_clean = htmlspecialchars($start_date, ENT_QUOTES, 'UTF-8');
                           $end_date_clean = htmlspecialchars($end_date, ENT_QUOTES, 'UTF-8');
                           // Tambahkan kondisi pencarian jika ada
                           $search_condition = $start_date || $end_date ? "WHERE sale_date BETWEEN '$start_date_clean' AND '$end_date_clean'" : "";
                           // Query data dengan limit dan offset
                           $query = "SELECT * FROM transactions INNER JOIN sales ON transactions.sales_id = sales.id INNER JOIN cars ON transactions.car_id = cars.id $search_condition";
                           $result = $conn->query($query);

                           $no = 1;
                           if ($result->num_rows > 0) {
                              foreach ($result as $data) :
                           ?>
                                 <tr>
                                    <td width="30" class="text-center"><?= $no++ ?></td>
                                    <td width="200"><?= $data['sale_date'] ?></td>
                                    <td width="200"><?= $data['name'] ?></td>
                                    <td width="200"><?= $data['merk'] . ' ' . $data['model'] . ' ' . $data['tahun'] ?></td>
                                    <td width="200"><?= $data['harga'] ?></td>
                                 </tr>
                              <?php endforeach ?>
                           <?php } else { ?>
                              <!-- jika data tidak ada, tampilkan pesan data tidak tersedia -->
                              <tr>
                                 <td colspan="5">
                                    <div class="d-flex justify-content-center align-items-center">
                                       <i class="ti ti-info-circle fs-5 me-2"></i>
                                       <div>No data available.</div>
                                    </div>
                                 </td>
                              </tr>
                           <?php } ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            <?php } ?>
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
</body>

</html>