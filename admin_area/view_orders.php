<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


?>

    <div class="row">
        <!-- 1 row Starts -->

        <div class="col-lg-12">
            <!-- col-lg-12 Starts -->

            <ol class="breadcrumb">
                <!-- breadcrumb Starts  --->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / View Orders

                </li>

            </ol><!-- breadcrumb Ends  --->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->


    <div class="row">
        <!-- 2 row Starts -->

        <div class="col-lg-12">
            <!-- col-lg-12 Starts -->

            <div class="panel panel-default">
                <!-- panel panel-default Starts -->

                <div class="panel-heading">
                    <!-- panel-heading Starts -->

                    <h3 class="panel-title">
                        <!-- panel-title Starts -->

                        <i class="fa fa-money fa-fw"></i> View Orders

                    </h3><!-- panel-title Ends -->

                </div><!-- panel-heading Ends -->

                <div class="panel-body">
                    <!-- panel-body Starts -->

                    <div class="table-responsive">
                        <!-- table-responsive Starts -->

                        <table class="table table-bordered table-hover table-striped">
                            <!-- table table-bordered table-hover table-striped Starts -->

                            <thead>
                                <!-- thead Starts -->

                                <tr>

                                    <th>Order No:</th>
                                    <th>Customer Email:</th>
                                    <th>Product Title:</th>
                                    <th>Product Qty:</th>
                                    <th>Order Date:</th>
                                    <th>Total Amount:</th>
                                    <th>Order Status:</th>
                                    <th>Order Ship:</th>
                                    <th>Ship Order:</th>
                                    <th>Delete Order:</th>


                                </tr>

                            </thead><!-- thead Ends -->


                            <tbody>
                                <!-- tbody Starts -->

                                <?php

                                $i = 0;

                                $get_orders = "select * from customer_orders order by order_ship asc, order_status asc";

                                $run_orders = mysqli_query($con, $get_orders);

                                while ($row_orders = mysqli_fetch_array($run_orders)) {

                                    $order_id = $row_orders['order_id'];

                                    $c_id = $row_orders['customer_id'];

                                    $product_id = $row_orders['product_id'];

                                    $amount = $row_orders['due_amount'];

                                    $qty = $row_orders['qty'];

                                    $order_date = $row_orders['order_date'];

                                    $order_status = $row_orders['order_status'];

                                    $order_ship = $row_orders['order_ship'];

                                    $get_products = "select * from products where product_id='$product_id'";

                                    $run_products = mysqli_query($con, $get_products);

                                    $row_products = mysqli_fetch_array($run_products);

                                    $product_title = $row_products['product_title'];

                                    $i++;

                                ?>

                                    <tr>

                                        <td><?php echo $i; ?></td>

                                        <td>
                                            <?php

                                            $get_customer = "select * from customers where customer_id='$c_id'";

                                            $run_customer = mysqli_query($con, $get_customer);

                                            $row_customer = mysqli_fetch_array($run_customer);

                                            $customer_email = $row_customer['customer_email'];

                                            echo $customer_email;

                                            ?>
                                        </td>

                                        <td><?php echo $product_title; ?></td>

                                        <td><?php echo $qty; ?></td>

                                        <td><?php echo $order_date; ?></td>

                                        <td>$<?php echo $amount; ?></td>

                                        <td>
                                            <?php

                                            if ($order_status == 'pending') {

                                                echo $order_status = 'pending';
                                            } else {

                                                echo $order_status = 'Complete';
                                            }


                                            ?>
                                        </td>

                                        <td><?php echo $order_ship; ?></td>

                                        <td>
                                            <?php if($order_ship=="no") { ?>
                                            <a href="index.php?order_ship=<?php echo $order_id; ?>">
                                            <i class="fa fa-truck"></i> Ship
                                            </a>

                                            <?php } else {?>
                                                <i class="fa fa-shipping-fast"></i> <span style="color: #b2bec3;">Shipped</span> 
                                            <?php }?>
                                        </td>

                                        <td>

                                            <a href="index.php?order_delete=<?php echo $order_id; ?>">

                                                <i class="fa fa-trash-o"></i> Delete

                                            </a>

                                        </td>



                                    </tr>

                                <?php } ?>

                            </tbody><!-- tbody Ends -->

                        </table><!-- table table-bordered table-hover table-striped Ends -->

                    </div><!-- table-responsive Ends -->

                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->


<?php } ?>