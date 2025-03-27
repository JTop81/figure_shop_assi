<?php



if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

<?php

    if (isset($_GET['order_ship'])) {

        $ship_id = $_GET['order_ship'];

        $ship_order = "update customer_orders set order_ship = 'yes' where order_id='$ship_id' and order_status='Complete'";

        $run_delete = mysqli_query($con, $ship_order);

        if ($run_delete == 1) {

            echo "<script>alert('Order Has Been Shipped')</script>";

            echo "<script>window.open('index.php?view_orders','_self')</script>";
        } else {
            echo "<script>alert('Order No Payment')</script>";

            echo "<script>window.open('index.php?view_orders','_self')</script>";
        }
         
    }



?>



<?php }  ?>