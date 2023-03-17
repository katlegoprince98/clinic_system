<?php
  //create an appointment 
  session_start();

 
  $conn = new mysqli('localhost', 'root', '', 'clinicdb');

  if(isset($_POST['submit'])){
      //get values from form
       $campus = $_POST['campus'];
       $service = $_POST['service'];
       $date = $_POST['date'];
       $id = $_SESSION['userID'];
       
 
        
       $insert = "INSERT INTO booking (booking_date, booking_status, ser_id, camp_id, user_id)
        VALUES ('$date', 'PENDING', '$service', '$campus', '$id' )";

        if(mysqli_query($conn, $insert)){
          ?>
          <script>
            window.alert("Your booking is sent successfully, you will be notified onced your request is approved");
            window.location.href="view.php"
          </script>

          <?php
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