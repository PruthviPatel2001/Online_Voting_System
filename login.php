<?php 
session_start();
include ("dbcon.php");

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$idtemp=$_SESSION["voterid"];

$sql = "SELECT firstname,lastname,dob,age,gender,contactno,aadharno,voterid FROM registration";
$result = $con->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting system</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="singin.css">
    <link rel="stylesheet" href="login.css">
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
        <div class="form" id="form">
            
            <form>
                <h3>User Details</h3>
                <br>
				<?php
                if (mysqli_num_rows($result) > 0) {
					// output data of each row 
					while($row = mysqli_fetch_assoc($result)) {
						if($idtemp==$row["voterid"]){
						echo "Full-Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
						echo "Voter id:". $row["voterid"]."<br>";
						echo "D.O.B:". $row["dob"]."<br>";
						echo "Gender:". $row["gender"]."<br>";
						echo "Contact No:". $row["contactno"]."<br>";
						echo "Aadhar No:". $row["aadharno"]."<br>";
						echo "Voted"."<br>";
						echo "Voted to"."<br>";
						}}
					}
				?>
    
                 
            </form>
            <a href="main.php" id="signout" style="
                   color: red;
                   text-decoration: none;
                   position: relative;
                   bottom: 183px;
                   left: 170px;
                   border: 2px solid;
                   padding: 11px;
                   width: 94px;
               ">Sign Out </a>
            

        </div>
      
        <div class="section" id="section">

            <div class="party" id="bjp" >
                <img src="images\\bjp.png" alt="">
                <p>B.J.P</p>
                <button>Vote</button>

            </div>

            <div class="party" id="congress" >
                <img src="images\\congress.png" alt="">
                <p>Congress</p>
                <button>Vote</button>

            </div>
            

            <div class="party" id="aap">
                <img id="aapimg"src="images\\aap.jpg" alt="">
               <p >AAP</p>
               <button>Vote</button>
            </div>

           <div class="party" id="cpi" >
               <img src="images\\cpi.jpg" alt="">
                <p > C.P.I</p>
                <button>Vote</button>
            </div>


        </div>

        
    </div>

    <footer>

        <p>  </p>
 
     </footer>
    
</body>
</html>