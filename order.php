<?php


include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");

?>

<?php

if (isset($_GET['c_id'])) {

    $customer_id = $_GET['c_id'];
}

$ip_add = getRealUserIp();

$status = "pending";

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con, $select_cart);

while ($row_cart = mysqli_fetch_array($run_cart)) {

    $pro_id = $row_cart['p_id'];

    $pro_qty = $row_cart['qty'];

    $sub_total = $row_cart['p_price'] * $pro_qty;

    $insert_customer_order = "insert into customer_orders (customer_id,product_id,due_amount,qty,order_date,order_status) values ('$customer_id','$pro_id','$sub_total','$pro_qty',NOW(),'$status')";

    $run_customer_order = mysqli_query($con, $insert_customer_order);

    $delete_cart = "delete from cart where ip_add='$ip_add'";

    $run_delete = mysqli_query($con, $delete_cart);

    echo "<script>alert('Your order has been submitted,Thanks ')</script>";

    echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
}

?>
