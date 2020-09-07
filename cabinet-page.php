<?php
    require("include/check_auto.php");
    require("include/bd.php");
    $id= $_SESSION["auto_user"];
    $res = $db->query("SELECT * FROM `user` WHERE `id`= '$id' ");
    $user = $res->fetch_assoc();
?>
<?php require("block/header.php");?>
    <div class="card ">
        <div class="text-center  bg-dark text-light card-header"><strong>User information</strong></div>
        <div class="row bg-transparent card-body ">
            <div class="col">
                <img class="rounded  img-fluid img" src="/image/nan.png" style="width: 480px;height: 480px;" alt="">
            </div>
            <div class="col border-left border-dark">
                <strong>Name: </strong><label id="user_first_name"> <?php echo $user["first_name"];?> </label>
                <a href="#" data-toggle='modal' data-target='#myModal' class="edit-data float-right text-success" id="edit-first_name">edit</a><br>
                <strong>Surname: </strong><label id="user_second_name"><?php echo $user["second_name"];?> </label>
                <a href="#" data-toggle='modal' data-target='#myModal' class="edit-data float-right text-success" id="edit-second_name">edit</a><br>
                <strong>Number: </strong><label id="user_number"><?php echo $user["number"];?> </label>
                <a href="#" data-toggle='modal' data-target='#myModal' class="edit-data float-right text-success" id="edit-number">edit</a><br>
                <strong>Date: </strong><label id="user_date"><?php echo $user["date"];?> </label>
                <a href="#" data-toggle='modal' data-target='#myModal' class="edit-data float-right text-success" id="edit-date">edit</a><br>
                <strong>Town: </strong><label id="user_town"><?php echo $user["town"];?> </label>
                <a href="#" data-toggle='modal' data-target='#myModal' class="edit-data float-right text-success" id="edit-town">edit</a><br>
                <strong>Email address: </strong><label id="user_email"><?php echo $user["email"];?> </label>
                <a href="#" data-toggle='modal' data-target='#myModal' class="edit-data float-right text-success" id="edit-email">edit</a><br>
                <a href="#" data-toggle='modal' data-target='#myModal' class="edit-data float-right text-success" id="edit-password">edit password</a><br class="edit-data">
                <a href="#" data-toggle='modal' data-target='#myModal' class="edit-data float-right text-success" id="edit-image">edit image</a><br class="edit-data">
                <div class="mt-3 bg-dark rounded p-1" ></div>
                    <a href="#" id="open-edit-data" class="float-right text-success mr-2 " style="text-decoration: none">Edit</a>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal">
        <div class=" modal-dialog" >
            <div class="bg-dark modal-content p-0" >
                <div class="text-center text-light modal-header">
                    <div class="container">
                        <h4 id="modal-title-h" class="modal-title">Edit</h4>
                    </div>
                </div>
                <div class="bg-light modal-body" >
                        <div class="container" align="center">
                                <label class="text-danger" id="error-msg" style="display: none"></label>
                                <input type="date"  max="<?php echo (date('Y')-5).date('-m-d')?>" class="form-control border-dark border input-text input-edit" id="input-date" style="display: none">
                                <input type="email" class="form-control border-dark border input-text input-edit" id="input-email" style="display: none">
                                <input type="text" class="form-control border-dark border input-text input-edit" id="input-number" style="display: none" pattern="[0-9]{10,15}">
                                <input type="text" class="form-control border-dark border input-text input-edit" id="input-modal" style="display: none" >
                                <input type="file" class="input-edit input-text" style="display: none;" id="input-image" accept="image/jpeg,image/png,image/gif">
                                <div class="input-edit " id="div-password" style="display: none;">
                                    <input type="password" class="mt-2 input-text border-dark border form-control" placeholder="Password"  id="input-password">
                                    <input type="password" class="mt-2 input-text border-dark border form-control" placeholder="New password"  id="input-new-password">
                                    <input type="password" class="mt-2 input-text border-dark border form-control" placeholder="Confirm password" id="input-confirm-password">
                                </div>
                        </div>
                </div>
                <div class="p-1 bg-dark modal-footer">
                        <button type="button"  id="save_button" class="btn btn-outline-success" ><strong>Save</strong></button>
                        <button type="button"  class="btn btn-outline-danger" data-dismiss="modal"><strong>Close</strong></button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/edit.js"></script>
<?php require("block/footer.php");?>




