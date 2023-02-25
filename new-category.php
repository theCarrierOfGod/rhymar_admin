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
                                    Add a New Category
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
                                                <input type="text" name="name" id="name" class="form-control mt-1" placeholder="ladies-wear" aria-describedby="helpId" required>
                                            </div>
                                            <div class="form-group mb-3 col-lg-6">
                                                <label for="Description">Description</label>
                                                <input type="text" name="Description" id="Description" class="form-control mt-1" placeholder="Ladies Wear" aria-describedby="helpId" required>
                                            </div>
                                            <div class="form-group mb-3 col-lg-6">
                                                <label for="image">
                                                    Image
                                                </label>
                                                <input type="file" accept="image/*" name="image" id="image" class="form-control mt-1" placeholder="Add Category Image" required>
                                            </div>
                                            <br /> <br />
                                            <button type="submit" name="add_category" class="btn btn-success">
                                                Add Category
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