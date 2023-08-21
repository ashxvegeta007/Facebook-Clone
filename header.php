<?php
$corner_image = "images/avatar-male.jpg";
if (isset($user_data)) {
    # code...
    $image_class = new Image();
    // $corner_iamge = $user_data['profile_image'];
    $corner_iamge =$image_class->get_thumb_cover($user_data['profile_image']);
}

?>


<div id="blue_bar">
<div style="width:800px;margin:auto;font-size:30px;">
<a href="index.php" style = "color:white;text-decoration:none;">ChatBook</a>  
&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="searchbox" placeholder="Search for Profile">
<a href="profile.php">
<img src="<?php echo $corner_iamge ?>" alt="" height="50px;" style="float:right;border-radius:50%;">
</a>
<a href="logout.php">
<span style=font-size:12px;float:right;margin:10px;color:red;>Logout</span>
</a>
</div>

</div>