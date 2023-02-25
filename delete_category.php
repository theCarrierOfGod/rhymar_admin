<?php
require_once('./header.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = mysqli_query($conn, "DELETE FROM category WHERE id='$id'; ");
    if($query) {
        echo "<script> window.location.href = 'categories.php'; </script>";
    }
}

?>
