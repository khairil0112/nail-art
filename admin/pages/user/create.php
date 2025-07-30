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

<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }
</style>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-dark position-absolute w-100"></div>
    <?php include_once("../koneksi/koneksi.php");
    $result = mysqli_query($conn, "SELECT * FROM user");
    ?>
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Type here...">
                        </div>
                    </div>

                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row mt-4">
                <div class="col-lg-12 mb-lg-0 mb-4">
                    <div class="card">
                        <!-- <a href="create.php" class='btn btn-success btn-sm' style='margin : 5px'>Add Data</a> -->
                        <div class="card-header pb-0 p-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-2">Add Data</h6>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <form action="create.php" method="post" enctype="multipart/form-data" class="container mt-4">
                                <!-- ID -->
                                <div class="form-group row mb-3">
                                    <label for="name" class="col-sm-3 col-form-label text-end">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="Input Admin Names" name="name" id="name" required>
                                    </div>
                                </div>

                                <!-- Address -->
                                <div class="form-group row mb-3">
                                    <label for="address" class="col-sm-3 col-form-label text-end">Address</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" name="address" id="address" placeholder="Admin Address" required></textarea>
                                    </div>
                                </div>

                                <!-- Gender -->
                                <div class="form-group row mb-4">
                                    <label for="gender" class="col-sm-3 col-form-label text-end">Gender</label>
                                    <div class="col-sm-6">
                                        <select id="gender" name="gender" class="form-control" required>
                                            <option value="" disabled selected>-- Choose Gender --</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="form-group row mb-4">
                                    <label for="phone" class="col-sm-3 col-form-label text-end">Phone</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" placeholder="Input Admin Phones" name="phone" id="phone" required>
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="form-group row mb-4">
                                    <label for="password" class="col-sm-3 col-form-label text-end">Password</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" placeholder="Input Password" name="password" id="password" required>
                                    </div>
                                </div>

                                <!-- Photo -->
                                <div class="form-group row mb-4">
                                    <label for="photo" class="col-sm-3 col-form-label text-end">Photo</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control" name="photo" id="photo" accept="image/*" required onchange="previewPhoto(event)">
                                        <img id="photoPreview" src="#" alt="Photo Preview" class="mb-3" style="display:none; max-width: 50%; margin-top: 10px; border-radius: 5px;" />
                                    </div>
                                </div>

                                <!-- Tombol Aksi -->
                                <div class="form-group row float-end">
                                    <div class="col-sm-12 offset-sm-3">
                                        <a href="index.php" class="btn btn-info me-2">Back</a>
                                        <button type="submit" name="submit" class="btn btn-success">Send</button>
                                    </div>
                                </div>
                            </form>


                            <?php
                            if (isset($_POST['submit'])) {
                                include_once("../koneksi/koneksi.php");

                                $name = mysqli_real_escape_string($conn, trim($_POST['name']));
                                $address = mysqli_real_escape_string($conn, trim($_POST['address']));
                                $gender = mysqli_real_escape_string($conn, trim($_POST['gender']));
                                $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
                                $password = trim($_POST['password']);

                                $error = '';

                                if ($name === '' || $address === '' || $gender === '' || $phone === '' || $password === '') {
                                    $error = "Please fill in all required fields.";
                                } else {
                                    $password_hash = md5($password);

                                    // untuk lokasi photo upload
                                    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
                                        $photo = $_FILES['photo'];
                                        $photo_name = $photo['name'];
                                        $photo_tmp = $photo['tmp_name'];
                                        $photo_size = $photo['size'];

                                        $upload_dir = '../user/photo/';
                                        if (!is_dir($upload_dir)) {
                                            mkdir($upload_dir, 0755, true);
                                        }

                                        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
                                        $photo_ext = strtolower(pathinfo($photo_name, PATHINFO_EXTENSION));

                                        if (in_array($photo_ext, $allowed_types)) {
                                            if ($photo_size <= 10 * 1024 * 1024) { // 5MB max
                                                $new_photo_name = uniqid('photo_', true) . '.' . $photo_ext;
                                                $photo_destination = $upload_dir . $new_photo_name;
                                                if (move_uploaded_file($photo_tmp, $photo_destination)) {
                                                    // Insert data with prepared statement
                                                    $stmt = $conn->prepare("INSERT INTO user (name, address, gender, phone, password, photo) VALUES (?, ?, ?, ?, ?, ?)");
                                                    $stmt->bind_param("ssssss", $name, $address, $gender, $phone, $password_hash, $new_photo_name);
                                                    if ($stmt->execute()) {
                                                        echo "<script>
                                                            alert('Data berhasil disimpan');
                                                            window.location.href = 'index.php';
                                                        </script>";
                                                    } else {
                                                        echo "<script>alert('Error: Gagal menyimpan data ke database.');</script>";
                                                    }
                                                    $stmt->close();
                                                } else {
                                                    echo "<script>alert('Error: Gagal mengupload foto.');</script>";
                                                }
                                            } else {
                                                echo "<script>alert('Error: Ukuran foto terlalu besar. Maksimal 5MB.');</script>";
                                            }
                                        } else {
                                            echo "<script>alert('Error: Format foto tidak didukung.');</script>";
                                        }
                                    } else {
                                        echo "<script>alert('Error: Terjadi kesalahan saat mengupload foto.');</script>";
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
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="fa fa-cog py-2"> </i>
        </a>
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3 ">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Argon Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0 overflow-auto">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <div class="d-flex my-3">
                    <h6 class="mb-0">Navbar Fixed</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-sm-4">
                <div class="mt-2 mb-5 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                    </div>
                </div>
                <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/argon-dashboard">Free Download</a>
                <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard">View documentation</a>
                <div class="w-100 text-center">
                    <a class="github-button" href="https://github.com/creativetimofficial/argon-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/argon-dashboard on GitHub">Star</a>
                    <h6 class="mt-3">Thank you for sharing!</h6>
                    <a href="https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/argon-dashboard.min.js?v=2.1.0"></script>
<script>
    function previewPhoto(event) {
        const input = event.target;
        const preview = document.getElementById('photoPreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>
</body>

</html>
