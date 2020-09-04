$(document).ready(function() {
    $.post('../module/comment_load.php',
        function(data) {
            $('#comment_list').append(data);
        });
    $(document).on("click","#main_submit",function () {
        let text = $("#comment").val();
        $.post('/module/comment_add.php',
            {   comment: text });
    });
    let comment_id;
    $(document).on("click",".comment_id",function () {
        comment_id = $(this).attr('id');
    });
    $(document).on("click","#modal_button",function () {
        let text = $("#modal_comment").val();
        $.post('/module/comment_add.php',
            {   comment: text,
                comment_id: comment_id
            },document.location.reload(true));
    });
    return false;
})