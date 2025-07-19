<?php
require_once('../koneksi/koneksi.php');

$id = $_GET['id'];

// Check if product is used in other tables if needed (optional)
// For now, just delete from product table

$sql = mysqli_query($conn, "DELETE FROM product WHERE id='$id'");

if ($sql) {
    echo '<script>alert("Product deleted successfully"); window.location="index.php";</script>';
} else {
    echo '<script>alert("Failed to delete product: ' . mysqli_error($conn) . '"); window.location="index.php";</script>';
}
?>
