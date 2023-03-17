<?php

//login
    session_start();
    include('config.php');

    if(isset($_POST['submit'])){
        $number = $_POST['number'];
        $password = $_POST['password'];

        $get = "SELECT * FROM users";
        $res = mysqli_query($conn, $get);
        

        if($res->num_rows > 0){
            while($row = mysqli_fetch_assoc($res)){
                $num = $row["tut_no"];
                $pass = $row["password"];


                if($num == $number && $pass == $password){
                    $_SESSION['id'] = $row["type"];
                    $_SESSION['userID'] = $row["user_id"];
                  
                   
                 }else{
                    header("location: index.php");
   
                 }
         
             }
               

            }

            if ($_SESSION['id'] == 'student'){
                header("location: student/booking.php");
            }elseif ($_SESSION['id'] == 'admin'){
                header("location: admin/appointments.php");
            }elseif ($_SESSION['id'] == 'nurse'){
                header("location: nurse/view-patient.php");
            }  
        }


       



?>