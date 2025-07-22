<?php
session_start();
include_once '../koneksi/koneksi.php';

$blogId = $_GET['id'] ?? 1; // get id from query param or default to 1

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = trim($_POST['subject'] ?? '');
    $description = trim($_POST['description'] ?? '');

    $error = '';

    if ($subject === '' || $description === '') {
        $error = "Subject and description are required.";
    } else {
        $stmt = $conn->prepare("UPDATE blog SET subject = ?, description = ? WHERE id = ?");
        $stmt->bind_param("ssi", $subject, $description, $blogId);
        if ($stmt->execute()) {
            $success = "Blog updated successfully.";

        } else {
            $error = "Failed to update blog: " . $stmt->error;
        }
        $stmt->close();
    }
}

// Load blog data
$stmt = $conn->prepare("SELECT subject, description FROM blog WHERE id = ?");
$stmt->bind_param("i", $blogId);
$stmt->execute();
$result = $stmt->get_result();
$blog = $result->fetch_assoc();
$stmt->close();

$subject = $blog['subject'] ?? '';
$description = $blog['description'] ?? '';
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
            <h3 class="text-center mb-4">Edit Blog</h3>
            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <?php if (!empty($success)) : ?>
                <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
            <?php endif; ?>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" required value="<?= htmlspecialchars($subject) ?>" />
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="6" required><?= htmlspecialchars($description) ?></textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="index.php" class="btn btn-dark m-1">Back</a>
                    <button type="submit" class="btn btn-primary m-1">Update Blog</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
