<?php require_once("./database/connect.php"); ?>

<?php
$sql = "";
// insert customer registration info into the databse
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['login'];
    $password = $_POST['pass'];

    $sql = "INSERT INTO customer (email, username, password) 
        VALUES ('$email', '$username', '$password')";

    mysqli_query($conn, $sql);
?>
    <script>
        alert("Registration Completed!!! Please try to login.");
    </script>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Shing Kwan Chow & Chi Kin Choi">
    <title>Registration Page</title>

    <style>
        <?php include 'styles/general-style.css';
        include 'styles/header-footer.css';
        include 'styles/signin-registration.css'; ?>
    </style>
    <script>
        <?php include 'javascript/register.js'; ?>
    </script>
</head>

<body>
    <?php include("./pageLayout/header.php"); ?>

    <div class="registrationContainer">
        <h2>Registration</h2>

        <!-- create a form for new customer registration -->

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" onsubmit="return registerValidate();">
            <table class="registrationTable">
                <tr>
                    <td class="textfield">
                        <label for="email">Email Address:</label>
                    </td>
                    <td id="right">
                        <input type="text" name="email" id="email" placeholder="Email">
                    </td>
                </tr>
                <tr>
                    <td class="textfield"> <label for="login">User Name:</label></td>
                    <td>
                        <input type="text" name="login" id="login" placeholder="User name">
                    </td>
                </tr>
                <tr>
                    <td class="textfield">
                        <label for="pass">Password:</label>
                    </td>
                    <td>
                        <input type="password" name="pass" id="pass" placeholder="Password">
                    </td>
                </tr>
                <tr>
                    <td class="textfield">
                        <label for="pass2">Re-type Password:</label>
                    </td>
                    <td>
                        <input type="password" id="pass2" placeholder="Password">
                    </td>
                </tr>
                <tr>
                    <td class="checkbox" colspan="2">
                        <input type="checkbox" name="terms" id="terms">
                        <label for="terms">I agree to the terms and conditions</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="centre_td">
                        <button type="submit" id="signUp" name="submit" value="Submit">Sign-Up</button>
                        <button type="reset" id="reset">Reset</button>
                    </td>
                </tr>
            </table>

        </form>
    </div>
    <?php include("./pageLayout/footer.php"); ?>
</body>

</html>