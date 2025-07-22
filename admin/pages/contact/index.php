<?php
 session_start();
  if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
      header("Location: ../auth/login.php");
      exit();
  }
include_once("../koneksi/koneksi.php");

// Use prepared statement for security
$sql = "SELECT id, username, email, phone, subject, message FROM contact ORDER BY id ASC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Contact Data | Admin Panel</title>

  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Argon CSS -->
  <link href="../../assets/css/argon-dashboard.css" rel="stylesheet" />
  <link href="../../assets/css/custom-overrides.css" rel="stylesheet" />

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
<?php include_once("../aside/aside.php"); ?>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include_once("../nav/navbar.php"); ?>
    <!-- End Navbar -->

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
              <h6>Contact List</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-3">
                <table id="contactTable" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Username</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Phone</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Subject</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    while ($data = $result->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td><p class='text-xs font-weight-bold mb-0'>" . $no++ . "</p></td>";
                      echo "<td><p class='text-xs font-weight-bold mb-0'>" . htmlspecialchars($data['username']) . "</p></td>";
                      echo "<td><p class='text-xs font-weight-bold mb-0'>" . htmlspecialchars($data['phone']) . "</p></td>";
                      echo "<td><p class='text-xs font-weight-bold mb-0'>" . htmlspecialchars($data['subject']) . "</p></td>";
                      echo "<td><a data-bs-toggle='modal' href='#portfolioModal" . $data['id'] . "' class='btn btn-info btn-sm'>Detail</a></td>";
                      echo "</tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php
      $result->data_seek(0);
      while ($data = $result->fetch_assoc()) {
      ?>
        <div class="modal fade" id="portfolioModal<?= $data['id']; ?>" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title"><?= htmlspecialchars($data['username']); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p class="text-muted mb-1"><?= htmlspecialchars($data['email']); ?></p>
                <p><?= nl2br(htmlspecialchars($data['message'])); ?></p>
                <ul class="list-unstyled">
                  <li><strong>Phone:</strong> <?= htmlspecialchars($data['phone']); ?></li>
                  <li><strong>Subject:</strong> <?= htmlspecialchars($data['subject']); ?></li>
                </ul>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      <?php
      }
      ?>

    </div>
  </main>

  <!-- Core JS Files -->
  <script src="../../assets/js/core/popper.min.js"></script>
  <script src="../../assets/js/core/bootstrap.min.js"></script>
  <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../../assets/js/plugins/chartjs.min.js"></script>
  <script src="../../assets/js/argon-dashboard.min.js?v=2.0.4"></script>

  <!-- jQuery and DataTables -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../../plugins/jszip/jszip.min.js"></script>
  <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <script>
    $(document).ready(function () {
      $("#contactTable").DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
      }).buttons().container().appendTo("#contactTable_wrapper .col-md-6:eq(0)");
    });
  </script>
</body>

</html>
