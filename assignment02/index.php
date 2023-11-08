<?php require_once("./database/connect.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Shing Kwan Chow & Chi Kin Choi">
    <title>ABC Grocery</title>

    <style>
        <?php include 'styles/general-style.css';
        include 'styles/header-footer.css';
        include 'styles/index.css'; ?>
    </style>

</head>

<body>

    <?php include("./pageLayout/header.php"); ?>


    <div class="homepage">
        <a href="./shop.php"><img class="home-img" src="./images/home.jpg" alt="Home page"></a>
    </div>

    <?php include("./pageLayout/footer.php"); ?>
</body>

</html>