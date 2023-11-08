<?php require_once("./database/connect.php"); ?>


<!-- This php section insert the shopping cart items data into the database when customer hit the purchase button-->
<?php
if (isset($_POST["purchase"])) {
    $order_no = time();    // generate unique order number
    $cust_id = (int) $_SESSION['customer_ID'];

    foreach ($_SESSION['itemsToDatabase'] as $k => $value) {
        $sql = "INSERT INTO orders (customer_id, order_id, item_id, item_quantity) 
                    VALUES ('$cust_id', '$order_no', '$k', '$value')";
        mysqli_query($conn, $sql);
    }
?>
    <script>
        alert("Items Purchased!");
    </script>
<?php
    $_SESSION['shopCart_array'] = null;     //empty the shopping cart after purchase
}
?>

<?php
if (isset($_POST["clearCart"])) {
    $_SESSION['shopCart_array'] = null;
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
    <title>Your Shopping Cart</title>
</head>

<body>
    <?php include("./pageLayout/header.php");
    $sum = 0;   //total amount customer should pay
    if (!isset($_SESSION['shopCart_array'])) {
        echo "Your shopping cart is empty";
    } else {
    ?>



        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">

            <table class="shopping_cart order_table">
                <tr>
                    <th colspan=3>My Order Details</th>
                </tr>
                <tr>
                    <td colspan="2"> Product</td>
                    <td> Item Price</td>
                </tr>

                <!-- loop all items in the shopping cart, get the items' data from the database and calculate the sum customer should pay -->
                <?php foreach ($_SESSION['shopCart_array'] as $item) :
                    $sql = "SELECT * FROM product WHERE id='$item'";
                    $result = mysqli_query($conn, $sql);
                    $item_info = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $sum = $sum + ($item_info['prod_price']);
                ?>

                    <!-- print the items -->
                    <tr>
                        <td class="product-image"><img src="<?php echo $item_info['prod_img_link']; ?>" alt="<?php echo $item_info['prod_name']; ?>" class="item-img"></td>
                        <td class="product-name"><?php echo $item_info['prod_name']; ?></td>
                        <td class="product-price">$<?php echo $item_info['prod_price']; ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td class="total" colspan="3">Total: $<?php echo $sum; ?></td>
                </tr>
                <tr>
                    <td colspan="3"><button type="submit" name="purchase" id="purchase">Purchase Now</button></td>
                </tr>
                <tr>
                    <td colspan="3"><button type="submit" name="clearCart" id="clearCart">Clear the Shopping Cart</button></td>
                </tr>
            </table>
        </form>
    <?php
        // create an array for preparing to be inserted into the database
        $_SESSION['itemsToDatabase'] = array_count_values($_SESSION['shopCart_array']);
    } ?>
    <?php include("./pageLayout/footer.php"); ?>
</body>

</html>