

<div id="post" >
<div>
    <?php
    
    $image = "images/avatar-male.jpg";
    if($ROW_USER['id'] == "Female"){
        $image ="images/Emma-Watson.jpg";
    }
    ?>
    <img src="<?php echo $image?>" alt="" style="width:75px;margin-right:4px;">
</div>
<div style="width: 100%;">
    <div style="font-weight:bold;color:#8e44ad;width:100%;">

<?php echo $ROW_USER['first_name']." ".$ROW_USER['last_name'];

if ($ROW['is_profile_image']) {
    # code...

    $pronoun = "his";
    if ($ROW_USER['gender'] == "Female") {
        # code...
        $pronoun = "her";
    }

echo "<span style='font-weight:normal;color:#aaa'>  Updated $pronoun profile image</span>";

}


if ($ROW['is_cover_image']) {
    # code...

    $pronoun = "his";
    if ($ROW_USER['gender'] == "Female") {
        # code...
        $pronoun = "her";
    }

echo "<span style='font-weight:normal;color:#aaa'>  Updated $pronoun cover image</span>";

}
?>

</div>
    <?php echo $ROW['post']?>
    <br><br>

    <?php 

    // if (file_exists($ROW['image'])) {
    //     # code...

    //     $post_image =   $image_class->get_thumb_post($ROW['image']);

    //     var_dump($post_image);           // Debugging statement
    //     var_dump($post_image_thumb); 
     
    //     echo "<img src='$post_image' / style='width: 90%;height:300px;'>";
    // }

    // if (!empty($ROW['image'])) {
    //     $post_image = $ROW['image'];
    //     echo "<img src='$post_image' style='width: 90%; height: 300px;'>";
    // }
    
    
    if (!empty($ROW['image'])) {
        $post_image = trim($ROW['image']); // Trim the file path to remove whitespace
    
        // Debugging statements
      
    
        if (file_exists($post_image)) {
            echo "<img src='$post_image' style='width: 90%; height: 300px;'>";
        } 
    }
    
    ?>

<br><br>

<a href="">Like</a>.
<a href="">Comment</a>.
<span style="color:#999;" >
<!-- April 23 2022 -->
<?php echo $ROW['date']?>


</span>



<span style="color:#999;float:right" >
<!-- April 23 2022 -->

Edit.Delete


</span>



</div>

</div>