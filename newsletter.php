<?php
require_once('./header.php');
?>

<main class="content">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="btn-toolbar dropdown">
            <a href="/newsletter.php" class="btn btn-outline-primary btn-sm mr-2 " data-toggle="modal" data-target="#modal-default">
                <span class="fa fa-bullhorn mr-2"></span>News Update
            </a>
        </div>
        <div class="btn-group"><a href="UserProfile.php"> <button type="button" style="border-radius:10px; margin-right:3px" class="btn btn-sm btn-outline-primary"><i class="fa fa-cog"> </i> </button></a>
            <form action="logout.php" method="post">
                <input type="hidden" name="_token" value="8vPngdkB7I12T7c8LzMJXA11Tk1fCjyoIWt3zQYn">
                <button type="submit" class="btn btn-sm btn-outline-pinterest"><i class="fa fa-sign-out"></i> </button>
            </form>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-light shadow-sm">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon icon-shape icon-md icon-shape-blue rounded mr-4 mr-sm-0"><span class="fa fa-money"></span></div>
                            <div class="d-sm-none">
                                <h2 class="h5">Products</h2>
                                <h3 class="mb-1">
                                    <?php echo ($no_of_products); ?>
                                </h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h5">Products</h2>
                                <h3 class="mb-1">
                                    <?php echo ($no_of_products); ?>
                                </h3>
                            </div>
                            <div class="text-right">
                                <a href="Wallet.php" class="btn btn-outline-dark btn-sm mr-3 text-right">Fund Wallet</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-light shadow-sm">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon icon-shape icon-md icon-shape-secondary rounded mr-4"><span class="fa fa-usd"></span></div>
                            <div class="d-sm-none">
                                <h2 class="h5">Commission</h2>
                                <h3 class="mb-1">₦ <?php echo $total = $online['downlines'] * 100; ?></h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h5">Commission</h2>
                                <h3 class="mb-1">₦ <?php echo $total = $online['downlines'] * 100; ?></h3>
                            </div>
                            <div class="text-right">
                                <a href="WithdrawRefferal.php" class="btn btn-outline-dark btn-sm mr-3 text-right">Cashout</a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-light shadow-sm">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon icon-shape icon-md icon-shape-blue rounded mr-4 mr-sm-0"><span class="fa fa-users"></span></div>
                            <div class="d-sm-none">
                                <h2 class="h5">Referral's</h2>
                                <h3 class="mb-1">
                                    <?php
                                    $sponsor_usern = $online['username'];

                                    $sql = "SELECT * FROM `customers` WHERE sponsor='$sponsor_usern'";
                                    $result = $con->query($sql);

                                    if ($result = mysqli_query($con, $sql)) {
                                        $rowcount = mysqli_num_rows($result);
                                        // Display result
                                        printf("Total refs:  %d\n", $rowcount);
                                    } else {
                                        echo "0";
                                    }
                                    ?>
                                </h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h5">Referral's</h2>
                                <h3 class="mb-1"> <?php
                                                    $insss = "SELECT * FROM `customers` WHERE email='" . $email . "'";
                                                    $quesss = mysqli_query($conn, $insss) or die(mysqli_error($conn));
                                                    $row = mysqli_fetch_assoc($quesss);
                                                    $sponsor_usern = $row['username'];

                                                    $sql = "SELECT * FROM `customers` WHERE sponsor='$sponsor_usern'";
                                                    $result = $con->query($sql);

                                                    if ($result = mysqli_query($con, $sql)) {
                                                        // output data of each row
                                                        // Return the number of rows in result set
                                                        $rowcount = mysqli_num_rows($result);

                                                        // Display result
                                                        printf("Total refs:  %d\n", $rowcount);
                                                    } else {
                                                        echo "0";
                                                    }
                                                    ?> </h3>
                            </div>
                            <div class="text-right" style="height:30px">


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-xl-6 mb-4">
            <div class="row">
                <div class="col-12 ">
                    <div class="col-12 px-0">
                        <div class="card border-light shadow-sm">
                            <div class="card-body">
                                <div class="d-block">
                                    <div class="d-flex align-items-center ">
                                        <div class="icon icon-shape icon-sm icon-shape-blue rounded mr-3"><span class="fa fa-phone-square"></span></div>
                                        <div class="d-block"><label class="mb-0">MTN, Airtel, Glo, 9Mobile</label>
                                            <h4 class="mb-0">Airtime</h4>
                                            <br>
                                            <a href="Airtime.php" class="btn btn-outline-dark btn-sm mr-3 text-right">Buy Airtime</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-6 mb-4">
            <div class="row">
                <div class="col-12 ">
                    <div class="col-12 px-0">
                        <div class="card border-light shadow-sm">
                            <div class="card-body">
                                <div class="d-block">
                                    <div class="d-flex align-items-center ">
                                        <div class="icon icon-shape icon-sm icon-shape-warning rounded mr-3"><span class="fa fa-wifi"></span></div>
                                        <div class="d-block"><label class="mb-0">MTN, Airtel, Glo, 9Mobile</label>
                                            <h4 class="mb-0">Internet Data</h4>
                                            <br>
                                            <a href="BuyData.php" class="btn btn-outline-dark btn-sm mr-3 text-right">Buy Data</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-6 mb-4">
            <div class="row">
                <div class="col-12 ">
                    <div class="col-12 px-0">
                        <div class="card border-light shadow-sm">
                            <div class="card-body">
                                <div class="d-block">
                                    <div class="d-flex align-items-center ">
                                        <div class="icon icon-shape icon-sm icon-shape-warning rounded mr-3"><span class="fa fa-tv"></span></div>
                                        <div class="d-block"><label class="mb-0">DSTV, GOtv, Startimes</label>
                                            <h4 class="mb-0">Decoder Subscription</h4>
                                            <br>
                                            <a href="DecoderSubscription.php" class="btn btn-outline-dark btn-sm mr-3 text-right">Recharge</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-6 mb-4">
            <div class="row">
                <div class="col-12 ">
                    <div class="col-12 px-0">
                        <div class="card border-light shadow-sm">
                            <div class="card-body">
                                <div class="d-block">
                                    <div class="d-flex align-items-center ">
                                        <div class="icon icon-shape icon-sm icon-shape-blue rounded mr-3"><span class="fa fa-bolt"></span></div>
                                        <div class="d-block"><label class="mb-0">PHCN, PHED, IKEDC, ETC.</label>
                                            <h4 class="mb-0">Electricity Bill</h4>
                                            <br>
                                            <a href="ElectricBillPayment.php" class="btn btn-outline-dark btn-sm mr-3 text-right">Recharge</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-6 mb-4">
            <div class="row">
                <div class="col-12 ">
                    <div class="col-12 px-0">
                        <div class="card border-light shadow-sm">
                            <div class="card-body">
                                <div class="d-block">
                                    <div class="d-flex align-items-center ">
                                        <div class="icon icon-shape icon-sm icon-shape-blue rounded mr-3"><span class="fa fa-university"></span></div>
                                        <div class="d-block"><label class="mb-0">WAEC, NECO, etc.</label>
                                            <h4 class="mb-0">Examination Pins</h4>
                                            <br>
                                            <a href="ResultPins.php" class="btn btn-outline-dark btn-sm mr-3 text-right">Recharge</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-6 mb-4">
            <div class="row">
                <div class="col-12 ">
                    <div class="col-12 px-0">
                        <div class="card border-light shadow-sm">
                            <div class="card-body">
                                <div class="d-block">
                                    <div class="d-flex align-items-center ">
                                        <div class="icon icon-shape icon-sm icon-shape-warning rounded mr-3"><span class="fa fa-money-check"></span></div>
                                        <div class="d-block"><label class="mb-0">MTN, Airtel, Glo, 9Mobile.</label>
                                            <h4 class="mb-0">Airtime To Cash</h4>
                                            <br>
                                            <a href="AitimeToWallet.php" class="btn btn-outline-dark btn-sm mr-3 text-right">Convert Airtime</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-light shadow-sm mb-5">
        <div class="card-body">
            <div class="row text-gray">
                <div class="col-12 pb-4">

                </div>
                <div class="col-12 col-lg-6 col-xl-4">
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header border-light py-5 px-4">
                            <div class="d-flex mb-3"><span class="h5 mb-0"></span> <span class="price display-2 mb-0" data-annual="0" data-monthly="0">Free</span> <span class="h6 font-weight-normal align-self-end"></span></div>
                            <h4 class="mb-3 text-black">Basic</h4>
                            <p class="font-weight-normal mb-0">If you want cheap data.</p>
                        </div>
                        <div class="card-body pt-5 px-4">
                            <div class="d-flex mb-1">
                                <div class="icon-md icon-gray lh-180 mr-3"><i class="fa fa-check"></i></div>
                                <p>10% Referral Commission</p>
                            </div>
                            <div class="d-flex mb-1">
                                <div class="icon-md icon-gray lh-180 mr-3"><i class="fa fa-check"></i></div>
                                <p>Cheap MTN data plans</p>
                            </div>
                            <div class="d-flex mb-1">
                                <div class="icon-md icon-gray lh-180 mr-3"><i class="fa fa-check"></i></div>
                                <p>Cheap Airtel data plans </p>
                            </div>
                            <div class="d-flex mb-1">
                                <div class="icon-md icon-gray lh-180 mr-3"><i class="fa fa-check"></i></div>
                                <p>Cheap GLO data plans</p>
                            </div>
                            <div class="d-flex mb-1">
                                <div class="icon-md icon-gray lh-180 mr-3"><i class="fa fa-check"></i></div>
                                <p>Cheap 9Mobile data plans</p>
                            </div>
                        </div>
                        <div class="card-footer px-4 pb-4">
                            <button class="btn btn-block btn-outline-primary">Active</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-4">
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header border-light py-5 px-4">
                            <div class="d-flex mb-3 text-primary"><span class="h5 mb-0">₦</span> <span class="price display-2 text-primary mb-0" id="priceStandard">1,500</span> <span class="h6 font-weight-normal align-self-end"></span></div>
                            <h4 class="mb-3 text-black">Silver</h4>
                            <p class="font-weight-normal mb-0">You get big data discounts</p>
                        </div>
                        <div class="card-body pt-5 px-4">
                            <div class="d-flex mb-1">
                                <div class="icon-md icon-gray lh-180 mr-3"><i class="fa fa-check"></i></div>
                                <p>30% Referral Commission</p>
                            </div>
                            <div class="d-flex mb-1">
                                <div class="icon-md icon-gray lh-180 mr-3"><i class="fa fa-check"></i></div>
                                <p>Cheaper MTN data plans</p>
                            </div>
                            <div class="d-flex mb-1">
                                <div class="icon-md icon-gray lh-180 mr-3"><i class="fa fa-check"></i></div>
                                <p>Cheaper Airtel data plans </p>
                            </div>
                            <div class="d-flex mb-1">
                                <div class="icon-md icon-gray lh-180 mr-3"><i class="fa fa-check"></i></div>
                                <p>Cheaper GLO data plans</p>
                            </div>
                            <div class="d-flex mb-1">
                                <div class="icon-md icon-gray lh-180 mr-3"><i class="fa fa-check"></i></div>
                                <p>Cheaper 9Mobile data plans</p>
                            </div>

                        </div>
                        <div class="card-footer px-4 pb-4">
                            <button class="btn btn-block btn-outline-primary" data-toggle="modal" data-target="#StandardUpgrade" type="submit">Upgrade</button>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-4">
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header border-light py-5 px-4">
                            <div class="d-flex mb-3"><span class="h5 mb-0">₦</span> <span class="price display-2 text-secondary mb-0" id="pricePremium">3,000</span> <span class="h6 font-weight-normal align-self-end"></span></div>
                            <h4 class="mb-3 text-black">Gold</h4>
                            <p class="font-weight-normal mb-0">Best Discount For Resellers.</p>
                        </div>
                        <div class="card-body pt-5 px-4">
                            <div class="d-flex mb-1">
                                <div class="icon-md icon-gray lh-180 mr-3"><i class="fa fa-check"></i></div>
                                <p>50% Referral Commission</p>
                            </div>
                            <div class="d-flex mb-1">
                                <div class="icon-md icon-gray lh-180 mr-3"><i class="fa fa-check"></i></div>
                                <p>Cheapest MTN data plans</p>
                            </div>
                            <div class="d-flex mb-1">
                                <div class="icon-md icon-gray lh-180 mr-3"><i class="fa fa-check"></i></div>
                                <p>Cheapest Airtel data plans </p>
                            </div>
                            <div class="d-flex mb-1">
                                <div class="icon-md icon-gray lh-180 mr-3"><i class="fa fa-check"></i></div>
                                <p>Cheapest GLO data plans</p>
                            </div>
                            <div class="d-flex mb-1">
                                <div class="icon-md icon-gray lh-180 mr-3"><i class="fa fa-check"></i></div>
                                <p>Cheapest 9Mobile data plans</p>
                            </div>

                        </div>
                        <div class="card-footer px-4">


                            <button class="btn btn-block btn-outline-primary" data-toggle="modal" data-target="#MasterUpgrade" type="submit">Upgrade</button>
                            </button>



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