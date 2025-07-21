<?php 

include_once("../koneksi/koneksi.php");
$sql = "SELECT * FROM contact order by id asc";
$result = mysqli_query($conn, $sql);

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];


    $result = mysqli_query($conn, "INSERT INTO contact (username, email,  phone, subject, message) 
    VALUES ('$username', '$email', '$phone', '$subject', '$message')");

    // keterangan jika data berhasil ditambahkan

    echo "<script>
                if (confirm('Message Delivered.')) {
                window.location.href = 'index.php'; 
    }
                </script>";
}

?>