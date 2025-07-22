<?php
session_start();
include_once '../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $gender = trim($_POST['gender'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $error = '';

    if ($name === '' || $address === '' || $gender === '' || $phone === '' || $password === '') {
        $error = "Please fill in all required fields.";
    } else {
        // Hash the password using md5 (insecure, for legacy compatibility)
        $password_hash = md5($password);
        // Handle photo upload
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
                if ($photo_size <= 5 * 1024 * 1024) { // 5MB max
                    $new_photo_name = uniqid('photo_', true) . '.' . $photo_ext;
                    $photo_destination = $upload_dir . $new_photo_name;
                    if (move_uploaded_file($photo_tmp, $photo_destination)) {
                        // Insert data with prepared statement
                        $stmt = $conn->prepare("INSERT INTO user (name, address, gender, phone, password, photo) VALUES (?, ?, ?, ?, ?, ?)");
                        $stmt->bind_param("ssssss", $name, $address, $gender, $phone, $password_hash, $new_photo_name);
                        if ($stmt->execute()) {
                            echo "<script>
                                alert('Registration successful. You can now login.');
                                window.location.href = 'login.php';
                            </script>";
                            exit;
                        } else {
                            $error = "Error: Failed to save data to database.";
                        }
                        $stmt->close();
                    } else {
                        $error = "Error: Failed to upload photo.";
                    }
                } else {
                    $error = "Error: Photo size too large. Max 5MB.";
                }
            } else {
                $error = "Error: Unsupported photo format.";
            }
        } else {
            $error = "Error: Photo upload error.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register</title>
    <link href="../../assets/css/argon-dashboard.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card shadow-lg p-4" style="max-width: 500px; width: 100%;">
            <h3 class="text-center mb-4">Register</h3>
            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <form action="register.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required />
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select id="gender" name="gender" class="form-control" required>
                        <option value="" disabled selected>-- Choose Gender --</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="number" class="form-control" id="phone" name="phone" required />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required />
                </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <img id="photoPreview" src="#" alt="Photo Preview" class="mb-3" style="display:none; max-width: 50%; margin-top: 10px; border-radius: 5px;" />
                <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required onchange="previewPhoto(event)" />
            </div>
            <div class="d-flex justify-content-end">
                <a href="login.php" class="btn btn-secondary me-2">Back to Login</a>
                <button type="submit" class="btn btn-primary" name="submit">Register</button>
            </div>
            </form>
        </div>
    </div>
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
