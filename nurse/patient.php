<?php
$conn = new mysqli('localhost', 'root', '', 'clinicdb');
$get = $_GET['boo'];
session_start();
if(!isset($_SESSION['id'])){
    header('location: ../index.php');
}

$get_bookings = "SELECT b.booking_id as id, u.first_name as user_name, u.last_name as user_lname, s.ser_type as ser, b.booking_status as boo_status, c.camp_name as cam_name
 from booking b, users u, campus c, tblser s
 where u.user_id = b.user_id
 and s.ser_id = b.ser_id
 and c.camp_id = b.camp_id
 and b.booking_id = '$get' ";
$booking_fields = mysqli_query($conn, $get_bookings);

while($row = mysqli_fetch_assoc($booking_fields)){
    $full_names = $row["user_name"] . ' ' .  $row["user_lname"];
    $ser =  $row["ser"];
}

$u_id = $_SESSION['userID'];

$get_name = "SELECT CONCAT(first_name, last_name) as n_names from users where user_id = '$u_id'";
$names = mysqli_query($conn, $get_name);

while($row = mysqli_fetch_assoc($names)){
    $p_names = $row['n_names'];
}




if(isset($_POST['treat'])){
   $username = $full_names;
   $service = $ser;
   $report = $_POST['report'];
   $get = $_GET['boo'];
   $pulled_name = $p_names;
  

   $treat = "CALL treatment('$username', '$service', 'TREATED', '$report', '$pulled_name',' $get');";

    if(mysqli_query($conn, $treat)){
        ?>
        <script>
            window.alert("Captured succefully");
            window.location.href="view-patient.php";
        </script>

        <?php
    }
}

if(isset($_POST['refer'])){
    $username = $full_names;
    $service = $ser;
    $report = $_POST['report'];
    $get = $_GET['boo'];
    $pulled_name = $p_names;
   
    $treat = "CALL treatment('$username', '$service', 'REFERED', '$report', '$pulled_name',' $get');";
 
   
 
     if(mysqli_query($conn, $treat)){
         ?>
         <script>
             window.alert("Captured succefully");
             window.location.href="view-patient.php";
         </script>
 
         <?php
     }
 }


?>


<!DOCTYPE html>
<html>
    <head>
        <title> Patients   </title>
        <link rel="icon" href="../assets/images/tut.png"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/booking.css">
    </head>
    <body>
        <div >
            <header>

                <img width="10%" width="10%" src="../assets/images/tut.png"></img><center><h1 style="font-family: fantasy;font-weight: 300;font-size:40px;color:rgb(202, 242, 242)">Clinic System</h1></center>
            </header>
        </div>  
        <center>
        <div class="list">
            

       
        <form  action="#" method="post"><br>
          
             <div class="det">
                <h4 style="font-family: fantasy;font-weight: 300;font-size:20px;color:rgb(202, 242, 242)">PATIENT DETAILS</h4>
             </div><br><br>
             <input style="width: 120px; height: 30px; type="text" name="username" placeholder="<?php echo $full_names;  ?>" readonly>
             <input style="width: 120px; height: 30px; type="text" name="service" placeholder="<?php echo $ser;  ?>" readonly><br><br>
            
             <textarea name="report" id="" cols="70" rows="10" placeholder="Type report"></textarea><br><br>
             <button style="background-color: blue; color: #fff; font-size: 12px; width: 60px; height: 30px;" name="treat">TREATED</button>
             <button name="refer" style="background-color: red; color: #fff; font-size: 13px; width: 60px; height: 30px;">REFER</button>
             

           </div>
           </center>

</form><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer style="max-height:min-content;background-color: rgba(0, 0,0,0.5);">
    <center><p style="color:darkred;font-size: xx-large;" >Emergency Call: <a href="#">0861 960 960</a></p></center>
</footer><center>
    
    </body>
</html>

