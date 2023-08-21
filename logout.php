<?php
session_start();

if ($_SESSION['mybook_userid']) {
    # code...
    $_SESSION['mybook_userid'] = NULL;
    unset($_SESSION['mybook_userid']);
}



header("Location:login.php");

?>