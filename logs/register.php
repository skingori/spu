<?php
session_start();
if (isset($_SESSION['userSession'])!="") {
	header("Location: login.php");
}
require_once 'connection/db.php';

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

		$query = "INSERT INTO user_details(user_firstname,user_lastname,user_username,user_email,user_phone,user_payrollnumber) VALUES('$fname','$lname', '$uname','$email','$phone','$pnumber');";
                
                //inserting in login table
                $query .= "INSERT INTO login_table(login_username,login_rank,login_password,login_status) VALUES('$uname','$rank','$enc','Inactive')";
		
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
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Registration Page</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Register New Membership</div>
            <form action="" method="post">
                <div class="body bg-gray">
                    <?php
		if (isset($msg)) {
			echo $msg;
		}
		?>
                    <div class="form-group">
                        <input type="text" name="fname" required class="form-control" placeholder="firstname"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="lname" required class="form-control" placeholder="lastname"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="pnumber" required class="form-control" placeholder="Employee Number"/>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" required class="form-control" placeholder="Email"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" required class="form-control" placeholder="Mobile Number"/>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="rank">
                            <option selected="" value="2"> User*</option>
                            <option value="1"> Administrator*</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" required class="form-control" placeholder="username"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" required class="form-control" placeholder="Password"/>
                    </div>
                </div>
                <div class="footer">

                    <button type="submit" name="register" class="btn bg-olive btn-block">Sign me up</button>

                    <a href="login.php" class="text-center">I already have a membership</a>
                </div>
            </form>

            <div class="margin text-center">
                <span>Register using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>

    </body>
</html>
