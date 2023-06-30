<?php
$insert = false;
if(isset($_POST['name'])){
$server="localhost";
$username="root";
$password="";

$con=mysqli_connect($server, $username, $password);
if (!$con){
    die("Connection to this databse failed due to" . 
    mysqli_connect_error());
}
//echo("Success connecting to db");


$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];

$sql="INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

if($con->query($sql)==true){
   // echo"successfully inserted";

   $insert = true;
}
else{
    echo "Error : $sql <br> $con->err";
}

$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
<h1>Welcome to Rajasthan Trip</h1>
<p>Fill the form to confirm your participation in the Trip</p>
<?php
if($insert == true){
echo "<p class='submitMsg'>Thanks for filling the form. We are happy to see you joining for the Rajashthan trip.</p>";
}
?>
<form action="index.php" method="post">
<input type="text" name="name" id="name" placeholder="Enter your Name">
<input type="text" name="age" id="age" placeholder="Enter your Age">
<input type="text" name="gender" id="gender" placeholder="Enter your Gender">
<input type="email" name="email" id="email" placeholder="Enter your Email">
<input type="phone" name="phone" id="phone" placeholder="Enter your Phone">
<textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
<div class="button">
<button class="btn">Submit</button>
<button class="btn">Reset</button>
</div>
</form> 

    </div>
    <script src="index.js"></script>
</body>
</html>