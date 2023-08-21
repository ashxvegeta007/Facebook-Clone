<?php
session_start();
// print_r($_SESSION);
// unset($_SESSION['mybook_userid']);

include "classes/connect.php";
include "classes/login.php";
include "classes/user.php";
include "classes/post.php";

//check if user is logged in
// isset($_SESSION['mybook_userid']);
$login = new Login();
$user_data =  $login->checklogin($_SESSION['mybook_userid']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profile</title>

<style>
body {
padding: 0;
margin: 0;
}

#blue_bar {
background-color: #8e44ad;
height: 50px;
color: white;

}

#searchbox {
width: 400px;
height: 20px;
border-radius: 5px;
border: none;
padding: 4px;
font-size: 14px;
background-image: url(search.png);
background-repeat: no-repeat;
background-position: right;
}

#profile_pic {
width: 150px;

border-radius: 50%;
border: 2px solid white;
}

#menu_buttons {
width: 100px;

display: inline-block;
margin: 2px;
}

#friends_img {
width: 75px;
float: left;
margin: 8px;
}

#friends_bar {

min-height: 400px;
margin-top: 20px;
color: #aaa;
padding: 8px;
text-align: center;
font-size: 20px;
color: #ff00b3;

}

#friends {
clear: both;
font-size: 12px;
font-weight: bold;
color: #ff00b3;
}

textarea{
    width:100%;
    border:none;
    font-family: tahoma;
    font-size: 14px;
    height: 60px;
}

#post_button{
    float: right;
    background-color: #ff00b3;
    border: none;
    color: #fff;
    padding: 4px;
    font-size: 14px;
    border-radius: 2px;
    width: 50px;
}

#post_bar{
    background-color: white;
    margin-top: 20px;
    padding-top: 10px;
}
#post{
    padding: 4px;
    font-size:13px;
    display: flex;
    margin-bottom: 20px;
}
</style>

</head>

<body style="font-family: tahoma;background-color:#d0d8e4">
<!-- top bar -->
<?php include('header.php')?>

<!-- cover area -->
<div style="width:800px;margin:auto;min-height:400px;">




<!-- Below cover area -->
<div style="display:flex;">
<!-- friends area -->
<div style="min-height:400px;flex:1;">
    <div id="friends_bar">
        <img src="Emma-Watson.jpg" alt="" id="profile_pic">

    <br>
  <a href="profile.php" style="text-decoration:none;"><?php echo $user_data['first_name']."<br>".$user_data['last_name'] ?></a>  

    </div>
</div>
<!-- post area -->
<div
 style="min-height:400px;flex:2.5;padding:20px;padding-right:0px;">
<div style="border:solid thin #aaa; padding:10px;background-color:white;" >
<textarea placeholder="What's going on your mind"></textarea>
<input type="submit" id="post_button" value="Post">
<br>
</div>

<!-- posts -->



<div id="post_bar">
    <!-- post1 -->
<div id="post">
<div>
    <img src="user1.jpg" alt="" style="width:75px;margin-right:4px;">
</div>
<div>
    <div style="font-weight:bold;color:#8e44ad">First Guy</div>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe distinctio quo nulla aut tenetur eum voluptate quidem officiis doloribus corrupti. Voluptatem dicta magnam, nam fugit facilis et adipisci aut expedita!
<br><br>

<a href="">Like</a>.
<a href="">Comment</a>.
<span style="color:#999">April 23 2022</span>

</div>

</div>

<!-- post2 -->

<div id="post">
<div>
    <img src="user1.jpg" alt="" style="width:75px;margin-right:4px;">
</div>
<div>
    <div style="font-weight:bold;color:#8e44ad">First Guy</div>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe distinctio quo nulla aut tenetur eum voluptate quidem officiis doloribus corrupti. Voluptatem dicta magnam, nam fugit facilis et adipisci aut expedita!
<br><br>

<a href="">Like</a>.
<a href="">Comment</a>.
<span style="color:#999">April 23 2022</span>

</div>

</div>
<!-- 3 -->

<div id="post">
<div>
    <img src="user1.jpg" alt="" style="width:75px;margin-right:4px;">
</div>
<div>
    <div style="font-weight:bold;color:#8e44ad">First Guy</div>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe distinctio quo nulla aut tenetur eum voluptate quidem officiis doloribus corrupti. Voluptatem dicta magnam, nam fugit facilis et adipisci aut expedita!
<br><br>

<a href="">Like</a>.
<a href="">Comment</a>.
<span style="color:#999">April 23 2022</span>

</div>

</div>

<!-- 4 -->

<div id="post">
<div>
    <img src="user1.jpg" alt="" style="width:75px;margin-right:4px;">
</div>
<div>
    <div style="font-weight:bold;color:#8e44ad">First Guy</div>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe distinctio quo nulla aut tenetur eum voluptate quidem officiis doloribus corrupti. Voluptatem dicta magnam, nam fugit facilis et adipisci aut expedita!
<br><br>

<a href="">Like</a>.
<a href="">Comment</a>.
<span style="color:#999">April 23 2022</span>

</div>

</div>

</div>

<!--  -->
</div>
</div>


</div>

</body>

</html>