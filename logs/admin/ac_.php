<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 02/04/2017
 * Time: 17:35
 */

include("../connection/db.php");

//getting id of the data from url
$id = $_GET['id'];

//updating the table
$result = mysqli_query($con, "UPDATE login_table SET login_status='Active' WHERE login_id=$id");

//redirectig to the display page. In our case, it is index.php
header("Location: activate.php");

?>