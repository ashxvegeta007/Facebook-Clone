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


// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # code...
  

    if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
        # code...
       

        if($_FILES['file']['type'] == "image/jpeg") {
            # code...
            $allowedSize = (1024 * 1024 )*3;
            if ($_FILES['file']['size'] < $allowedSize) {
                # code...
                //evevything is fine
                $folder = "uploads/".$user_data['userid']."/";

                if (!file_exists($folder)) {
                    mkdir($folder,0777,true);
                }

                $image = new Image();

                $filename = $folder. $image->generate_filename(15).".jpg";
                move_uploaded_file($_FILES['file']['tmp_name'],$filename);
            
                
                
                $change =  "profile";
                
                    if(isset($_GET['change'])){
                       $change = $_GET['change'];
                      
                    }

                    
                
                if ($change=="cover") {
                if (file_exists($user_data['cover_image'])) {
                    unlink($user_data['cover_image']);
                }
                $image->resize_image($filename,$filename,1500,1500);

                }
                else{
                    if (file_exists($user_data['profile_image'])) {
                        unlink($user_data['profile_image']);
                    }   
                $image->resize_image($filename,$filename,1500,1500);

                }

                if (file_exists($filename)) {
                    
                    $user_id = $user_data['user_id'];
                    
                    
 
                    if($change == "cover"){
                        $query = "UPDATE users SET  cover_image = '$filename' WHERE user_id = '$user_id' limit 1";
                        $_POST['is_cover_image'] = 1;
                    }
                    else{
                        $query = "UPDATE users SET  profile_image = '$filename' WHERE user_id = '$user_id' limit 1";
                        $_POST['is_profile_image'] = 1;
                    }

            
                    $DB = new Database();
                    $DB->save($query);

                    //create a post

                    $post = new Post();

                
                  
                    $result =  $post->create_post($user_id,$_POST,$filename);

                    header("Location: profile.php"); 
                    die();
                }
            }
            else{
                echo "Only size of of 3mb or lover are allowed";
            }
        }
        else{
            echo "Only image of jpeg type are allowed.";
        }
   

    }
    else{
        echo "Pleae upload a valid image file.";
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chage Profile Image</title>

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

<!-- post area -->
<div
 style="min-height:400px;flex:2.5;padding:50px;padding-right:0px;">
<form method="post" enctype="multipart/form-data">
<div style="border:solid thin #aaa; padding:10px;background-color:white;" >
<input type="file" name="file" >
<input type="submit" id="post_button" value="Change" style="padding:5px;width:100px;">
<br>

<div style="text-align: center;margin-top:10px;">
<?php

if(isset($_GET['change']) && $_GET['change'] == 'cover'){
    $change = 'cover';
    echo "<img src='$user_data[cover_image]' style='max-width:200px;'>";
      
}else{
    echo "<img src='$user_data[profile_image]' style='max-width:200px;'>";
}


?>
</div>
</div>
</form>

<!-- posts -->





<!--  -->
</div>
</div>


</div>

</body>

</html>