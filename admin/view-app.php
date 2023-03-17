<?php
$conn = new mysqli('localhost', 'root', '', 'clinicdb');
$get = $_GET['boo'];
session_start();
if(!isset($_SESSION['id'])){
    header('location: ../index.php');
}

$get_bookings = "SELECT b.booking_id as id, u.first_name as user_name, u.last_name as user_lname, s.ser_type as ser, b.booking_date as boo_date, b.booking_status as boo_status, c.camp_name as cam_name
 from booking b, users u, campus c, tblser s
 where u.user_id = b.user_id
 and s.ser_id = b.ser_id
 and c.camp_id = b.camp_id
 and b.booking_status = 'PENDING' 
 and b.booking_id = '$get'
";
$booking_fields = mysqli_query($conn, $get_bookings);


while($row = mysqli_fetch_assoc($booking_fields)){
    $full_names = $row["user_name"] . ' ' .  $row["user_lname"];
    $boo_date =  $row["boo_date"];
    $ser =  $row["ser"];
    $cam_name =  $row["cam_name"];
   $boo_status =  $row["boo_status"];
}


if(isset($_POST['approve'])){
    $get = $_GET['boo'];
    $update = "UPDATE booking SET booking_status = 'APPROVED' 
    WHERE booking_id = '$get'";

     if(mysqli_query($conn, $update)){
    ?>
       <script>
         window.alert("APPROVED");
         window.location.href="appointments.php";
       </script>

    <?php
 }
}

if(isset($_POST['reject'])){
    $get = $_GET['boo'];
    $update = "UPDATE booking SET booking_status = 'REJECTED' 
    WHERE booking_id = '$get'";

     if(mysqli_query($conn, $update)){
    ?>
       <script>
         window.alert("REJECTED");
         window.location.href="appointments.php";
       </script>

    <?php
 }
}



?>


<!DOCTYPE html>
<html>
    <head>
        <title> booking   </title>
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

       
        <form  action="#" method="post">
          
              <div class="con">
                <h3>DETAILS</h3><br>
                <h4>Name: <?php echo $full_names;   ?></h4>
                <h4>Date: <?php echo $boo_date;   ?></h4>
                <h4>Service:<?php echo $ser;   ?></h4>
                <h4>Campus: <?php echo $cam_name;   ?></h4>
                <button name="approve">APPROVE</button>
                <button name="reject">REJECT</button>
              </div>
           

           </div>
           </center>

</form><br><br><br>
<footer style="max-height:min-content;background-color: rgba(0, 0,0,0.5);">
    <center><p style="color:darkred;font-size: xx-large;" >Emergency Call: <a href="#">0861 960 960</a></p></center>
</footer><center>
    
    </body>
</html>

