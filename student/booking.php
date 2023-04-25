<?php

session_start();
if(!isset($_SESSION['id'])){
    header('location: ../index.php');
}

$id = $_SESSION['userID'];

?>


<!DOCTYPE html>
<html>
    <head>
        <title> Booking   </title>
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
        
      
        <form  action="control.php"
        method="POST">

            <center>
                <label for="campus"><h3>Choose Campus</h3></label></center>
               
                <center>
                    <div style="width:30%">
                    <select required  style="justify-content: center;text-align: center;" class="form-select form-select-lg" name="campus"
                    id="campus">
                    <?php
                         include('../config.php');
                         $get = "SELECT * FROM campus";
                         $res = mysqli_query($conn, $get);

                         while($row = mysqli_fetch_assoc($res)){

                            ?>
                            <option value=<?php echo $row["camp_id"]; ?>><?php echo $row['camp_name']; ?></option>
                            <?php
                         }

                      ?>
    </select>
</div>
</center>



     
        <center><label for="service"><h3>Choose Service</h3></center></label>
       
        <center>
        <div  style="width:30%">
        <select required  style="justify-content: center;text-align: center;" class="form-select form-select-lg" name="service"
        id="service">
        <?php
                         $campus = getServ();

                         while($row = mysqli_fetch_assoc($campus)){

                            ?>
                            <option value=<?php echo $row['ser_id']; ?>><?php echo $row['ser_type']; ?></option>
                            <?php
                         }

                      ?>
    </select></div></center>

<br><center>
    <p>open from <b> 08:00 </b> to <b> 15:00 </b></p>
    <label for="calender"><h3>calender</h3></label></center>
 
    <center><div style="width:30%">
    <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>
      
        <label for="time">Time:</label>
        <select id="time" name="time" required>
          <option value="9:00 AM">9:00 AM</option>
          <option value="10:00 AM">10:00 AM</option>
          <option value="11:00 AM">11:00 AM</option>
          <option value="12:00 AM">12:00 AM</option>
          <option value="13:00 AM">13:00 AM</option>
          <option value="14:00 AM">14:00 AM</option>
          <option value="15:00 AM">15:00 AM</option>
          <!-- Add more options as needed -->
        </select>
    </div>
    <br>
    <button type="submit" name="submit" style="padding:12px;width: 10%;" class="btn btn-primary btn-sm">Book</button><br/>
</center>

</form><br><br><br>
<footer style="max-height:min-content;background-color: rgba(0, 0,0,0.5);">
    <center><p style="color:darkred;font-size: xx-large;" >Emergency Call: <a href="#">0861 960 960</a></p></center>
</footer><center>
    
    </body>
</html>

<?php




////////////////////////////////////
function getServ(){
include('../config.php');

$obt = "SELECT * FROM tblser";

return mysqli_query($conn, $obt);
}


?>
