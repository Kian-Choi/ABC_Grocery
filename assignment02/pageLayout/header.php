<header>
    <?php

    if (isset($_SESSION['username'])) {
        echo '<div class="welcome-msg"> Welcome ' . $_SESSION['username'] . '!</div>';
    } else {
        echo '<div class="welcome-msg"> Welcome Guest</div>';
    }

    ?>


    <!-- navigation bar -->
    <div class="navbar">
        <img src="./images/company_logo.jpg" class="company_logo" alt="company_logo">
        <nav>
            <div>

                <a href="./index.php">Home</a>
                <a href="./shop.php">Shop</a>
                <?php if (!isset($_SESSION['username'])) { ?>
                    <a href="./signin.php">Sign in</a>
                <?php } ?>
                <a href="./about_us.php">About Us</a>

                <!-- hide logout option, shopping cart and My Order if customer is not logged in -->
                <?php if (isset($_SESSION['username'])) { ?>
                    <a href="./my_orders.php">My Orders</a>
                    <a class="logout" href="/assignment02/logout.php">Log out</a>
                    <a class="shop-cart" href="./shoppingcart.php">
                        <img src="./images/shopping_cart.png" class="cart-Pic" alt="Shopping Cart">
                    </a>
                <?php } ?>

            </div>
        </nav>


    </div>
</header>