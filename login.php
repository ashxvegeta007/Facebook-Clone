

<?php

session_start();

include "classes/connect.php";
include "classes/login.php";

$email = "";
$password = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = new Login();
    $result = $login->evaluate($_POST); //print_r($_POST);this data we are getting

    // echo $result; //by this we can see all vallidation

    if ($result != "") {
        echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
        echo "The following errors has occoured</br></br>";
        echo $result;
        echo "</div>";
    }
    else {
        //if everything went well then redirct to profile page
        header("Location: profile.php");
        die();
    }
    //below value is using to show the selected value in form
   
    $email =     $_POST['email'];
    $password =  $_POST['password'];
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
background-color:white;width:800px;height:300px;margin:auto;margin-top:50px;
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
<div id="signup_button">signup</div>
</div>

<!--  -->

<div id="bar2">

<form method="post">
Log in to ChatBook <br><br>
<input name="email" type="text" value="<?php echo $email?>" id="text" placeholder="Email"> <br><br>
<input name="password" type="password"  value="<?php echo $password?>"   id="text" placeholder="Password"> <br><br>

<input type="submit" id="button" value="Log in">
</form>
</div>

</body>
</html>