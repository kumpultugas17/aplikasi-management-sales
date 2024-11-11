<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="Aplikasi Menegement Sales">
   <meta name="author" content="M. Iqbal Adenan">
   <title>Aplikasi Management Sales | Login</title>
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <!-- Gogole Font -->
   <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
   <!-- My Style -->
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
         background-image: url('assets/images/background-login.jpeg');
         background-repeat: no-repeat;
         background-size: cover;
         background-position: center;
         background-attachment: fixed;
      }

      .card {
         box-shadow: 0 0 1rem 0 rgba(0, 0, 0, .2);
         border-radius: 5px;
         background-color: rgba(255, 255, 255, .15);

         backdrop-filter: blur(5px);
      }
   </style>
</head>

<body>
   <div class="container">
      <div class="row d-flex justify-content-center align-items-center vh-100">
         <div class="col-4">
            <div class="card px-3 py-4">
               <div class="card-body">
                  <h3 class="text-center fw-bold mb-4">Login Aplikasi</h3>
                  <div class="mb-3">
                     <label for="email" class="form-label">Email</label>
                     <input type="email" name="email" id="email" class="form-control">
                  </div>
                  <div class="mb-5">
                     <label for="password" class="form-label">Password</label>
                     <input type="password" name="password" id="password" class="form-control">
                  </div>
                  <div class="d-grid">
                     <button type="submit" class="btn btn-primary">Login</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Bootstrap JS -->
   <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>