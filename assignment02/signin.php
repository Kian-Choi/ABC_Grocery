<?php require_once("./database/connect.php"); ?>
<!-- This php section is used to check the user's input of username and password
and determine if he or she can login successfully -->
<?php

if (isset($_POST['submit'])) {
    $username = $_POST['signName'];
    $password = $_POST['signPass'];

    // extract relevant customer info from the database based on user's inputs
    $sql = "SELECT * FROM customer WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($conn, $sql);

    $customer_info = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if (isset($customer_info['id'])) {
        $_SESSION['customer_ID'] = $customer_info['id'];
    }

    if (is_array($customer_info)) {
        $_SESSION['username'] = $customer_info['username'];
        $_SESSION['password'] = $customer_info['password'];

        header('Location: ./index.php');
?>
        <script>
            alert("Login Succeeded!");
        </script>
<?php

    } else {
        echo '<script type = "text/javascript">';
        echo 'alert("Invalid Username or Passwords")';      // alert if username or password are not correct
        echo '</script>';
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Shing Kwan Chow & Chi Kin Choi">

    <title>Sign In Page</title>

    <style>
        <?php include 'styles/general-style.css';
        include 'styles/header-footer.css';
        include 'styles/signin-registration.css'; ?>
    </style>
</head>

<body>
    <?php include("./pageLayout/header.php"); ?>

    <!-- a login form for customer to login -->

    <div class="signinContainer">
        <h2>Sign In</h2>
        <form action="signin.php" method="post">
            <table class="signinTable">
                <tr>
                    <td class="textfield">
                        <label for="signName">User Name:</label>
                    </td>
                    <td>
                        <input type="text" name="signName" id="signName" placeholder="User name">
                    </td>
                </tr>
                <tr>
                    <td class="textfield">
                        <label for="signPass">Password:</label>
                    </td>
                    <td>
                        <input type="password" name="signPass" id="signPass" placeholder="Password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" id="signin" name="submit">Sign-In</button>
                    </td>
                </tr>
            </table>
        </form>
        <div class="register">
            <!-- a link to registration page -->
            <a class="registerLink" href="./registration.php">New Customer? Register Here!</a>
        </div>

    </div>

    <?php include("./pageLayout/footer.php"); ?>
</body>

</html>