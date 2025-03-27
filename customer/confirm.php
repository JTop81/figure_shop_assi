<?php

session_start();

if (!isset($_SESSION['customer_email'])) {

    echo "<script>window.open('../checkout.php','_self')</script>";
} else {

    include("includes/db.php");
    include("includes/header.php");
    include("functions/functions.php");
    include("includes/main.php");

    if (isset($_GET['order_id'])) {

        $order_id = $_GET['order_id'];
    }

    if (isset($_GET['amount'])) {

        $amount = $_GET['amount'];
    }

?>



    <div id="content">
        <!-- content Starts -->
        <div class="container">
            <!-- container Starts -->


            <div class="col-md-3">
                <!-- col-md-3 Starts -->

                <?php include("includes/sidebar.php"); ?>

            </div><!-- col-md-3 Ends -->

            <div class="col-md-9">
                <!-- col-md-9 Starts -->

                <div class="box">
                    <!-- box Starts -->

                    <h1 align="center"> Please Confirm Your Payment </h1>
                    <p align="center">Payment Infomation:</p>
                    <p align="center">Paypal: <a href=http://paypal.me/PhucAnh99> paypal.me/Figure_Shop </a></p>  
                    <p align="center">Momo: <a href=http://nhantien.momo.vn/imphucanh> Momo - Figure Shop </a></p>
                    <p align="center">Viettel Pay: <a href=#> Viettel Pay - Figure Shop </a></p>      


                    <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data">
                        <!--- form Starts -->

                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label>Order ID</label>

                            <input type="text" class="form-control" name="order_id" required value="<?php echo  $order_id;?>" readonly>

                        </div><!-- form-group Ends -->


                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label>Amount Sent:</label>

                            <input type="text" class="form-control" name="amount_sent" required value="<?php echo $amount; ?>" readonly>

                        </div><!-- form-group Ends -->

                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label>Select Payment Mode:</label>

                            <select name="payment_mode" class="form-control">
                                <!-- select Starts -->

                                <option>PayPal</option>
                                <option>Momo</option>
                                <option>Viettel Pay</option>
                                <option>Bank</option>
                                <option>Credit Card</option>

                            </select><!-- select Ends -->

                        </div><!-- form-group Ends -->


                        <div class="form-group">
                            <!-- form-group Starts -->

                            <label>Payment Date:</label>

                            <input type="text" class="form-control" name="date" value="<?php echo date("d/m/Y");?>" required>

                        </div><!-- form-group Ends -->

                        <div class="text-center">
                            <!-- text-center Starts -->

                            <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">

                                <i class="fa fa-user-md"></i> Confirm Payment

                            </button>

                        </div><!-- text-center Ends -->

                    </form>
                    <!--- form Ends -->

                    <?php

                    if (isset($_POST['confirm_payment'])) {


                        $order_id = $_POST['order_id'];

                        $amount = $_POST['amount_sent'];

                        $payment_mode = $_POST['payment_mode'];

                        $payment_date = $_POST['date'];

                        $complete = "Complete";

                        $insert_payment = "insert into payments (order_id,amount,payment_mode,payment_date) values ('$order_id','$amount','$payment_mode','$payment_date')";

                        $run_payment = mysqli_query($con, $insert_payment);

                        $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$order_id'";

                        $run_customer_order = mysqli_query($con, $update_customer_order);

                        if ($run_customer_order) {

                            echo "<script>alert('your Payment has been received,order will be completed within 24 hours')</script>";

                            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                        }
                    }


                    ?>


                </div><!-- box Ends -->

            </div><!-- col-md-9 Ends -->

        </div><!-- container Ends -->
    </div><!-- content Ends -->


    <script src="js/jquery.min.js"> </script>

    <script src="js/bootstrap.min.js"></script>

    </body>

    </html>

<?php } ?>