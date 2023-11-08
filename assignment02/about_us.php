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
        include 'styles/header-footer.css'; ?>
    </style>
</head>

<body>

    <?php include("./pageLayout/header.php"); ?>


    <div class="content">
        <div class="row">
            <div class="side">
                <img src="./images/abc.png" alt="Company Logo">
            </div>
            <div class="main">
                <h2>Our Commitment</h2>
                <p>Quality products at everyday low prices – that’s the promise we made when we started ABC, and
                    it’s as true today more than 10 years later. We consider it both our mission and our privilege to give
                    Canadians access to the products they need at the prices they can afford, both in stores and online at
                    Abc.ca.
                </p>
            </div>
        </div>
    </div>

    <?php include("./pageLayout/footer.php"); ?>

</body>

</html>