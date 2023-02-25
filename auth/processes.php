<?php
require('../conn.php');

if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if (empty($username)) {
        header("Location: login.php?userError=Username is required");
        exit();
    } else if (empty($password)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {
        $query = "SELECT * FROM admin WHERE username='$username'";
        $sql = mysqli_query($conn, $query);
        if (mysqli_num_rows($sql) == 1) {
            $user = mysqli_fetch_assoc($sql);
            if($user['password'] == $password) {
                $_SESSION['login'] = $username;
                header("Location: /");
            } else {
                header("Location: login.php?pwdError=Incorrect password supplied&user=$username");
            exit();
            }
        } else {
            header("Location: login.php?userError=Username not registered in our database&user=$username");
            exit();
        }
    }
} else {
    header("Location: login.php?userError=Username  is required&pwdError=Password  is required");
    exit();
}
