<?php require_once("./database/connect.php"); ?>


<!-- Delete order from database when user hit the Cancel Order button -->
<?php
if (isset($_POST["cancelOrder"])) {
    $cust_ID = $_SESSION['customer_ID'];
    $sql_delete = "DELETE FROM orders WHERE customer_id = '$cust_ID'";
    mysqli_query($conn, $sql_delete);
?>
    <script>
        alert("Order has been cancelled!");
    </script>
<?php
    $_SESSION['orders_info'] = null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Shing Kwan Chow & Chi Kin Choi">
    <style>
        <?php include 'styles/general-style.css';
        include 'styles/header-footer.css';
        include 'styles/order-shoppingcart.css'; ?>
    </style>
    <title>My Orders</title>
</head>

<body>
    <?php include("./pageLayout/header.php"); ?>

    <?php
    $_SESSION['orders_info'] = array();
    $cust_ID = $_SESSION['customer_ID'];
    $sql = "SELECT * FROM orders WHERE customer_id = '$cust_ID'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $_SESSION['orders_info'][] = $row;
    }

    if ($_SESSION['orders_info'] == null) {
        echo "You have not ordered anything.";
    } else {

    ?>
        <form method="POST" class="cancelOrder" action="<?php $_SERVER['PHP_SELF']; ?>">
            <table class="my-orders order_table">
                <caption>My Order Details</caption>
                <tr>
                    <th colspan=2> Product</th>
                    <th> Quantity</th>
                    <th> Item Price</th>
                    <th> Items Subtotal</th>
                </tr>

                <!-- print the order details into a table -->
                <?php
                $total_sum = 0;
                foreach ($_SESSION['orders_info'] as $item) {
                    $each_item_sum = 0;
                    $item_ID = $item['item_id'];
                    $item_quantity = $item['item_quantity'];

                    $sql_prod = "SELECT * FROM product WHERE id = '$item_ID'";
                    $prod_info = mysqli_query($conn, $sql_prod);
                    $row = mysqli_fetch_row($prod_info);

                    $each_item_sum = $row[3] * $item_quantity;
                    $total_sum = $total_sum + $each_item_sum;
                ?>

                    <tr>
                        <td> <?php echo $row[1]; ?></td>
                        <td> <img src="<?php echo $row[2]; ?>" class="orders_img" alt="<?php echo $row[1]; ?>"></td>
                        <td> <?php echo $item_quantity; ?></td>
                        <td> <?php echo "$" . $row[3]; ?></td>
                        <td> <?php echo "$" . $each_item_sum; ?></td>
                    </tr>

                <?php
                }
                ?>
                <tr>
                    <td colspan=4 class="total">Total:</td>
                    <td> <?php echo "$" . $total_sum; ?></td>
                </tr>
                <tr>
                    <td colspan=5>
                        <button type="submit" name="cancelOrder" id="cancelOrder">Cancel Order</button>
                    </td>
            </table>
        </form>
    <?php
    }
    ?>

    <?php include("./pageLayout/footer.php"); ?>
</body>

</html>