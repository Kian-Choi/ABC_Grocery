<?php require_once("./database/connect.php"); ?>

<?php

// destroy the section
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(), '', 0, '/');

// re-direct to the index page after logging out
header('Location: /assignment02/index.php');
?>