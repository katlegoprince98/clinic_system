<?php
 $conn = new mysqli('localhost', 'root', '', 'clinicdb');
session_start();
if(!isset($_SESSION['id'])){
    header('location: ../index.php');
}

$get_bookings = "SELECT b.booking_id as id, u.first_name as user_name, u.last_name as user_lname, s.ser_type as ser, b.start_time  as start_t,b.end_time  as end_t, b.booking_status as boo_status, c.camp_name as cam_name
 from booking b, users u, campus c, tblser s
 where s.ser_id = b.ser_id
 and c.camp_id = b.camp_id
 and b.booking_status = 'ACTIVE'";
$booking_fields = mysqli_query($conn, $get_bookings);

$count = "SELECT COUNT(booking_status) as tot from booking where booking_status = 'ACTIVE'";
$total_active = mysqli_query($conn, $count);

while($row = mysqli_fetch_assoc($total_active)){
  $tot_sta = $row["tot"];
}


$count_c = "SELECT COUNT(booking_status) as tot from booking where booking_status = 'CANCELLED'";
$total_can = mysqli_query($conn, $count_c);

while($row = mysqli_fetch_assoc($total_can)){
  $tot_can = $row["tot"];
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title> appointments   </title>
        <link rel="icon" href="../assets/images/tut.png"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/booking.css">
    </head>
    <body>
    
        <div >
        
            <header>
              <form action="../logout/logout.php">
              <button name="logout">LOGOUT</button>
              </form>
          
                <img width="10%" width="10%" src="../assets/images/tut.png"></img><center><h1 style="font-family: fantasy;font-weight: 300;font-size:40px;color:rgb(202, 242, 242)">Clinic System</h1></center>
            </header>
        </div>  
        
        
      <center><br><br><br>
      <form action="control.php" method="post">
    <table class="table">
  <tr>
    
    <th>APPOINTMENTS</th>
    <th>Total</th>
    <th>Action</th>
  </tr>
  
      
      <tr>
      <td>Active</td>
      <td><?php echo $tot_sta;   ?></td>
      <td><a href="active.php">View</a></td>
      </tr>
      <tr>
      <td>Cancelled</td>
      <td><?php echo $tot_can;   ?></td>
      <td><a href="cancelled.php">View</a></td>
      </tr>
 

  
</table><br><br><br>
</form>
</center>
<footer style="max-height:min-content;background-color: rgba(0, 0,0,0.5);">
    <center><p style="color:darkred;font-size: xx-large;" >Emergency Call: <a href="#">0861 960 960</a></p></center>
</footer><center>
    
    </body>
</html>
