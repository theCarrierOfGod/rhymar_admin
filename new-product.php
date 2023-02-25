<?php
require_once('./header.php');


$success = '';
$error = '';


if(isset($_GET['success'])) {
    $success = $_GET['success'];
}

if(isset($_GET['error'])) {
    $error = $_GET['error'];
}

?>

<main class="content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="btn-toolbar dropdown">
            <a href="/newsletter.php" class="btn btn-outline-primary btn-sm mr-2 " data-toggle="modal" data-target="#modal-default">
                <span class="fa fa-bullhorn mr-2"></span>News Update
            </a>
        </div>
        <div class="btn-group">
            <a>
                <button type="button" style="border-radius:10px; margin-right:3px" class="btn btn-sm btn-outline-primary">
                    <i class="fa fa-cog"></i>
                </button>
            </a>
            <form action="logout.php" method="post">
                <input type="hidden" name="_token" value="8vPngdkB7I12T7c8LzMJXA11Tk1fCjyoIWt3zQYn">
                <button type="submit" class="btn btn-sm btn-outline-pinterest"><i class="fa fa-sign-out"></i> </button>
            </form>
        </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-12 col-xl-9 mb-4">
            <div class="row">
                <div class="col-12 ">
                    <div class="col-12 px-0">
                        <div class="card border-light shadow-sm">
                            <div class="card-header" style="text-transform: uppercase; font-family: monospace">
                                <strong>
                                    Add a New Product
                                </strong>
                            </div>
                            <div class="card-body">
                                <div class="d-block">
                                    <?php
                                        if(isset($_GET['success'])) {
                                            ?>
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <strong>
                                                        <?php echo $success; ?>
                                                    </strong>
                                                </div>
                                            <?php
                                        }
                                        if(isset($_GET['error'])) {
                                            ?>
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <strong>
                                                        <?php echo $error; ?>
                                                    </strong>
                                                </div>
                                            <?php
                                        }
                                    ?>
                                    <form action="processes.php" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group mb-3 col-lg-6">
                                                <label for="name">
                                                    Name
                                                </label>
                                                <input type="text" name="name" id="name" class="form-control mt-1" placeholder="Name" aria-describedby="helpId" required>
                                            </div>
                                            <div class="form-group mb-3 col-lg-6">
                                                <label for="quantity">Quantity</label>
                                                <input type="text" name="quantity" id="quantity" class="form-control mt-1" placeholder="Quantity" aria-describedby="helpId" required>
                                            </div>
                                            <div class="form-group mb-3 col-lg-6">
                                                <label for="real_price">
                                                    Real price
                                                </label>
                                                <input type="text" name="real_price" id="real_price" class="form-control mt-1" placeholder="Real price" required>
                                            </div>
                                            <div class="form-group mb-3 col-lg-6">
                                                <label for="dummy_price">
                                                    Dummy price
                                                </label>
                                                <input type="text" name="dummy_price" id="dummy_price" class="form-control mt-1" placeholder="Dummy price" required>
                                            </div>
                                            <div class="form-group mb-3 col-lg-6">
                                                <label for="category">
                                                    Category
                                                </label>
                                                <select name="category" id="category" class="form-control mt-1" placeholder="Category" required>
                                                    <option value="">-- category --</option>
                                                    <?php
                                                        $query = mysqli_query($conn, "SELECT * FROM category WHERE deleted=0");
                                                        while($row = mysqli_fetch_assoc($query)) {
                                                            ?>
                                                                <option value="<?php echo $row['title']; ?>">
                                                                    <?php echo $row['description']; ?>
                                                                </option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group mb-3 col-lg-6">
                                                <label for="brand">
                                                    Brand
                                                </label>
                                                <input type="text" name="brand" id="brand" class="form-control mt-1" placeholder="Brand">
                                            </div>
                                            <div class="form-group mb-3 col-lg-6">
                                                <label for="color">
                                                    Color
                                                </label>
                                                <input type="text" name="color" id="color" class="form-control mt-1" placeholder="Color">
                                            </div>
                                            <div class="form-group mb-3 col-lg-6">
                                                <label for="featured">
                                                    Featured
                                                </label>
                                                <input type="checkbox" name="featured" id="featured" class="mt-1" placeholder="featured">
                                                <input type="file" accept="image/*" name="image" id="image" class="form-control mt-1" placeholder="Add Product Image" required>
                                            </div>
                                            <div class="form-group mb-3 col-lg-12">
                                                <label for="description">
                                                    Description
                                                </label>
                                                <textarea name="description" class="form-control mt-1" id="description"></textarea>
                                            </div>
                                            
                                            <br /> <br />
                                            <button type="submit" name="add_product" class="btn btn-success">
                                                Add Product
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require_once('./footer.php');
    ?>