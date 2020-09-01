<?php
    require("include/check_auto.php");
    require("include/bd.php");
    $id= $_SESSION["auto_user"];
    $res = $db->query("SELECT * FROM `user` WHERE `id`= '$id' ");
    $user = $res->fetch_assoc();
?>
<? require("block/header.php");?>
    <div class="row p-5">
        <div class="col">
            <img class=" img-fluid img" src="/image/nan.png" alt="">
        </div>
        <div class="col">
            <label> <strong>Name: </strong><?php echo $user["first_name"];?> </label><br>
            <label><strong>Surname: </strong><?php echo $user["second_name"];?> </label><br>
            <label><strong>Number: </strong><?php echo $user["number"];?> </label><br>
            <label><strong>Date: </strong><?php echo $user["date"];?> </label><br>
            <label><strong>Town: </strong><?php echo $user["town"];?> </label><br>
            <label><strong>Email address: </strong><?php echo $user["email"];?> </label><br>
        </div>
    </div>
<? require("block/footer.php");?>




