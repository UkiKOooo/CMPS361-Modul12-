<?php

session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['logout'])) {
    $_SESSION = array();

    session_destroy();

    header("Location: login.php");
    exit;
}

$username = htmlspecialchars($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the App</title>
    <style>
        body { font-family: Arial, sans-serif; display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh; background-color: #e9ecef; }
        .welcome-card { background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); text-align: center; }
        h1 { color: #28a745; margin-bottom: 20px; }
        p { color: #6c757d; margin-bottom: 30px; font-size: 1.1em; }
        .nav-link { padding: 10px 20px; color: white; border: none; border-radius: 6px; cursor: pointer; text-decoration: none; display: inline-block; transition: background-color 0.3s; margin: 5px; }
        .nav-link:hover { opacity: 0.9; }
        .btn-products { background-color: #007bff; }
        .btn-add-product { background-color: #28a745; }

        .btn-activities { background-color: #ffc107; color: #333; }
        .btn-activities:hover { background-color: #e0a800; }
        .btn-logout { background-color: #dc3545; }
    </style>
</head>
<body>
    <div class="welcome-card">
        <h1>Welcome, <?php echo $username; ?>!</h1>
        <p>You have successfully authenticated and entered the application.</p>
        <p>This is the starting point for your main application features.</p>
        
        <a href="products.php" class="nav-link btn-products">View Products</a> 
        
        <a href="add_product.php" class="nav-link btn-add-product">Add Product</a>
        
        <a href="activities.php" class="nav-link btn-activities">View Activities</a>
        
        <a href="?logout=true" class="nav-link btn-logout">Logout</a>
    </div>
</body>
</html>