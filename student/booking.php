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
        <title> Booking  </title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.4/themes/overcast/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
        <link rel="icon" href="../assets/images/tut.png"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/booking.css">
        <script>
            $(function () {
               var minDate = new Date();
               $("#date").datepicker({
                minDate: minDate,
                dateFormat: 'yy/mm/dd',
                changeYear: true,
                changeMonth: true,
                
               });
            });
        </script>
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
                <label style="font-size: 13px; color:rgb(202, 242, 242);" for="campus"><h3>Choose Campus</h3></label></center>
               
                <center>
                    <div style="width:30%">
                    <select required  style="justify-content: center;text-align: center;" class="form-select form-select-lg" name="campus"
                    id="campus">
                    <option value="" selected disabled>Select campus</option>
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



     
        <center><label style="font-size: 13px; color:rgb(202, 242, 242);" for="service"><h3>Choose Service</h3></center></label>
       
        <center>
        <div  style="width:30%">
        <select required  style="justify-content: center;text-align: center;" class="form-select form-select-lg" name="service"
        id="service">
        <option value="" selected disabled>Select service</option>
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
    <p style="font-size: 17px; color:rgb(202, 242, 242);">open from <b> 08:00 </b> to <b> 16:00 </b></p>
    <label style="font-size: 13px; color:rgb(202, 242, 242);" for="calender"><h3>calender</h3></label></center>
 
    <center><div style="width:70%">
    <label style="font-size: 13px; color:rgb(20 2, 242, 242);" for="date">Date:</label>
        <input style="width: 120px; height: 30px;" type="text" placeholder="Date" id="date" name="date" required>
      
        <label style="font-size: 13px; color:rgb(202, 242, 242);" for="time">Time:</label>
        <select id="time" name="time" style="width: 120px; height: 30px;"  required>
        <option value="" selected disabled>Select time</option>
          <option value="09:00:00 AM">9:00 AM</option>
          <option value="09:30:00 AM">09:30 AM</option>
          <option value="10:00:00 AM">10:00 AM</option>
          <option value="10:30:00 AM">10:30 AM</option>
          <option value="11:00:00 AM">11:00 AM</option>
          <option value="11:30:00 AM">11:30 AM</option>
          <option value="12:00:00 PM">12:00 PM</option>
          <option value="12:30:00 PM">12:30 PM</option>
          <option value="1:00:00 PM">13:00 PM</option>
          <option value= "1:30:00 PM">13:30 PM</option>
          <option value="2:00:00 PM">14:00 PM</option>
          <option value="2:30:00 PM">14:30 PM</option>
          <option value="3:00:00 PM">15:00 PM</option>
          <option value="3:30:00 PM">15:30 PM</option>
        </select>
    </div>
    <br>
    <button style="background-color: blue; color: #fff; font-size: 15px; width: 60px; height: 30px;" type="submit" name="submit" class="btn btn-succes btn-sm">Book</button><br/>
</center>

</form><br><br><br>
<footer style="max-height:min-content;background-color: rgba(0, 0,0,0.5);">
    <center><p style="color:darkred;font-size: xx-large;" >Emergency Call: <a href="#">0861 960 960</a></p></center>
</footer><center>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    
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
