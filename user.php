<div id="friends">

<?php
    $image = "images/avatar-male.jpg";
    if($FRIEND_ROW['gender'] == "Female"){
        $image ="images/Female-Avatar.png";
    }
    ?>
            <img src="<?php echo $image?>" id="friends_img">
            <br>
            <!-- Second User -->

            <?php echo $FRIEND_ROW['first_name']." ".$FRIEND_ROW['last_name']?>
        </div>