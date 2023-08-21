<?php

include "classes/connect.php";
include "classes/signup.php";

$first_name = "";
$last_name = "";
$gender = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $signup = new Signup();
    $result = $signup->evaluate($_POST); //print_r($_POST);this data we are getting

    // echo $result; //by this we can see all vallidation

    if ($result != "") {
        echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
        echo "The following errors has occoured</br></br>";
        echo $result;
        echo "</div>";
    }
    else {
        //if everything went well then redirct to login page
        header("Location: login.php");
        die();
    }
    //below value is using to show the selected value in form
    $first_name = $_POST['first_name'] ;
    $last_name = $_POST['last_name'];
    $gender =    $_POST['gender']; ;  
    $email =     $_POST['email'];;
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CHATBOOK | Login</title>

<style>
#bar{
height:100px;
background-color:#8e44ad;
color:white;
padding: 4px;

}

#signup_button{
background-color: green;
width: 70px;
text-align: center;
padding:5px;
border-radius: 5px;
float:right;

}


#bar2{
background-color:white;width:800px;height:520px;margin:auto;margin-top:50px;
padding: 10px;
text-align: center;
padding-top: 50px;
font-weight: bold;
}

*{
    margin: 0;
    padding: 0;
}

#text{
height: 40px;
width: 300px;
border-radius: 4px;
border: solid 1px #bbb;
padding: 4px;
font-size: 14px;
}

#button{
height: 40px;
width: 300px;
border-radius: 4px; 
border:none;
background-color:#8e44ad;
color: white;
font-weight: bold;

}
</style>

</head>
<body style="font-family:Tahoma;background-color:#e9ebee ">

<div id="bar">
<div style="font-size:40px;">ChatBook</div>
<div id="signup_button">Login</div>
</div>

<!--  -->

<div id="bar2">
Signup in to ChatBook <br><br>
<form action="" method="post">
<input value="<?php echo $first_name?>"  name="first_name" value="" type="text" id="text" placeholder="First name"> <br><br>

<input  name="last_name"  value="<?php echo $last_name?>"   type="text" id="text" placeholder="Last name"> <br><br>

<span style="font-weight: normal;margin-right:240px;">Gender:</span> <br>
<select id="text" name="gender">
<option selected ><?php echo $gender?></option>
<option value="Male">Male</option>
<option value="Female">Female</option>

</select><br><br>

<input type="text" id="text" placeholder="Email" name="email" value="<?php echo $email?>"> <br><br>

<input type="password" id="text" placeholder="Password" name="password"> <br><br>

<input name="password2" type="password" id="text" placeholder="Retype Password"> <br><br>


<input type="submit" id="button" value="Sign up">
</form>
</div>

</body>
</html>