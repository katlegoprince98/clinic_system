<?php
  //create an appointment 
  session_start();

 
  $conn = new mysqli('localhost', 'root', '', 'clinicdb');






// Get form data
$date = $_POST['date'];
$time = $_POST['time'];
$campus = $_POST['campus'];
       $service = $_POST['service'];
       $date = $_POST['date'];
       $id = $_SESSION['userID'];


// Create start and end times
$start_time = date("Y-m-d H:i:s", strtotime("$date $time"));
$end_time = date("Y-m-d H:i:s", strtotime("$start_time +1 hour"));

// Check if appointment already exists
$sql = "SELECT * FROM booking WHERE start_time='$start_time'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Appointment already exists

  ?>
  <script>
    window.alert("Appointment already booked for this time");
    window.location.href="booking.php"
  </script>

 <?php
} else {
  // Insert appointment into database
  $sql = "INSERT INTO booking (booking_status, start_time, end_time, ser_id, camp_id, user_id)
  VALUES ('PENDING','$start_time', '$end_time', '$service', '$campus', '$id' )";


  if ($conn->query($sql) === TRUE) {
    echo "";
    ?>
    <script>
      window.alert("Appointment booked successfully.");
      window.location.href="view.php"
    </script>
  
   <?php
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();

   



  /*if(isset($_POST['submit'])){
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
 
*/
?>