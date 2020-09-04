$(document).ready(function () {
    $(document).on("click","#open-edit-data",function () {
        $(".edit-data").css("display", "block");
        $("#open-edit-data").css("display", "none");
        $("#cancel-edit-data").css("display", "block");

    });
    $(document).on("click","#cancel-edit-data",function () {
        $(".edit-data").css("display", "none");
        $("#cancel-edit-data").css("display", "none");
        $("#open-edit-data").css("display", "block");

    });
    let edit_component;
    $(document).on("click",".edit-data",function () {
        edit_component = $(this).attr('id');
        edit_component = edit_component.replace("edit-","");
        switch (edit_component) {
            case "date":
                $("#input-date").css("display", "block");
                break;
            case "number":
                $("#input-number").css("display", "block");
                break;
            case "email":
                $("#input-email").css("display", "block");
                break;
            case "password":
                $("#div-password").css("display", "block");
                break;
            default :
                $("#input-modal").css("display", "block");

        }
    });
    $(document).on("click","#save_button",function () {
        let edit_text;
        switch (edit_component){
            case "date":
                edit_text= $("#input-date").val();
                break;
            case "number":
                edit_text= $("#input-number").val();
                break;
            default :
                edit_text= $("#input-modal").val();
                break;
        }
        $.post("../module/edit-data.php",{
            component: edit_component,
            edit_text :edit_text
        },function (data) {
            if(data.indexOf("Error:")!=-1) {
                switch (edit_component) {
                    case "date":
                        edit_text= $("#input-date").addClass("alert-danger");
                        break;
                    case "number":
                        edit_text= $("#input-number").addClass("alert-danger");
                        break;
                    default :
                        edit_text= $("#input-modal").addClass("alert-danger");
                        break;
                }
            }
            else {
                document.location.reload(true);
            }
            return false;
        });
    });
    $('#myModal').on('hide.bs.modal', function() {
        edit_component="";
        $(".input-edit").val("");
        $(".input-edit").css("display", "none");
    });
    return false;
});