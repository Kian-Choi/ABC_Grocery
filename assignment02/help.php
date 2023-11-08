<?php require_once("./database/connect.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Shing Kwan Chow & Chi Kin Choi">
    <title>ABC Grocery Help</title>

    <style>
        <?php include 'styles/general-style.css';
        include 'styles/header-footer.css'; ?>
    </style>
</head>

<body>

    <?php include("./pageLayout/header.php"); ?>

    <h2>Product & Purchase</h2>
    <h3>1. Can I cancel my order after it is placed?</h3>

    <p>
        You can cancel your order in “My Orders” within 15 minutes after placing.</p>

    <h3> 2. Can I modify the order and delivery/pickup information after placing the order?</h3>

    Unfortunately, no changes will be allowed once the payment is completed.
    <h3> 3. Which products can be delivered/picked up?</h3>

    <p>All categories, including produce, meat, seafood, dairy & frozen, bakery, kitchen
        snacks, food essentials, beauty and household.</p>

    <h3>4. Are the products sold online the same as the products sold in store?</h3>

    <p>Yes, the products we sell online are the same as the products we sell in store. We are working towards
        adding more online exclusive products. Please subscribe to our newsletter for the latest updates.</p>
    <h3>5. Where can I check the expiration date on products?</h3>

    <p>Normally, you may find the expiration dates on the products. Since we work with various brands, some
        brands only label their production dates while some only label their expiration dates. However, when it
        comes to the dates, the format may vary. Please refer to the package labels for clarification or contact
        our customer service.</p>

    <h3>6. Do online promotions apply in store, or vice versa?</h3>

    <p>Due to logistical constraints, online promotions are not available in store and vice versa. However, we
        have been trying our best to offer customers with various promotions. Please subscribe to our newsletter
        for the latest updates.</p>

    <?php include("./pageLayout/footer.php"); ?>
</body>

</html>