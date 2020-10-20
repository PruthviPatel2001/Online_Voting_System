<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System</title>
    <link rel="stylesheet" href="design.css">
    <link rel="stylesheet" href="singin.css">
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@1,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@700;800&display=swap" rel="stylesheet">
</head>
<body>

<?php
    
    include 'dbcon.php';
   
    $fname=$lname=$dob=$age=$gender=$contact=$addhar=$voterid=$password='';

    
    if(isset($_POST['submit'])){

        $fname= mysqli_real_escape_string ($con,$_POST['fname']);

        $lname= mysqli_real_escape_string ($con,$_POST['lname']);

        $dob= mysqli_real_escape_string ($con,$_POST['dob']);

        $age= mysqli_real_escape_string ($con,$_POST['age']);
        
        $gender= mysqli_real_escape_string ($con,$_POST['gender']);

        $contact= mysqli_real_escape_string ($con,$_POST['contact']);

        $addhar= mysqli_real_escape_string ($con,$_POST['aadaharno']);

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

            if($age>=18){

                $insertquery="insert into registration ( firstname, lastname, dob, age, 
                gender, conatctNo, aadharno, voterid, password) 
                values('$fname','$lname','$dob',' $age','$gender',
                '$contact','$addhar','$voterid','$pass')";

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
            else{
                echo ("you have to be 18+ to vote.");
            }
        }
    
    
    }

?>

    <header>
        <img src="images\\ecoi.png" alt="">
        <div class="navbar" id="navbar">

            <ul>
                <li> <a href="main.html"> Home </a> </li>
                <li> <a href="about_us.html">About Us </a> </li>
                <li> <a href="guide.html"> Guide</a> </li>
    
            </ul>
    
        </div>

    </header>
    
    <h1>Sing-In Form</h1>  
    <h3>Fill the form to register</h3>    

    <div class="container">
        <div class="singup">                  
               <form action="singin.php"  method='POST'>

                   <p>First Name:</p>
                   <a id="fn"><input type="text" name="fname" id="" placeholder=" Enter First name" required></a>
                   <br>
                   <br>

                   <p>Last Name: </p>
                
                   <a id="ln"><input type="text" name="lname" id="" placeholder="Enter Last name" required></a>
                   <br>
                   <br>
                   
                    <p>D.O.B :</p>
                   <a id="dd"><input type="date" name="dob" id="" placeholder="Enter DOB" required></a>
                   <br>
                   <br>
                   
                    <p>Age:</p>
                    <a id="age"><input type="text" name="age" id="" placeholder="Enter Age" required></a>
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
                   <a id="cnt"><input type="tel" name="contact" id="" placeholder="Enter 10 digit No." required></a>
                   <br>
                   <br>

                   <p>Aadhar Card No.</p>
                   <a id="adh"><input type="number" name="aadaharno" id="" placeholder="Enter 12 digit No." required></a>
                   <br>
                   <br>

                   <p>Voter I.D:</p>
                   <a id="vi"><input type="number" name="voterid" id="" placeholder="Enter 10 digit No." required></a>
                   <br>
                   <br>

                   <p>Set password:</p>
                   <a id="pass"><input type="text" name="pass" id="" placeholder="Set- Password" required></a>
    
                    <button class="btn" type='submit' name='submit'>Register</button>
                    
               </form>
               
    
        </div>
        


    </div>

    <footer>

       <p>  </p>

    </footer>

    
</body>
</html>