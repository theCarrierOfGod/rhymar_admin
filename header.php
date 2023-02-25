<?php

include_once('./conn.php');

if (!isset($_SESSION['login'])) {
    header("Location: auth/login.php");
    exit();
} else {
    $username = $_SESSION['login'];
    $query = mysqli_query($con, "SELECT * FROM admin WHERE username='$username'");
    $online = mysqli_fetch_assoc($query);

    $no_of_products = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM products"));
    
    $categoryNum = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM category WHERE deleted=0"));

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Admin @ Rhymar Worldz Collection</title>
    <link href="./assets/img/logo.png" rel="icon" type="image/png" />
    <link href="./assets/bs/css/bootstrap.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name="title" content=Flynet>
    <meta name="author" content="JAY">
    <meta name="description" content="We offer various fashion products" />
    <meta name="keywords" content="fashion, beauty, women, men, kids, accessories, beautiful" />
    <meta property="og:type" content="website">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" href="./assets/img/logo.png" color="#3b7403">
    <meta name="msapplication-TileColor" content="#3b7403">
    <meta name="theme-color" content="#3b7403">
    <link type="text/css" href="css/all.min.css" rel="stylesheet">
    <link type="text/css" href="css/notyf.min.css" rel="stylesheet">
    <link type="text/css" href="css/volt.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/fa/css/fontawesome.min.css">
    <script src="/assets/js/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".menu").on("click", function() {
                $("#sidebarMenu").toggleClass("collapse");
            })
        })
    </script>
</head>

<body>
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-THQTXJ7" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-md-none">
        <a class="navbar-brand mr-lg-5" href="/" style="color:white;font-weight:bolder;font-size:20px">
            <strong>
                <img src="./assets/img/logo.png" alt="RHYMAR" /> RHYMAR
            </strong>
        </a>
        <div class="d-flex align-items-center">
            <button class="navbar-toggler d-md-none collapsed menu" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <nav id="sidebarMenu" class="sidebar d-md-block bg-primary text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
                <div class="d-flex align-items-center">
                    <div class="user-avatar lg-avatar mr-4">
                        <i class="fa fa-user-circle" style="font-size:36px"></i>
                    </div>
                    <div class="d-block">
                        <h2 class="h6">Hi, <?php echo $_SESSION['login']; ?></h2>
                        <form method="post" action="auth/logout.php">
                            <input type="hidden" name="_token" value="8vPngdkB7I12T7c8LzMJXA11Tk1fCjyoIWt3zQYn" />
                            <button type="submit" class="btn btn-secondary text-dark btn-xs">
                                <span class="mr-2">
                                    <span class="fa fa-sign-out"></span>
                                </span>Sign Out
                            </button>
                        </form>
                    </div>
                </div>
                <div class="collapse-close d-md-none menu">
                    <a href="#sidebarMenu" class="fa fa-times" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation"></a>
                </div>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item mt-2 <?php if ($_SERVER['REQUEST_URI'] == '/') {
                                                echo 'active';
                                            } ?>">
                    <a href="/" class="nav-link">
                        <span class="sidebar-icon">
                            <span class="fa fa-chart-pie"></span>
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '/products.php') {
                                        echo 'active';
                                    } ?>">
                    <a href="/products.php" class="nav-link">
                        <span class="sidebar-icon">
                            <i class="fas fa-layer-group"></i>
                        </span>
                        <span>
                            Products
                        </span>
                    </a>
                </li>
                <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '/new-product.php') {
                                        echo 'active';
                                    } ?>">
                    <a href="/new-product.php" class="nav-link">
                        <span class="sidebar-icon">
                            <i class="fa fa-plus-square" aria-hidden="true"></i>
                        </span>
                        <span>
                            New Product
                        </span>
                    </a>
                </li>
                <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '/newsletter.php') {
                                        echo 'active';
                                    } ?>">
                    <a href="/newsletter.php" class="nav-link">
                        <span class="sidebar-icon">
                            <i class="fa fa-bullhorn"></i>
                        </span>
                        <span>
                            Newsletter
                        </span>
                    </a>
                </li>
                
                <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '/categories.php') {
                                        echo 'active';
                                    } ?>">
                    <a href="/categories.php" class="nav-link">
                        <span class="sidebar-icon">
                            <i class="fas fa-list-alt"></i>
                        </span>
                        <span>
                            Categories
                        </span>
                    </a>
                </li>
                <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '/new-category.php') {
                                        echo 'active';
                                    } ?>">
                    <a href="/new-category.php" class="nav-link">
                        <span class="sidebar-icon">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </span>
                        <span>
                            New Category
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/auth/logout.php" class="nav-link">
                        <span class="sidebar-icon">
                            <span class="fa fa-chart-pie"></span>
                        </span>
                        <span>
                            Logout
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>