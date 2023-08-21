
<?php

session_start();
// print_r($_SESSION);
// unset($_SESSION['mybook_userid']);

include "classes/connect.php";
include "classes/login.php";
include "classes/user.php";
include "classes/post.php";
include "classes/image.php";

//check if user is logged in
// isset($_SESSION['mybook_userid']);
$login = new Login();
$user_data =  $login->checklogin($_SESSION['mybook_userid']);


//posting starts from here

if($_SERVER['REQUEST_METHOD']=='POST'){
    
  
    $post = new Post();
    $id = $_SESSION['mybook_userid'];
    $result =  $post->create_post($id,$_POST,$_FILES);

    

    if ($result == "") {
        header("Location: profile.php");
        die;
    }
    else{
        echo $result;
    }
 
}

//collects posts

$post = new Post();
$id = $_SESSION['mybook_userid'];
$posts =  $post->get_posts($id);

//collect frinds 

$user = new User();
$id = $_SESSION['mybook_userid'];
$friends =  $user->get_friends($id);


$image_class = new Image();







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
margin-top: -200px;
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
background-color: white;
min-height: 400px;
margin-top: 20px;
color: #aaa;
padding: 8px;

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

<div style="background-color:white;text-align:center;color:#ff00b3">

<?php
$image = "images/avatar-male.jpg";
if(file_exists($user_data['cover_image'])){
    $image =  $image_class->get_thumb_cover($user_data['cover_image']);
}
?>

<img src="<?php echo $image; ?>" alt="" srcset="" style="width: 100%;">
<span style="font-size:11px;">
<?php
$image = "images/avatar-male.jpg";
if ($user_data['gender']== "Female") {
    # code...
    $image = "images/Female-Avatar.png";
}
if(file_exists($user_data['profile_image'])){
    $image =$image_class->get_thumb_cover($user_data['profile_image']);
}
?>
<img src="<?php echo $image; ?>" alt="NAME" id="profile_pic"><br>
<a href="change_profile_image.php?change=profile" style="text-decoration:none;color:#ff00b3">Change Profile Image</a>   |
<a href="change_profile_image.php?change=cover" style="text-decoration:none;color:#ff00b3">Change Cover</a>
</span>
<br>
<div style="font-size:30px;"><?php echo $user_data['first_name']. " ".$user_data['last_name']?></div>
<br>
<a href="index.php"><div id="menu_buttons">Timeline</div></a>
<div id="menu_buttons">About</div>
<div id="menu_buttons">Friends</div>
<div id="menu_buttons">Photos</div>
<div id="menu_buttons">Settings</div>

</div>


<!-- Below cover area -->
<div style="display:flex;">
<!-- friends area -->
<div style="min-height:400px;flex:1;">
    <div id="friends_bar">
        Friends</br>

        <?php

if($friends){
    foreach($friends as $FRIEND_ROW){
       
        include("user.php");
    }
}

?>    

  

    </div>
</div>
<!-- post area -->
<div
 style="min-height:400px;flex:2.5;padding:20px;padding-right:0px;">
<div style="border:solid thin #aaa; padding:10px;background-color:white;" >
<form action="" method="POST" enctype="multipart/form-data">
    <textarea name="post" placeholder="What's going on your mind"></textarea>
    <input type="file" name="file">
    <input type="submit" id="post_button" value="Post">
<br>
</form>
</div>

<!-- posts -->



<div id="post_bar">
    <!-- post1 -->
<?php

if($posts){
    foreach($posts as $ROW){
        $user = new User();
        $ROW_USER = $user->get_user($ROW['userid']);
        include("post.php");
    }
}

?>

<!-- post2 -->


<!-- 3 -->



<!-- 4 -->



</div>

<!--  -->
</div>
</div>


</div>

</body>

</html>