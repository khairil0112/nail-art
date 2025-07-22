<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Argon Dashboard 3 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">

  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">

  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="../../assets/css/argon-dashboard.css" rel="stylesheet" />
  <link href="../../assets/css/custom-overrides.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
<?php
  session_start();
  if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
      header("Location: ../auth/login.php");
      exit();
  }
  include_once("../aside/aside.php");
  include_once("../koneksi/koneksi.php");

  // Get counts
  $user_count = 0;
  $product_count = 0;
  $contact_count = 0;

  $result = mysqli_query($conn, "SELECT COUNT(*) as total FROM user");
  if ($result) {
    $user_count = mysqli_fetch_assoc($result)['total'];
  }

  $result = mysqli_query($conn, "SELECT COUNT(*) as total FROM product");
  if ($result) {
    $product_count = mysqli_fetch_assoc($result)['total'];
  }

  $result = mysqli_query($conn, "SELECT COUNT(*) as total FROM contact");
  if ($result) {
    $contact_count = mysqli_fetch_assoc($result)['total'];
  }
  ?>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <?php include_once("../nav/navbar.php") ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card bg-gradient-primary shadow-primary border-radius-lg">
            <div class="card-body p-3">
              <div class="d-flex align-items-center">
                <div class="icon icon-shape bg-white shadow rounded-circle text-primary">
                  <i class="ni ni-single-02 text-primary text-lg"></i>
                </div>
                <div class="ms-3">
                  <p class="text-white mb-0 font-weight-bold">Users</p>
                  <h4 class="text-white mb-0"><?= $user_count ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card bg-gradient-success shadow-success border-radius-lg">
            <div class="card-body p-3">
              <div class="d-flex align-items-center">
                <div class="icon icon-shape bg-white shadow rounded-circle text-success">
                  <i class="ni ni-box-2 text-success text-lg"></i>
                </div>
                <div class="ms-3">
                  <p class="text-white mb-0 font-weight-bold">Products</p>
                  <h4 class="text-white mb-0"><?= $product_count ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card bg-gradient-info shadow-info border-radius-lg">
            <div class="card-body p-3">
              <div class="d-flex align-items-center">
                <div class="icon icon-shape bg-white shadow rounded-circle text-info">
                  <i class="ni ni-email-83 text-info text-lg"></i>
                </div>
                <div class="ms-3">
                  <p class="text-white mb-0 font-weight-bold">Contacts</p>
                  <h4 class="text-white mb-0"><?= $contact_count ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script src="../assets/js/argon-dashboard.min.js?v=2.1.0"></script>
</body>

</html>
