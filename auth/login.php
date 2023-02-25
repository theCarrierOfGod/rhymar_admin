<?php
include_once('../conn.php');

if (isset($_SESSION['login'])) {
    header("Location: /");
    exit();
}

$userError = '';
$pwdError = '';
$username = '';

if (isset($_GET['user'])) {
    $username = $_GET['user'];
}

if (isset($_GET['userError'])) {
    $userError = $_GET['userError'];
}
if (isset($_GET['pwdError'])) {
    $pwdError = $_GET['pwdError'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Admin @ Rhymar Worldz Collection</title>
    <link href="../assets/img/logo.png" rel="icon" type="image/png" />
    <link href="../assets/bs/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/auth.css" rel="stylesheet" />
</head>

<body>
    <div class="body">
        <div class="login-form">
            <form action="processes.php" method="post">
                <div class="form-group mb-3">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $username; ?>" class="form-control mt-1" placeholder="Username" aria-describedby="helpId" required>
                    <small id="helpId" class="text-muted text-error"><?php echo $userError; ?></small>
                </div>
                <div class="form-group mb-3">
                    <label for="username">Password</label>
                    <input type="password" name="password" id="password" class="form-control mt-1" placeholder="Password" aria-describedby="helpId" required>
                    <small id="helpId" class="text-muted text-error"><?php echo $pwdError; ?></small>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>