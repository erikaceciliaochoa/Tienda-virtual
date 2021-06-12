<?php
session_start();
unset($_session["login"]);
header("location:index.php");
exit();
?>
