<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System</title>
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/signin.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@1,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@700;800&display=swap" rel="stylesheet">
</head>
<body>

<?php
$ageerr=$voteriderr=$contacterr=$aadharerr="";
    include 'dbcon.php';
   
    $fname=$lname=$dob=$age=$gender=$contact=$aadhar=$voterid=$password='';

    
    if(isset($_POST['submit'])){

        $fname= mysqli_real_escape_string ($con,$_POST['fname']);

        $lname= mysqli_real_escape_string ($con,$_POST['lname']);

        $dob= mysqli_real_escape_string ($con,$_POST['dob']);

        $age= mysqli_real_escape_string ($con,$_POST['age']);
        
        $gender= mysqli_real_escape_string ($con,$_POST['gender']);

        $contact= mysqli_real_escape_string ($con,$_POST['contact']);

        $aadhar= mysqli_real_escape_string ($con,$_POST['aadhar']);

        $voterid= mysqli_real_escape_string ($con,$_POST['voterid']);

        $password= mysqli_real_escape_string ($con,$_POST['pass']);


        $pass=password_hash($password,PASSWORD_BCRYPT);

        $voterquery="select * from registration where  voterid='$voterid'";
        
        $query=mysqli_query($con,$voterquery);

        $votercount=mysqli_num_rows($query);

        if ($votercount>0) {

            echo"voter id already register!!";
        }
        
        else{

            if($age>=18  && strlen($voterid)==10 && strlen($contact)==10 && strlen($aadhar)==12){

                $insertquery="insert into registration ( firstname, lastname, dob, age, 
                gender, contactno, aadharno, voterid, password) 
                values('$fname','$lname','$dob',' $age','$gender',
                '$contact','$aadhar','$voterid','$pass')";

                $iquery= mysqli_query($con,$insertquery);

                if($iquery){
                    ?>
                
                    <script>
                        alert("inserted sucessfull");
                    </script>
                    <?php
                
                }
                else {
                    ?>
                
                    <script>
                        alert("data not inserted");
                    </script>
                    <?php
                    
                }

    

            }
            
            if($age<18){
                 $ageerr="*Age should be 18+"; ;
            }
			if(strlen($voterid)!=10){
                 $voteriderr="*Voter I.D Should be of 10 Digit";
            }
			if(strlen($contact)!=10){
                 $contacterr="*Contact NO. Should be of 10 Digit";
            }
			if(strlen($aadhar)!=12){
                $aadharerr="*Aadhar NO. Should be of 12 Digit ";
            }
        }
    
    
    }

?>

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
    
    <h1>Sign-In Form</h1>  
    <h3>Fill the form to register</h3>    

    <div class="container">
        <div class="signup">                  
               <form action="signin.php"  method='POST'>

                   <p>First Name:</p>
                   <a id="fn"><input type="text" name="fname" id="" placeholder=" Enter First name"></a>
                   <br>
                   <br>

                   <p>Last Name: </p>
                
                   <a id="ln"><input type="text" name="lname" id="" placeholder="Enter Last name"></a>
                   <br>
                   <br>
                   
                    <p>D.O.B :</p>
                   <a id="dd"><input type="date" name="dob" id="" placeholder="Enter DOB"></a>
                   <br>
                   <br>
                   
                    <p>Age:</p>
                    <a id="age"><input type="text" name="age" id="" placeholder="Enter Age"></a>
                    <span id="err1"><?php
                       echo $ageerr;
                    ?></span>
                   <br>
                   <br>

                   <p>Gender:</p>
                   
                   <p class="gender">Male</p>
                   <a id="gender"><input type="radio" value='male' name="gender" id="" ></a>
                   
                   <p class="gender">Female</p>
                   <a id="gender"><input type="radio" value='female' name="gender" id=""></a>
                   
                   <p class="gender">Other</p>
                   <a id="gender"><input type="radio" value='others' name="gender" id=""></a>

                   <br>
                   <br>
                   <p>Contact No:</p>
                   <a id="cnt"><input type="tel" name="contact" id="" placeholder="Enter 10 digit No."></a>
                    <span id="err2"><?php 
                      echo $contacterr;
                   ?></span>
                   <br>
                   <br>

                   <p>Aadhar Card No.</p>
                   <a id="adh"><input type="number" name="aadhar" id="" placeholder="Enter 12 digit No."></a>
                   <span id="err3"><?php
                      echo $aadharerr;
                   ?></span>
                   <br>
                   <br>

                   <p>Voter I.D:</p>
                   <a id="vi"><input type="number" name="voterid" id="" placeholder="Enter 10 digit No."></a>
                   <span id="err4"><?php
                      echo $voteriderr;
                   ?></span>
                   <br>
                   <br>

                   <p>Set password:</p>
                   <a id="pass"><input type="password" name="pass" id="" placeholder="Set- Password"></a>
    
                    <button class="btn" type='submit' name='submit'>Register</button>
                    
               </form>
               
    
        </div>
        


    </div>

    <footer>

       <p>  </p>

    </footer>

    
</body>
</html>