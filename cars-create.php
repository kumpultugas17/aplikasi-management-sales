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
                     <a href="cars.php" class="nav-link text-nowrap me-3 active">
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
            <div class="d-flex flex-column flex-lg-row mb-2">
               <!-- Page Title -->
               <div class="flex-grow-1">
                  <h5 class="page-title">Sales</h5>
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
                           Sales
                        </li>
                     </ol>
                  </nav>
               </div>
            </div>

            <div class="bg-white rounded-2 shadow-sm pt-4 px-4 pb-3 mb-5">
               <!-- form -->
               <form action="process-create-car.php" method="post">
                  <div class="mb-3 row align-items-center">
                     <label for="merk" class="col-sm-2 form-label">Merk Car</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" name="merk" id="merk" placeholder="Enter merk car">
                     </div>
                  </div>
                  <div class="mb-3 row align-items-center">
                     <label for="model" class="col-sm-2 form-label">Model</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" name="model" id="model" placeholder="Enter model car">
                     </div>
                  </div>
                  <div class="mb-3 row align-items-center">
                     <label for="harga" class="col-sm-2 form-label">Price</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" name="harga" id="harga" placeholder="Enter price car">
                     </div>
                  </div>
                  <div class="mb-3 row align-items-center">
                     <label for="tahun" class="col-sm-2 form-label">Year</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Enter year car">
                     </div>
                  </div>

                  <div class="d-grid gap-3 d-sm-flex justify-content-md-start pt-1 offset-lg-2 offset-md-2">
                     <button type="submit" class="btn btn-primary py-2 px-4" style="margin-left: 3px">Save</button>
                     <a href="sales.php" class="btn btn-outline-secondary py-2 px-3">Cancel</a>
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
</body>

</html>