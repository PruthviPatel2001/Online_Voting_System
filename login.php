<?php 
$voteerr="";
session_start();
include ("dbcon.php");

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$idtemp=$_SESSION["voterid"];

$sql = "SELECT firstname,lastname,dob,age,gender,contactno,aadharno,voterid,voted,votedto FROM registration";
$result = $con->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting system</title>
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/signin.css">
    <link rel="stylesheet" href="CSS/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@1,600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Overpass:wght@700;800&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
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
				
				<p id="details">
				<?php
                if (mysqli_num_rows($result) > 0) {
					// output data of each row 
					while($row = mysqli_fetch_assoc($result)) {
						if($idtemp==$row["voterid"]){
						echo "<span class='detail-title'> Full-Name:  </span>" . $row["firstname"]. " " . $row["lastname"]. "<br>";

						echo " <span class='detail-title'> Voter id:  </span>". $row["voterid"]."<br>";
						echo " <span class='detail-title'> D.O.B:  </span>". $row["dob"]."<br>";
						echo " <span class='detail-title'> Gender:  </span>". $row["gender"]."<br>";
						echo " <span class='detail-title'> Contact No:  </span>". $row["contactno"]."<br>";
						echo " <span class='detail-title'> Aadhar No:  </span>". $row["aadharno"]."<br>";
						echo " <span class='detail-title'> Voted:  </span>".$row["voted"]."<br>";
						echo " <span class='detail-title'> Voted to:  </span>".$row["votedto"]."<br>";
						$votedtemp=$row["voted"];
						}}
					} 
				?>
				</p>
    
                 
            </form>
            <a href="main.php" id="sign-out">Sign Out </a>
            

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
					$voteerr="You Already cast your vote!!";
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
					$voteerr="You Already cast your vote!!";
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
					$voteerr="You Already cast your vote!!";
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
					$voteerr="You Already cast your vote!!";
				}
				}
				?>
				</form>
            </div>
			


		</div>
		<?php
			   echo "<h4 class='warn'>{$voteerr}</h4>";
		?>


        
    </div>

    <footer>

	    <p style="font-size:1.4rem;">©Copyrigth.2020    Pruthvi Patel & Pavan Mistry </p>
        <p style="font-size:1.4rem;">All rigth reserved.</p>
 
     </footer>
    
</body>
</html>