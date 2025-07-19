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
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="../../assets/css/argon-dashboard.css" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-dark position-absolute w-100"></div>
    <?php include_once("../koneksi/koneksi.php"); ?>
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Product</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Add Product</h6>
                </nav>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row mt-4">
                <div class="col-lg-12 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-2">Add Product</h6>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <form action="create.php" method="post" enctype="multipart/form-data" class="container mt-4">
                                <!-- Name -->
                                <div class="form-group row mb-3">
                                    <label for="name" class="col-sm-3 col-form-label text-end">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="Product Name" name="name" id="name" required>
                                    </div>
                                </div>

                                <!-- Type -->
                                <div class="form-group row mb-3">
                                    <label for="type" class="col-sm-3 col-form-label text-end">Type</label>
                                    <div class="col-sm-6">
                                        <select id="type" name="type" class="form-control" required>
                                            <option value="" disabled selected>-- Choose Type --</option>
                                            <option value="press-on">Press-on</option>
                                            <option value="nail-art">Nail-art</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Color -->
                                <div class="form-group row mb-3">
                                    <label for="color" class="col-sm-3 col-form-label text-end">Color</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="Color" name="color" id="color" required>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="form-group row mb-3">
                                    <label for="desc" class="col-sm-3 col-form-label text-end">Description</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" name="desc" id="desc" placeholder="Description" required></textarea>
                                    </div>
                                </div>

                                <!-- Type Production -->
                                <div class="form-group row mb-3">
                                    <label for="type_production" class="col-sm-3 col-form-label text-end">Type Production</label>
                                    <div class="col-sm-6">
                                        <select id="type_production" name="type_production" class="form-control" required disabled>
                                            <option value="" disabled selected>-- Type time Production --</option>
                                            <option value="booking">Booking</option>
                                            <option value="pre-order">Pre-order</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Photo -->
                                <div class="form-group row mb-3">
                                    <label for="photo" class="col-sm-3 col-form-label text-end">Photo</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control" name="photo" id="photo" accept="image/*" required>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="form-group row float-end">
                                    <div class="col-sm-12 offset-sm-3">
                                        <a href="index.php" class="btn btn-info me-2">Back</a>
                                        <button type="submit" name="submit" class="btn btn-success">Add Product</button>
                                    </div>
                                </div>
                            </form>

                            <?php
                            if (isset($_POST['submit'])) {
                                $name = $_POST['name'];
                                $type = $_POST['type'];
                                $color = $_POST['color'];
                                $desc = $_POST['desc'];
                                $type_production = $_POST['type_production'];

                                include_once("../koneksi/koneksi.php");

                                // Handle file upload
                                $photo = null;
                                if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                                    $uploadDir = '../product/photo/';
                                    if (!is_dir($uploadDir)) {
                                        mkdir($uploadDir, 0755, true);
                                    }
                                    $fileTmpPath = $_FILES['photo']['tmp_name'];
                                    $fileName = basename($_FILES['photo']['name']);
                                    $fileNameCmps = explode(".", $fileName);
                                    $fileExtension = strtolower(end($fileNameCmps));
                                    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                                    $destPath = $uploadDir . $newFileName;

                                    if (move_uploaded_file($fileTmpPath, $destPath)) {
                                        $photo = $newFileName;
                                    } else {
                                        echo "<script>alert('There was an error uploading the photo.');</script>";
                                    }
                                } else {
                                    echo "<script>alert('Photo upload failed or no photo selected.');</script>";
                                }

                                if ($photo) {
                                    $query = "INSERT INTO product (name, type, color, `desc`, type_production, photo) VALUES ('$name', '$type', '$color', '$desc', '$type_production', '$photo')";
                                    $result = mysqli_query($conn, $query);

                                    if ($result) {
                                        echo "<script>
                                            alert('Product added successfully');
                                            window.location.href = 'index.php';
                                        </script>";
                                    } else {
                                        echo "<script>
                                            alert('Failed to add product: " . mysqli_error($conn) . "');
                                        </script>";
                                    }
                                }
                            }
                            ?>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const typeSelect = document.getElementById('type');
            const typeProductionSelect = document.getElementById('type_production');

            typeSelect.addEventListener('change', function() {
                if (typeSelect.value === 'press-on') {
                    typeProductionSelect.value = 'pre-order';
                } else if (typeSelect.value === 'nail-art') {
                    typeProductionSelect.value = 'booking';
                }
            });
        });
    </script>
</body>

</html>