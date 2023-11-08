<?php require_once("./database/connect.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Shing Kwan Chow & Chi Kin Choi">
    <title>Shopping Page</title>

    <style>
        <?php include 'styles/general-style.css';
        include 'styles/header-footer.css';
        include 'styles/shop.css'; ?>
    </style>

</head>

<body>

    <?php include("./pageLayout/header.php"); ?>


    <?php
    // extract all product information from the database
    $sql = 'SELECT * FROM product ';
    $result = mysqli_query($conn, $sql);
    $product_info = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $_SESSION["output"] = $product_info;

    if (!isset($_POST["filter"])) {
    }
    // rearrange the product array to cater the filter function if customer selected a filter
    else {
        $_SESSION["output"] = $product_info;    // reset the output everytime the selection boxes are clicked

        if (isset($_POST["filter"])) {
            $choice1 = $_POST["filter"];
            if ($choice1 != "all") {
                $_SESSION["output"] = array_filter($_SESSION["output"], function ($record) {
                    if ($record['type'] == $GLOBALS['choice1'])
                        return $record;
                });
            } else {
                $_SESSION["output"] = $product_info;
            }
        }
    }


    // rearrange the product array if customer input a text to search
    if (isset($_POST["searchButton"])) {

        $str = "/" . $_POST["searchText"] . "/";

        if ($_POST["searchText"] == null) { ?>
            <script>
                alert("Please input something to search.");
            </script>
    <?php
        } else {
            $_SESSION["output"] = array_filter($_SESSION["output"], function ($a) use ($str) {
                return preg_grep($str, $a);
            });
        }
    }

    // Clear all search and filter
    if (isset($_POST["clearSearchButton"])) {
        $_SESSION["output"] = $product_info;
    }
    ?>

    <?php
    // add the product items into the shopping cart array
    if (isset($_POST["addItem"])) {
        if (!isset($_SESSION['shopCart_array'])) {
            $_SESSION['shopCart_array'] = array();
        }
        if (isset($_SESSION['username'])) {
            array_push($_SESSION['shopCart_array'], $_POST["productID"]);
    ?>
            <script>
                alert("Item has been added to the Shopping Cart!");
            </script>
        <?php } else { ?>
            <script>
                alert("Please login to shop.");
            </script>
    <?php
        }
    }

    ?>

    <!-- // filter box by category-->

    <div class="search-container">

        <div>
            <label for="filter">Filter by Category: </label>
        </div>
        <div>
            <form method="POST" class="filterBox" action="<?php $_SERVER['PHP_SELF']; ?>">

                <select onChange="this.form.submit()" name="filter" id="filter">
                    <option value="">Select One …</option>
                    <option value="all">All</option>
                    <?php
                    $sql = 'SELECT DISTINCT type FROM product ';
                    $result = mysqli_query($conn, $sql);
                    $type_info = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    foreach ($type_info as $item) :
                    ?>
                        <option value="<?php echo $item['type']; ?>">
                            <?php echo $item['type']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>


        <!-- // search box for customer to search product name-->

        <div>
            <label for="searchText">Search by Product Name: </label>
        </div>
        <div>
            <form method="POST" class="searchBoxForm" action="<?php $_SERVER['PHP_SELF']; ?>">

                <input type="text" class="searchBox" name="searchText" id="searchText" placeholder="Apple / Coffee / Knife">
                <button type="submit" class="searchButton" name="searchButton">🔍︎</button>
            </form>

        </div>


        <!-- // button to reset the search-->
        <div class="two-column-grid">
            <form method="POST" class="clearSearch" action="<?php $_SERVER['PHP_SELF']; ?>">

                <button type="submit" class="clearSearchButton" name="clearSearchButton">Clear all search</button>
            </form>
        </div>
    </div>
    <!-- // print the product items -->
    <div class="product-container">
        <?php foreach ($_SESSION["output"] as $item) : ?>
            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="product-item">
                    <div class="product-image">
                        <img src="<?php echo $item['prod_img_link']; ?>" alt="<?php echo $item_info['prod_name']; ?>">
                    </div>
                    <div class="product-name"><?php echo $item['prod_name']; ?></div>
                    <div class="product-price">$<?php echo $item['prod_price']; ?></div>
                    <div>
                        <input type="hidden" name="productID" value="<?php echo $item['id']; ?>">
                        <input type="submit" value="Add to Cart" class="addItem" name="addItem">
                    </div>
                </div>
            </form>
        <?php endforeach; ?>
    </div>

    <?php include("./pageLayout/footer.php"); ?>
</body>

</html>