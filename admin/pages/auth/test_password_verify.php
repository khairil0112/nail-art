<?php
$hashed_password = '$2y$10$uJCx0xjTKQcZejlFwOTGo.gQmJXi/Z1vMBNJDu8HGP4';
$password_to_test = 'admin'; // The password user said they registered with

if (password_verify($password_to_test, $hashed_password)) {
    echo "Password matches the hash.";
} else {
    echo "Password does NOT match the hash.";
}
?>
