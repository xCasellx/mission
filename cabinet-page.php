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
                <label> <strong>Name: </strong><?php echo $user["first_name"];?> </label>
                <a href="#" data-toggle='modal' data-target='#myModal' class="edit-data float-right text-success" id="edit-first_name">edit</a><br>
                <label><strong>Surname: </strong><?php echo $user["second_name"];?> </label>
                <a href="#" data-toggle='modal' data-target='#myModal' class="edit-data float-right text-success" id="edit-second_name">edit</a><br>
                <label><strong>Number: </strong><?php echo $user["number"];?> </label>
                <a href="#" data-toggle='modal' data-target='#myModal' class="edit-data float-right text-success" id="edit-number">edit</a><br>
                <label><strong>Date: </strong><?php echo $user["date"];?> </label>
                <a href="#" data-toggle='modal' data-target='#myModal' class="edit-data float-right text-success" id="edit-date">edit</a><br>
                <label><strong>Town: </strong><?php echo $user["town"];?> </label>
                <a href="#" data-toggle='modal' data-target='#myModal' class="edit-data float-right text-success" id="edit-town">edit</a><br>
                <label><strong>Email address: </strong><?php echo $user["email"];?> </label>
                <a href="#" data-toggle='modal' data-target='#myModal' class="edit-data float-right text-success" id="edit-email">edit</a><br>
                <div class="mt-3 bg-dark rounded p-1" ></div>
                    <a href="#" id="open-edit-data" class="float-right text-success mr-2 " style="text-decoration: none"><strong>Edit</strong></a>
                    <a href="#" id="cancel-edit-data" class="float-right text-success mr-2 " style="text-decoration: none; display: none;"><strong>Cancel</strong></a>
            </div>
        </div>
    </div>
    <div class="modal modal_reset" id="myModal">
        <div class=" modal-dialog" >
            <div class="modal-content" id="modal_no_reset">
                <div class=" text-center modal-header">
                    <h4 class=" modal-title">Edit</h4>
                </div>
                <div class="modal-body">
                    <input type="date" class="form-control input-edit" id="input-date" style="display: none">
                    <input type="number" class="form-control input-edit" id="input-number" style="display: none">
                    <input type="text" class="form-control input-edit" id="input-modal" style="display: none" >
                </div>
                <div class="modal-footer">
                        <button type="button"  id="save_button" class="btn btn-success" data-dismiss="modal"><strong>Save</strong></button>
                        <button type="button"  class="modal_reset btn btn-danger" data-dismiss="modal"><strong>Close</strong></button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/edit.js"></script>
<?php require("block/footer.php");?>




