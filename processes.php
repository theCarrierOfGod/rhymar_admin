<?php

require("./conn.php");

if (isset($_POST['add_product'])) {
    
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $real_price = $_POST['real_price'];
    $dummy_price = $_POST['dummy_price'];    
    $category = $_POST['category'];
    $brand = $_POST['brand'];    
    $color = $_POST['color'];
    if(isset($_POST['featured'])) {
        $featured = 1; 
    } else {
        $featured = 0; 
    }   
    $description = $_POST['description'];
    $product_id = time().rand(10000, 99999);

    $target_dir = "uploads/";
    $target_file = $target_dir . rand(1000, 9999) . time() . basename($_FILES["image"]["name"]);
    $fileLocation = "http://www.admin.rhymarworld.org.ng/" . $target_file ;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        header("Location: new-product.php?error=File is not an image");
        exit();
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        header("Location: new-product.php?error=File name exists");
        exit();
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        header("Location: new-product.php?error=File size too large");
        exit();
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        header("Location: new-product.php?error=File type not supported");
        exit();
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        header("Location: new-product.php?error=Sorry, your file was not uploaded.");
        exit();
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
            $query = "INSERT INTO `products`(`product_id`, `name`, `dummy_price`, `real_price`, `description`, `colors`, `quantity`, `ratings`, `specifications`, `image`, `featured`, `brand`, `category`) 
            VALUES ('$product_id', '$name', '$dummy_price', '$real_price', '$description', '$color', '$quantity', 0, NULL, '$fileLocation', '$featured', '$brand', '$category')";
            if(mysqli_query($conn, $query)) {
                header("Location: new-product.php?success=Product added");
                exit();
            } else {
                header("Location: new-product.php?error=Database error");
                exit();
            }
        } else {
            header("Location: new-product.php?error=Upload error");
            exit();
        }
    }
}

if (isset($_POST['add_category'])) {
    $name = $_POST['name'];
    $desc = $_POST['Description'];

    $target_dir = "uploads/";
    $target_file = $target_dir . rand(1000, 9999) . time() . '.png';
    $fileLocation = "http://www.admin.rhymarworld.org.ng/" . $target_file ;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        header("Location: new-category.php?error=File is not an image");
        exit();
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        header("Location: new-category.php?error=File name exists");
        exit();
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        header("Location: new-category.php?error=File size too large");
        exit();
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        header("Location: new-category.php?error=File type not supported");
        exit();
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        header("Location: new-category.php?error=Sorry, your file was not uploaded.");
        exit();
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            
            $query = "INSERT INTO `category`(`title`, `description`, `image`, `deleted`) 
            VALUES ('$name', '$desc', '$fileLocation', '0')";
            if(mysqli_query($conn, $query)) {
                header("Location: new-category.php?success=Category added");
                exit();
            } else {
                header("Location: new-category.php?error=Database error");
                exit();
            }
        } else {
            header("Location: new-category.php?error=Upload error");
            exit();
        }
    }
}
