<?php
 $conn = new mysqli('localhost', 'root', '', 'clinicdb');
session_start();
if(!isset($_SESSION['id'])){
    header('location: ../index.php');
}

$get_bookings = "SELECT b.booking_id as id, u.first_name as user_name, u.last_name as user_lname, s.ser_type as ser, b.start_time as start_t, b.end_time as end_t, b.booking_status as boo_status, c.camp_name as cam_name
 from booking b, users u, campus c, tblser s
 where u.user_id = b.user_id
 and s.ser_id = b.ser_id
 and c.camp_id = b.camp_id
 and b.booking_status = 'ACTIVE'";
$booking_fields = mysqli_query($conn, $get_bookings);

$hiv = "SELECT COUNT(ser_id) as hiv  FROM booking WHERE ser_id = 1 AND booking_status = 'ACTIVE'";
$hiv_res = mysqli_query($conn, $hiv);
while($row = mysqli_fetch_assoc($hiv_res)){
    $hiv_tot = $row["hiv"];
}
$family = "SELECT COUNT(ser_id) as fam  FROM booking WHERE ser_id = 2 AND booking_status = 'ACTIVE'";
$family_res = mysqli_query($conn, $family);
while($row = mysqli_fetch_assoc($family_res)){
  $fam_tot = $row["fam"];
}
$oral = "SELECT COUNT(ser_id) as oral  FROM booking WHERE ser_id = 3 AND booking_status = 'ACTIVE'";
$oral_res = mysqli_query($conn, $oral);
while($row = mysqli_fetch_assoc($oral_res)){
  $oral_tot = $row["oral"];
}
$preg = "SELECT COUNT(ser_id) as preg  FROM booking WHERE ser_id = 4 AND booking_status = 'ACTIVE'";
$preg_res = mysqli_query($conn, $preg);
while($row = mysqli_fetch_assoc($preg_res)){
  $preg_tot = $row["preg"];
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
              <form action="../logout/logout.php">
              <button name="logout">LOGOUT</button>
              </form>
          
                <img width="10%" width="10%" src="../assets/images/tut.png"></img><center><h1 style="font-family: fantasy;font-weight: 300;font-size:40px;color:rgb(202, 242, 242)">Clinic System</h1></center>
            </header>
        </div>  
        <center>
        <div style="width: 150px; height: 100px; color: #fff; background-color: grey;">
                <h5>Services</h5><br>
                <strong>1 HIV-TESTING:</strong> <?php echo $hiv_tot; ?><br>
                <strong>2 FAMILY PLANNING:</strong> <?php echo $fam_tot; ?><br>
                <strong>3 ORAL_CONTRACECTIVES:</strong> <?php echo $oral_tot; ?><br>
                <strong>4 PREGNANCY TESTING:</strong> <?php echo $preg_tot; ?><br>
        </div>
        </center>
        
      <center><br><br><br>
      <form action="control.php" method="post">
    <table class="table">
  <tr>
    
    <th>Patients</th>
    <th>Action</th>
  </tr>
    <?php
      
       while($row = mysqli_fetch_assoc($booking_fields)){
          echo '
          <tr>
          <td>'.$row["user_name"].'  '.$row["user_lname"].'</td>
          <td><a href="patient.php?boo='.$row["id"].'">VIEW</a></td>
          
          </tr>
          ';
       }
 
    ?>
  
</table><br><br><br>
</form>
</center>
<footer style="max-height:min-content;background-color: rgba(0, 0,0,0.5);">
    <center><p style="color:darkred;font-size: xx-large;" >Emergency Call: <a href="#">0861 960 960</a></p></center>
</footer><center>
    
    </body>
</html>
