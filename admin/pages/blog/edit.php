<?php
include_once("../koneksi/koneksi.php");

$subject = "";
$description = "";
$error = "";
$success = "";

$result = mysqli_query($conn, "SELECT * FROM blog WHERE id = '1'");
if (mysqli_num_rows($result) > 0) {
    $blog_data = mysqli_fetch_array($result);
    $subject = $blog_data['subject'];
    $description = $blog_data['description'];
} else {
    $error = "Data blog untuk ID 1 tidak ditemukan.";
}

if (isset($_POST['submit_edit'])) {
    $id = 1;
    $subject_baru = mysqli_real_escape_string($conn, $_POST['subject']);
    $description_baru = mysqli_real_escape_string($conn, $_POST['description']);

    if (empty($error)) {
        $query_update = "UPDATE blog SET subject ='$subject_baru', description ='$description_baru' WHERE id = '$id'";
        $result_update = mysqli_query($conn, $query_update);

        if ($result_update) {
            $success = "Data blog berhasil diperbarui!";
            $subject = $subject_baru;
            $description = $description_baru;
        } else {
            $error = "Gagal memperbarui data blog: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Blog</title>
    <link href="../../assets/css/argon-dashboard.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card shadow-lg p-4" style="max-width: 700px; width: 100%;">
            <h3 class="text-center mb-4">Edit Blog Post</h3>
            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger text-center"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <?php if (!empty($success)) : ?>
                <div class="alert alert-success text-center"><?= htmlspecialchars($success) ?></div>
            <?php endif; ?>
            <form method="POST" action="">
                <input type="hidden" name="id" value="1" />

                <div class="mb-3">
                    <label for="subject" class="form-label">subject Blog</label>
                    <input type="text" class="form-control" id="subject" name="subject" required value="<?= htmlspecialchars($subject) ?>" />
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Isi Blog</label>
                    <textarea class="form-control" id="description" name="description" rows="6" required><?= htmlspecialchars($description) ?></textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="index.php" class="btn btn-dark m-1">Kembali</a>
                    <button type="submit" name="submit_edit" class="btn btn-primary m-1">Perbarui Blog</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
