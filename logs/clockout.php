<html>
<!--<link href="login/css/loginback.css" rel="stylesheet">-->

<body>

<?php

//including the database connection file
include_once("connection/db.php");


if(isset($_POST['clockin'])) {
    $employeenumber = $_POST['employeenumber'];

    // checking empty fields
    if(empty($employeenumber)) {

        if(empty($employeenumber)) {

            echo "<font color='red'>Enter Personal number</font><br/>";
            ?>
            <meta content="0;index.php?action=home" http-equiv="refresh" />

            <?php
        }

        //link to the previous page
        //echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty)

        //insert data to database
        $result = mysqli_query($con, "INSERT INTO user_attendance(attendance_user_id ,attendance_date ,attendance_time ,attendance_mode) VALUES('$employeenumber' , now() ,now() ,'walkin-clockout')");

        //display success messag



        ?>
        <meta content="0;index.php?action=home" http-equiv="refresh" />

        <?php

    }
}
?>

</body>

<!-- This beeps when wrong input -->
<audio id="audio" src="http://www.soundjay.com/button/beep-07.wav" autostart="false" ></audio>
<script>
var sound = document.getElementById("audio");
sound.play()

</script>

<!-- End of javascript -->

</html>

