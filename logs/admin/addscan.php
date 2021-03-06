<?php
session_start();
include '../connection/db.php';
$username=$_SESSION['logname'];

$result1 = mysqli_query($con, "SELECT * FROM user_details WHERE user_username='$username'");

while($res = mysqli_fetch_array($result1))
{
    $user_firstname= $res['user_firstname'];
    $user_lastname= $res['user_lastname'];

}
/**
 * Created by PhpStorm.
 * User: king
 * Date: 01/04/2017
 * Time: 11:24
 */
// Inialize session

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['logname']) && isset($_SESSION['rank'])) {
    switch($_SESSION['rank']) {

        case 2:
            header('location:../user/index.php');//redirect to  page
            break;

    }
}
else
{

    header('Location:index.php');
}
$username=$_SESSION['logname'];
if (isset($_SESSION['userSession'])!="") {
    header("Location: login.php");
}
require_once '../connection/db.php';

if(isset($_POST['register'])) {

    $fname_ = strip_tags($_POST['fname']);
    $lname_ = strip_tags($_POST['lname']);
    $pnumber_ = strip_tags($_POST['pnumber']);
    $phone_ = strip_tags($_POST['phone']);
    $uname_ = strip_tags($_POST['username']);
    $email_ = strip_tags($_POST['email']);
    $upass_ = strip_tags($_POST['password']);
    $rank_ = strip_tags($_POST['rank']);

    $fname = $con->real_escape_string($fname_ );
    $lname = $con->real_escape_string($lname_ );
    $pnumber= $con->real_escape_string($pnumber_);
    $phone = $con->real_escape_string($phone_ );
    $uname = $con->real_escape_string($uname_);
    $email = $con->real_escape_string($email_);
    $upass = $con->real_escape_string($upass_);
    $enc = md5($upass);
    $rank = $con->real_escape_string($rank_);
    //$hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version

    $check_email = $con->query("SELECT user_email FROM user_details WHERE user_email='$email'");
    $count=$check_email->num_rows;

    if ($count==0) {

        //$query = "INSERT INTO user_details(user_firstname,user_lastname,user_username,user_email,user_phone,user_payrollnumber) VALUES('$fname','$lname', '$uname','$email','$phone','$pnumber');";

        //inserting in login table
        //$query .= "INSERT INTO login_table(login_username,login_rank,login_password,login_status) VALUES('$uname','$rank','$enc','Inactive')";

        if ($con->multi_query($query)) {
            $msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
					</div>";
        }else {
            $msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
					</div>";
        }

    } else {


        $msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
				</div>";

    }

    $con->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>company || home</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <link href="../css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="../css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue">
<!-- header logo: style can be found in header.less -->
<header class="header">
    <a href="index.php" class="logo">
        <!-- Add the class icon to your logo image or logo icon to add the margining -->
        IEBC MIS
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope"></i>
                        <span class="label label-success">0</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 0 messages</li>
                        <li>
                            <!-- inner menu: contains the actual data -->


                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-warning"></i>
                        <span class="label label-warning">0</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 0 notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->


                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span><?php echo "$user_firstname&nbsp$user_lastname";?><i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <img src="../img/user.jpg" class="img-circle" alt="User Image" />
                            <p>
                                Loged in as <?php echo "$username"; ?>
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="myprof.php" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="../logout.php?logout" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="../img/user.jpg" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>Hello, <?php echo "$username"; ?></p>

                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                    <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="active">
                    <a href="index.php">
                        <i class="fa fa-dashboard"></i> <span>Home</span>
                    </a>
                </li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>Settings</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="activate.php"><i class="fa fa-angle-double-right"></i> Activate Users</a></li>
                        <li><a href="crud.php"><i class="fa fa-angle-double-right"></i> Manage Users</a></li>
                        <li><a href="add.php"><i class="fa fa-angle-double-right"></i> New Users</a></li>
                        <li><a href="payroll.php"><i class="fa fa-angle-double-right"></i> Add payments</a></li>
                        <li><a href="addscan.php"><i class="fa fa-angle-double-right"></i> Add scan device</a></li>

                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>My Profile</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="profile.php"><i class="fa fa-angle-double-right"></i> Change Password</a></li>
                        <li><a href="mylogs.php"><i class="fa fa-angle-double-right"></i> My logs</a></li>
                        <li><a href="../logout.php?logout"><i class="fa fa-angle-double-right"></i> Logout</a></li>
                    </ul>
                </li>

                <li>
                    <a href="news.php">
                        <i class="fa fa-envelope-o"></i> <span>News</span>
                        <small class="badge pull-right bg-red"><!--3--></small>
                    </a>
                </li>
                <li>
                    <a href="mailbox.php">
                        <i class="fa fa-envelope"></i> <span>Mailbox</span>
                        <small class="badge pull-right bg-yellow"><!--12--></small>
                    </a>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Home
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>


        <!-- Main content -->
        <section class="content">
            <!--********************Add content here *******************-->
            <form action="" method="post">
                <!--<div class="body bg-gray">-->
                    <?php
                    if (isset($msg)) {
                        echo $msg;
                    }
                    ?>
                    <div class="form-group">
                        <input type="text" name="fname" required class="form-control" placeholder="Device Name"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" required class="form-control" placeholder="Device Serial"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" required class="form-control" placeholder="Device VKEY"/>
                    </div>
                <!--</div>-->
                <div class="footer">

                    <button type="submit" name="register" class="btn bg-olive">Add Scanner</button>
                </div>
            </form>
        </section>

        <section class="content">
            <form action="" method="post">
                <!--<div class="body bg-gray">-->
                <?php
                if (isset($msg)) {
                    echo $msg;
                }
                ?>

                <div class="form-group">
                    <div class="form-group">
                        <select name="employee_department" required class="form-control">
                            <option selected="">...Select employee...</option>
                            <?php

                            //include("../connection/db.php");
                            $query = "SELECT * FROM user_details";
                            $result = mysqli_query($con,$query);
                            echo "<option></option>";
                            while($row = mysqli_fetch_array($result))
                            {
                                $id = $row[id];
                                $user_lastname = $row[user_lastname];
                                $user_firstname= $row[user_firstname];
                                echo "<option>$user_lastname &nbsp $user_firstname</option>";
                            }

                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <input type="email" name="email" readonly required class="form-control" placeholder="Finger Print"/>
                </div>

                <!--</div>-->
                <div class="footer">

                    <button type="submit" name="register" class="btn bg-olive">Register employee</button>
                </div>
            </form>
            <!--********************Add content here *******************-->
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<!-- add new calendar event modal -->


<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- jQuery UI 1.10.3 -->
<script src="../js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="../js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="../js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="../js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- fullCalendar -->
<script src="../js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="../js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="../js/AdminLTE/app.js" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../js/AdminLTE/dashboard.js" type="text/javascript"></script>

</body>
</html>
