<?php
session_start();
session_destroy();


header("location:page_Login.php");

exit();
?>
