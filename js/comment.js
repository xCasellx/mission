$(document).ready(function(){
    $.post('../module/comment_load.php',
        function(data) {
            $('#comment_list').append(data);
        });
    $(document).on("click","#main_submit",function () {
        let text = $("#comment").val();
        $.post('/module/comment_add.php',
            {   comment: text });
    });
    $(document).on("click",".comment_id",function (){
        let comment_id = $(this).attr('id');
        $(document).on("click","#modal_button",function (){
            let text = $("#modal_comment").val();
            $.post('/module/comment_add.php',
                {   comment: text,
                    comment_id: comment_id
                });
        })
    });
    return false;
})