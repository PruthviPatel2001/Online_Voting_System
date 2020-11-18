<?php 
session_start();
include ("dbcon.php");

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$idtemp=$_SESSION["voterid"];
$voteerr="You cannot vote you have already voted";
$sql = "SELECT firstname,lastname,dob,age,gender,contactno,aadharno,voterid,voted,votedto FROM registration";
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
						echo "Voted: ".$row["voted"]."<br>";
						echo "Voted to: ".$row["votedto"]."<br>";
						$votedtemp=$row["voted"];
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
                <form method="Post">
				<input type="submit" name="submit1" value="vote">
				<?php
				if(isset($_POST['submit1'])){
					if ($votedtemp=='no'){
				$sql="update votes set total_vote=total_vote+1 where Name='bjp'";
				$result= $con->query($sql);
				$sql="update registration set votedto='bjp',voted='yes' where voterid=$idtemp";
				$result= $con->query($sql);
				header("Refresh:0");}
				else{
					echo $voteerr;
				}
				}
				?>
				</form>
			</div>

            <div class="party" id="congress" >
                <img src="images\\congress.png" alt="">
                <p>Congress</p>
                <form method="Post">
				<input type="submit" name="submit2" value="vote">
				<?php
				if(isset($_POST['submit2'])){
					if ($votedtemp=='no'){
				$sql="update votes set total_vote=total_vote+1 where Name='congress'";
				$result= $con->query($sql);
				$sql="update registration set votedto='congress' where voterid=$idtemp";
				$result = $con->query($sql);
				header("Refresh:0");}
				else{
					echo $voteerr;
				}
				}
				?>
				</form>

            </div>
            

            <div class="party" id="aap">
                <img id="aapimg"src="images\\aap.jpg" alt="">
               <p >AAP</p>
               <form method="Post">
				<input type="submit" name="submit3" value="vote">
				<?php
				if(isset($_POST['submit3'])){
					if ($votedtemp=='no'){
				$sql="update votes set total_vote=total_vote+1 where Name='aap'";
				$result= $con->query($sql);
				$sql="update registration set votedto='aap' where voterid=$idtemp";
				$result = $con->query($sql);
				header("Refresh:0");}
				else{
					echo $voteerr;
				}
				}
				?>
				</form>
            </div>

           <div class="party" id="cpi" >
               <img src="images\\cpi.jpg" alt="">
                <p > C.P.I</p>
                <form method="Post">
				<input type="submit" name="submit4" value="vote">
				<?php
				if(isset($_POST['submit4'])){
					if ($votedtemp=='no'){
				$sql="update votes set total_vote=total_vote+1 where Name='cpi'";
				$result= $con->query($sql);
				$sql="update registration set votedto='cpi' where voterid=$idtemp";
				$result = $con->query($sql);
				header("Refresh:0");}
				else{
					echo $voteerr;
				}
				}
				?>
				</form>
            </div>
			


        </div>

        
    </div>

    <footer>

        <p>  </p>
 
     </footer>
    
</body>
</html>