$( document ).ready(function() {
    $("#edit_personal_info").click(function() {
        showEditForm();
    });

    $('#user-image').change(function() {
        let filename = $('#user-image').val();
        $('.uploaded-file').html('File added: ' + filename);
        $('#sendButton').show();
    });

});


function showEditForm() {
    $('#edit_personal_info').hide();
    $('.blog_details.user-info').hide();

    $('#save_personal_info').show();
    $('.blog_details.edit-form').show();
}