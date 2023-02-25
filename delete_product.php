<?php
require_once('./header.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = mysqli_query($conn, "DELETE FROM products WHERE product_id='$id'; ");
    if($query) {
        echo "<script> window.location.href = 'products.php'; </script>";
    }
}

?>
