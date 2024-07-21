<?php
$insert=false;
if(isset($_POST['name'])){

    


// connection set
 $server="localhost";
 $username="root";
 $password="";

 // create connection

 $con = mysqli_connect($server,$username,$password);

 // check connection success

 if(!$con){
    die("connection to the database failed due to" . mysqli_connect_error());
    
 }

 // collect post variable

 $name=$_POST['name'];
 $gender=$_POST['gender'];
 $age=$_POST['age'];
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $desc=$_POST['desc'];

 
 $sql=" INSERT INTO `travel`.`travel` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
 
 // execute the query

 if($con->query($sql)== true){

    // flag for successful insertion

    $insert = true;
 }
 else{
    echo "ERROR: $sql <br> $con->error";
    
 }
 
 // close database connection

 $con->close();
}



    




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcomme to Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="pg" src="pg.jpg" alt="GIET KHORDA">

    <div class="container">
        <h1>Welcome To GIET US Trip Form</h1>
        <p>Enter your Detail and submit this form To Confirm Your Participation in The Trip</p>
        <?php
         if($insert==true){

         echo "<p class='submitMsg'>Thanks For submitting your form we are happy to see you joininng for the us trip</p>";
          }
        ?>
        
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
            <input type="email" name="email" id="email" placeholder="Enter Your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone Number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other details here"></textarea>
            <button class="btn">Submit</button>
           
        </form>


    </div>
    <script src="index.js"></script>
    
</body>
</html>