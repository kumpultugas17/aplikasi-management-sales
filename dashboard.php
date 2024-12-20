<?php
session_start();
if (!isset($_SESSION['login'])) {
   header('location:login.php');
}
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
   <title>Aplikasi Management Sales | Dashboard</title>
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
                     <a href="dashboard.php" class="nav-link text-nowrap me-3 active">
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


            <div class="bg-white rounded-2 shadow-sm p-4 mb-5">
               <div class="row align-items-center g-5">
                  <div class="col-lg-3">
                     <img src="assets/images/img-dashboard.svg" class="img-fluid opacity-85" alt="images" loading="lazy">
                  </div>
                  <div class="col-lg-9">
                     <h4 class="text-primary mb-2">
                        Selamat datang di <span class="fw-semibold">Aplikasi Management Sales</span>!
                     </h4>
                     <p class="lead-dashboard mb-4">Aplikasi Management Sales adalah sebuah aplikasi yang digunakan untuk mengelola data sales, cars, dan transactions. Aplikasi ini memungkinkan Anda untuk mengelola data sales, cars, dan transactions dengan mudah dan efisien.</p>
                     <div class="d-grid gap-3 d-md-flex justify-content-md-start">
                        <a href="" target="_blank" class="btn btn-primary py-2 px-4">
                           Show Projects <i class="ti ti-chevron-right align-middle ms-2"></i>
                        </a>
                     </div>
                  </div>
               </div>
            </div>

            <div class="row mb-3">
               <!-- menampilkan informasi jumlah data Customer -->
               <div class="col-lg-6 col-xl-4">
                  <div class="bg-white rounded-2 shadow-sm p-4 p-lg-4-2 mb-4">
                     <div class="d-flex align-items-center justify-content-start">
                        <div class="text-muted me-4">
                           <i class="ti ti-users fs-1 bg-warning text-white rounded-2 p-2"></i>
                        </div>
                        <div>
                           <p class="text-muted mb-1">Sales</p>
                           <h5 class="fw-bold mb-0"><?= getTotal('sales'); ?></h5>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- menampilkan informasi jumlah data Cars -->
               <div class="col-lg-6 col-xl-4">
                  <div class="bg-white rounded-2 shadow-sm p-4 p-lg-4-2 mb-4">
                     <div class="d-flex align-items-center justify-content-start">
                        <div class="me-4">
                           <i class="ti ti-car-suv fs-1 bg-success text-white rounded-2 p-2"></i>
                        </div>
                        <div>
                           <p class="text-muted mb-1">Cars</p>
                           <h5 class="fw-bold mb-0"><?= getTotal('cars'); ?></h5>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- menampilkan informasi jumlah data Transaction -->
               <div class="col-lg-6 col-xl-4">
                  <div class="bg-white rounded-2 shadow-sm p-4 p-lg-4-2 mb-4">
                     <div class="d-flex align-items-center justify-content-start">
                        <div class="text-muted me-4">
                           <i class="ti ti-shopping-cart-copy fs-1 bg-info text-white rounded-2 p-2"></i>
                        </div>
                        <div>
                           <p class="text-muted mb-1">Transactions</p>
                           <h5 class="fw-bold mb-0"><?= getTotal('transactions'); ?></h5>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <!-- menampilkan informasi product terlaris -->
            <div class="bg-white rounded-2 shadow-sm pt-4 px-4 pb-3 mb-5">
               <h6 class="mb-0">
                  <i class="ti ti-folder-star fs-5 align-text-top me-1"></i>
                  5 Most Sales Seller.
               </h6>

               <hr class="mb-4">

               <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover" style="width:100%">
                     <thead>
                        <th class="text-center">Image</th>
                        <th class="text-center">Sales Name</th>
                        <th class="text-center">Sold</th>
                     </thead>
                     <tbody>
                        <?php
                        // query menampilkan 5 data informasi sales yang menjual terbanyak
                        $query = $conn->query("SELECT name, sales_id, COUNT(*) AS total FROM transactions INNER JOIN sales ON transactions.sales_id = sales.id GROUP BY sales_id ORDER BY total DESC LIMIT 5");

                        if (mysqli_num_rows($query) > 0) {
                           foreach ($query as $data) :
                        ?>
                              <tr>
                                 <td width="50" class="text-center">
                                    <img src="" class="img-thumbnail rounded-4" width="80" alt="Images">
                                 </td>
                                 <td width="200"><?= $data['name'] ?></td>
                                 <td width="80" class="text-center"><?= $data['total'] ?></td>
                              </tr>
                           <?php endforeach;
                        } else { ?>
                           <!-- jika data tidak ada, tampilkan pesan data tidak tersedia -->
                           <tr>
                              <td colspan="6">
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
</body>

</html>

<?php
function getTotal($table)
{
   global $conn;
   $query = $conn->query("SELECT COUNT(*) AS total FROM $table");
   $row = mysqli_fetch_assoc($query);
   return $row['total'];
}
?>