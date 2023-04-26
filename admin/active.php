<?php
$conn = new mysqli('localhost', 'root', '', 'clinicdb');
session_start();
if(!isset($_SESSION['id'])){
    header('location: ../index.php');
}

$get_bookings = "SELECT DISTINCT  u.first_name as user_name, u.last_name as user_lname, s.ser_type as ser, b.start_time  as start_t,b.end_time  as end_t, b.booking_status as boo_status, c.camp_name as cam_name
 from booking b, users u, campus c, tblser s
 WHERE u.user_id = b.user_id
 and c.camp_id = b.camp_id
 and s.ser_id = b.ser_id
 and b.booking_status = 'ACTIVE' 
";
$booking_fields = mysqli_query($conn, $get_bookings);


$content = '';
while($row = mysqli_fetch_assoc($booking_fields)){

   $content .= '
   <div class="col">
   <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">'.$row["user_name"] . " " .  $row["user_lname"].'</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
    <p><strong>Date:</strong> '.$row["start_t"].'</p>
    <p><strong>Service</strong> '.$row["ser"].'</p>
    <p><strong>Campus:</strong> '.$row["cam_name"].'</p>
  </div>
  </div>
   </div>
   ';



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
        <div class="container text-center">
       <div class="row align-items-start">
     
     <?php echo $content;    ?>

    
    </div>
    
  </div>
  <a href="appointments.php" class="btn btn-success">BACK</a>
  

</form><br><br><br>
<footer style="max-height:min-content;background-color: rgba(0, 0,0,0.5);">
    <center><p style="color:darkred;font-size: xx-large;" >Emergency Call: <a href="#">0861 960 960</a></p></center>
</footer><center>
    
    </body>
</html>

