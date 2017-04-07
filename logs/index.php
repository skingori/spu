<?php
if (isset($_GET['clock'])) {
    $msg = "<div class='alert alert-danger'>
                        <span class='glyphicon glyphicon-log-in'></span> &nbsp;Remember to<b> Clock-Out </b>after logging off.
                    </div>";
}

?>

<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Fingerprint || Scanner</title>
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
            <?php
            if (isset($msg)) {
                echo $msg;
            }
            ?>
            <div class="header" align="center"><img src="img/3.gif" width="50" height="70" /></div>

              <form  method="POST">
                        <div class="form-group" align="left">

                            <input type="text" required class="form-control" placeholder=".....Personal Number" name="employeenumber">

                        </div>

                        <div class="form-group" align="center">
                            <button type="submit" class="btn btn-primary btn-flat"  formaction="clockin.php" name="clockin">Clock-In</button>
                            <button type="submit" class="btn btn-primary btn-flat"  formaction="clockout.php?yes" name="clockin">Clock-Out</button>
                        </div>



                    </form>

           <!-- <div class="margin text-center">
                <span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div> -->
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>