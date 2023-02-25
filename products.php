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
        <div class="col-12 col-xl-10 mb-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="new-product.php">
                                Add New Product 
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                    $query = mysqli_query($conn, "SELECT * FROM products");
                    if(mysqli_num_rows($query) > 0){
                        while($pro = mysqli_fetch_assoc($query)) {
                            $img = $pro['image'];
                            ?>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="card border-light shadow-sm m-1">
                                        <div class="card-body">
                                            <div class="d-block" style="background-image: url('<?php echo $img; ?>'); height: 250px; background-size: cover; background-repeat: no-repeat; background-position: center"></div>
                                        </div>
                                        <div class="card-header" style="text-transform: uppercase; font-family: monospace">
                                            <strong>
                                                <?php echo $pro['name']; ?>
                                            </strong> <br/>
                                            <a href="/edit_product.php?id=<?php echo $pro['product_id']; ?>" style="color: blue">
                                                <i class="fa fa-pencil"></i> Edit
                                            </a>
                                            <a id="<?php echo $pro['product_id']; ?>" style="color: red;">
                                                <i class="fa fa-trash"></i> Delete
                                            </a>
                                            <script>
                                                $(document).ready(function(){
                                                    $("#<?php echo $pro['product_id']; ?>").on("click", function() {
                                                        let text;
                                                        if (confirm("Are you sure you want to delete this product?") == true) {
                                                            window.location.href = "/delete_product.php?id=<?php echo $pro['product_id']; ?>";
                                                        }
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <?php
    require_once('./footer.php');
    ?>