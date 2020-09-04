<?php require("include/check_auto.php");
      require("block/header.php");?>
    <div class=" mb-2">
        <h1 class="text-center  text-dark">leave a comment</h1>
    </div>
    <div>
        <form action="" method="post">
            <textarea class=" row  ml-1 form-control border-dark border" id="comment" name="text" rows="10" cols="70"></textarea>
            <button class=" row col-2 offset-10 mb-3 mt-3 btn btn-success" name="submit" id="main_submit" type="submit"><strong>Send</strong></button>
        </form>
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Reply to comment</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <textarea class="form-control border-dark border" id="modal_comment" name="text" rows="10" cols="70"></textarea>
                </div>
                <div class="modal-footer">
                    <form action="" method="post">
                        <button type="submit"   id="modal_button" class="btn btn-success" data-dismiss="modal"><strong>Send</strong></button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><strong>Close</strong></button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="pb-5" id="comment_list">
    </div>
    <script src="js/comment.js"></script>
<?php require("block/footer.php");?>