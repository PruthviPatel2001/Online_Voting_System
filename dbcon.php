<?php

$server="localhost";
$user="root";
$password="";
$db="signin";

$con=mysqli_connect($server,$user,$password,$db);

if($con){
    ?>

    <script>
        alert("connection sucessfull");
    </script>
    <?php

}else {
    ?>

    <script>
        alert("connection unsucessfull");
    </script>
    <?php
    
}

?>