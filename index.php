<!DOCTYPE html>
<html>
<!------------Head----------------->
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css"/>
    <link rel="icon" href="assets/images/tut.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Clinic System</title>
</head>
<!------------Body----------------->
<body>
    
        
        <LEFT>
        <img width="10%" width="10%" src="assets/images/tut.png"></img>
    </LEFT>
    <center>
        <h1 style="font-family: fantasy;font-weight: 300;font-size:100px;color:rgb(202, 242, 242)">Clinic System</h1>
        <div class="forms">
        <form action="control.php" method="post" autocomplete="off">
            <input id="inputForLogin" name="number" type="text" placeholder="Student Number" /><br/><br/>
            <input id="inputForLogin" name="password" type="password" placeholder="Password" /><br/><br/><br/>
            
            <input type="submit" name="submit" value="LOGIN"><br>
          <a href="forgot-password.php" style="color:aqua; font-size:25px;">forgot password</a>
        </form>
    </div><br><br>
    </center>
</body>
<!-------------Close Body------------>
<footer style="max-height:min-content;background-color: rgba(0, 0,0,0.5);">
     <center><p style="color:darkred;font-size: xx-large;" >Emargency Call: <a href="#">011-958-9085</a></p></center>
     <center><a href="https://facebook.com">
        <i style="font-size:40px;" class="fa fa-facebook"></i></a>
        <a href="https:twitter.com"><i href="" style="font-size:40px;" class="fa fa-twitter"></i></a>
        <a href="https://instagram.com"><i href="" style="font-size:40px;" class="fa fa-instagram"></i></a>
    </center>
    </footer>

</html>
