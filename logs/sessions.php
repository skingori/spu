<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 01/04/2017
 * Time: 11:24
 */
// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['logname']) && isset($_SESSION['rank'])) {
    switch($_SESSION['rank']) {
        case 1:
            header('location:admin/index.php');//redirect to client page
            break;
        case 2:
            header('location:user/index.php');//redirect to  page
            break;

    }
}
else
{

    header('Location:login.php');
}

?>