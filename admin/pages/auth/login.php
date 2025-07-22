<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Login</title>
    <link href="../../assets/css/argon-dashboard.css" rel="stylesheet" />
    <link href="../../assets/css/custom-overrides.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
            <h3 class="text-center mb-4">Admin Login</h3>
            <?php if (isset($_GET['error'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    switch ($_GET['error']) {
                        case 'emptyfields':
                            echo "Please fill in all fields.";
                            break;
                        case 'wrongpassword':
                            echo "Incorrect password.";
                            break;
                        case 'nouser':
                            echo "User not found.";
                            break;
                        case 'dberror':
                            echo "Database error.";
                            break;
                        default:
                            echo "Unknown error.";
                    }
                    ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="proses-login.php">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required autofocus />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required />
                </div>
                <p>Haven't account yet <a href="register.php">Register</a> now!!</p>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
