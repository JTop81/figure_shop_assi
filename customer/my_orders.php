<center>
    <!-- center Starts -->

    <h1>My Orders</h1>

    <p class="lead"> Your orders.</p>

    <p class="text-muted">
        If you have any questions, please <a href="../contact.php"> contact us,</a> working 24/7.
    </p>
    <p class="text-muted">
        Please enter your Order ID in the message when transferring so we can check.
    </p>
    <p class="text-muted">
        Your order will be shipped within 48 hours after paying.
    </p>


</center><!-- center Ends -->

<hr>

<div class="table-responsive">
    <!-- table-responsive Starts -->

    <table class="table table-bordered table-hover">
        <!-- table table-bordered table-hover Starts -->

        <thead>
            <!-- thead Starts -->

            <tr>

                <th>No</th>
                <th>Product Name</th>
                <th>Due Amount</th>
                <th>Quantity</th>
                <th>Order Date</th>
                <th>Payment</th>
                <th>Shipping</th>
                <th>Payment</th>

            </tr>

        </thead><!-- thead Ends -->

        <tbody>
            <!--- tbody Starts --->

            <?php

            $customer_session = $_SESSION['customer_email'];

            $get_customer = "select * from customers where customer_email='$customer_session'";

            $run_customer = mysqli_query($con, $get_customer);

            $row_customer = mysqli_fetch_array($run_customer);

            $customer_id = $row_customer['customer_id'];

            $get_orders = "select * from customer_orders where customer_id='$customer_id' order by order_status desc";

            $run_orders = mysqli_query($con, $get_orders);

            $i = 0;

            while ($row_orders = mysqli_fetch_array($run_orders)) {

                $order_id = $row_orders['order_id'];

                $due_amount = $row_orders['due_amount'];

                $product_id = $row_orders['product_id'];

                $get_product = "select * from products where product_id='$product_id'";

                $run_product = mysqli_query($con, $get_product);

                $row_product = mysqli_fetch_array($run_product);

                $product_name = $row_product['product_title'];

                $qty = $row_orders['qty'];

                $order_date = substr($row_orders['order_date'], 0, 11);

                $order_status = $row_orders['order_status'];

                $order_ship = $row_orders['order_ship'];

                $i++;

                if ($order_status == 'pending') {

                    $order_status = "Unpaid";
                } else {
                    $order_status = "Paid";
                }

            ?>

                <tr>
                    <!-- tr Starts -->

                    <th><?php echo $i; ?></th>

                    <td>$<?php echo $product_name; ?></td>

                    <td>$<?php echo $due_amount; ?></td>

                    <td><?php echo $qty; ?></td>

                    <td><?php echo $order_date; ?></td>

                    <td><?php echo $order_status; ?></td>

                    <td><?php echo $order_ship; ?></td>

                    <?php if($order_status=="Unpaid") {?>
                    <td>
                        <a href="confirm.php?order_id=<?php echo $order_id; ?>&amount=<?php echo $due_amount; ?>" target="blank"> $Pay </a>
                    </td>
                    <?php } else {?>
                        <td style="color: #b2bec3;">Pay</td>
                    <?php }?>
                </tr><!-- tr Ends -->

            <?php } ?>

        </tbody>
        <!--- tbody Ends --->


    </table><!-- table table-bordered table-hover Ends -->

</div><!-- table-responsive Ends -->