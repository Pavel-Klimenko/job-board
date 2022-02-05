$( document ).ready(function() {
    $("#edit_personal_info").click(function() {
        showEditPersonalDataForm();
    });

    $(".edit_vacancy").click(function() {
        showEditVacancyForm();
    });




    $('#user-image').change(function() {
        let filename = $('#user-image').val();
        $('.uploaded-file').html('File added: ' + filename);
        $('#sendButton').show();
    });

});



function showEditVacancyForm() {
    $('.blog_details, .add_vacancy_button').hide();
    $('.blog_details.edit-form').show();
}





function showEditPersonalDataForm() {
    $('#edit_personal_info').hide();
    $('.blog_details.user-info').hide();

    $('#save_personal_info').show();
    $('.blog_details.edit-form').show();
}