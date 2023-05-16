<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location: ../index.php');
}
$conn = new mysqli('localhost', 'root', '', 'clinicdb');
$id = $_SESSION['userID'];


$get = "SELECT u.first_name as user_name, u.last_name as user_lname, s.ser_type as ser, b.start_time as start_t, b.end_time as end_t, b.boodate as boodate, b.booking_status as boo_status, c.camp_name as cam_name
        from booking b, users u, campus c, tblser s
         where u.user_id = b.user_id
         and b.user_id = '$id'
         and s.ser_id = b.ser_id
         and c.camp_id = b.camp_id";

$res = mysqli_query($conn, $get);

 if($res->num_rows > 0){
   while($row = mysqli_fetch_assoc($res)){
     $full_names = $row["user_name"] . ' ' .  $row["user_lname"];
     $start =  $row["start_t"];
     $end =  $row["end_t"];
     $ser =  $row["ser"];
     $cam_name =  $row["cam_name"];
     $boo_status =  $row["boo_status"];
     $boodate = $row["boodate"];
   }
 }


 if(isset($_POST['cancel'])){
  $id = $_SESSION['userID'];
  $update = "UPDATE booking SET booking_status = 'CANCELLED' 
               WHERE user_id = '$id'";

  if(mysqli_query($conn, $update)){
      ?>
      <script>
          window.alert("YOUR APPOINTMENT IS CANCELLED SUCCEFFULLY");
          window.location.href="view.php";
      </script>

      <?php
  }

}


?>
<!DOCTYPE html>
<html>
    <head>
        <title> booking   </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
      <form action="#" method="post">
          <label style="font-size: 13px; color:rgb(202, 242, 242); for="cancel">Reason for cancelling</label><br>
          <textarea name="" id="" cols="30" rows="4" style="font-size: 18px;"></textarea><br>
          <button name="cancel" style="background-color: blue; color: #fff; font-size: 15px; width: 60px; height: 30px;" type="submit">Submit</button><br>
       </form>
</center>
<footer style="max-height:min-content;background-color: rgba(0, 0,0,0.5);">
    <center><p style="color:darkred;font-size: xx-large;" >Emergency Call: <a href="#">0861 960 960</a></p></center>
</footer><center>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>
