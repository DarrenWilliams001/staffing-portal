<?php
include_once 'header.php';


if ($_SESSION['loggedin'] == FALSE) {
    include_once "view/loginPortal.php";
} else {

    echo $_SESSION;
}



include_once 'footer.php';
