<?php
session_start();
include_once '../koneksi/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($name === '' || $password === '') {
        header("Location: login.php?error=emptyfields");
        exit();
    }

    $query = "SELECT * FROM user WHERE name = ?";
    $stmt = mysqli_prepare($conn, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            // Use md5 hash comparison (insecure, legacy)
            if (md5($password) === $row['password']) {
                $_SESSION['login'] = true;
                $_SESSION['name'] = $row['name'];
                $_SESSION['id_admin'] = $row['id'];
                header("Location: ../main/dashboard.php");
                exit();
            } else {
                header("Location: login.php?error=wrongpassword");
                exit();
            }
        } else {
            header("Location: login.php?error=nouser");
            exit();
        }
        mysqli_stmt_close($stmt);
    } else {
        header("Location: login.php?error=dberror");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>
