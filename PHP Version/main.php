<?php
include ("dbcon.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($con,$_POST['id']);
      $mypassword = mysqli_real_escape_string($con,$_POST['password']); 
      
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: login.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System</title>
    <link rel="stylesheet" href="design.css">
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@1,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@700;800&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <img src="images\\ecoi.png" alt="">
        <div class="navbar" id="navbar">
            <ul>
                <li> <a href="main.php"> Home </a> </li>
                <li> <a href="about_us.php">About Us </a> </li>
                <li> <a href="guide.php"> Guide</a> </li>

            </ul>

        </div>

    </header>


    <div class="container">





        <div class="section" id="section">

            <div class="party" id="bjp">
                <img src="images\\bjp.png" alt="">
                <p>B.J.P</p>
                <h4>Total vote:</h4>

            </div>

            <div class="party" id="congress">
                <img src="images\\congress.png" alt="">
                <p>Congress</p>
                <h4>Total vote:</h4>

            </div>


            <div class="party" id="aap">
                <img id="aapimg" src="images\\aap.jpg" alt="">
                <p>AAP</p>
                <h4>Total vote:</h4>
            </div>

            <div class="party" id="cpi">
                <img src="images\\cpi.jpg" alt="">
                <p> C.P.I</p>
                <h4>Total vote:</h4>
            </div>


        </div>

        <div class="form" id="form">

            <form action="" method ="post">
                <h1>Login to Vote</h1>
                <br>

                <p>Voter Id No:</p>

                <input type="text" name="id" value="" placeholder="Enter 10 digit No.">
                <br>
                <br>
                <p>Password:</p>
                <input type="password" name="pass" value="" placeholder="Enter Password">
                <br>
                <br>


            </form>
            <a href="login.php">Login</a>

            <a href="singin.php">Sing In</a>

        </div>

        <div class="footer" id="footer">
            
        <p>©Copyrigth.2020    Pruthvi Patel & Pavan Mistry </p>
        <p>All rigth reserved.</p>
        </div>


    </div>



</body>

</html>