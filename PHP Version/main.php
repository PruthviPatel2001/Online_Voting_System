<?php
include ("dbcon.php");
// Define variables and initialize with empty values
$voterid = $password = "";
$voterid_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	// Check if voterid is empty
	if(empty(trim($_POST["voterid"]))){
		$voterid_err = "Please enter id.";
    } else{
        $voterid = trim($_POST["voterid"]);
	}
// Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
// Validate credentials
    if(empty($voterid_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT voterid,password FROM registration WHERE voterid = ?";
		if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_voterid);

            // Set parameters
            $param_voterid = $voterid;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if voterid exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $voterid, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["voterid"] = $voterid;

                            header("location: login.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if voterid doesn't exist
                    $voterid_err = "No account found with that voter id.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($con);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System</title>
    <link rel="stylesheet" href="main.css">
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

                <input type="text" name="voterid" value="" placeholder="Enter 10 digit No.">
                <br>

                <span style=" color:red; font-size: 1.2rem; background-color:#eae1e1;margin: 26px;"> 
                <?php  echo $voterid_err;?> 
                </span>

                <br><br>
                <p>Password:</p>
                <input type="password" name="password" value="" placeholder="Enter Password">
                <br>
                
                <span style=" color:#d72323; font-size: 1.2rem; background-color:#eae1e1;margin:-24px;"> 
                <?php echo $password_err;?> 
                </span>

                <br><br>

				<a id ="lns" href=""><input id="submitlogin" type="submit" value="Login"/></a>
                <a id="lns" href="singin.php">Sing In</a>

            </form>


        </div>

        <div class="footer" id="footer">

        <p style="font-size:1.4rem;">©Copyrigth.2020    Pruthvi Patel & Pavan Mistry </p>
        <p style="font-size:1.4rem;">All rigth reserved.</p>
        </div>


    </div>



</body>

</html>
