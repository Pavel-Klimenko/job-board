$( document ).ready(function() {
    $("#edit_personal_info").click(function() {
        showEditPersonalDataForm();
    });

    $(".edit_vacancy").click(function() {
        let vacancyId = $(this).data('vacancy-id');
        console.log(vacancyId);

        showEditVacancyForm(vacancyId);
    });




    $('#user-image').change(function() {
        let filename = $('#user-image').val();
        $('.uploaded-file').html('File added: ' + filename);
        $('#sendButton').show();
    });

});



function showEditVacancyForm(vacancyId) {

    $.ajax({
        type:'POST',
        url:'/ajax/get-vacancy',

        data: {
            "_token": $(`#token_for_vacancy_${vacancyId}`).val(),
            "ID": vacancyId
        },

        success:function(data){
            console.log(data);
            //$("#msg").html(data.msg);


            console.log(data.vacancy.NAME);


            $('.blog_details, .add_vacancy_button').hide();
            $('.blog_details.edit-form').show();


            //filling vacancy form
            $('.edit_vacancy .vacancy.NAME').val(data.vacancy.NAME);
            $('.edit_vacancy .vacancy.COUNTRY').val(data.vacancy.COUNTRY);
            $('.edit_vacancy .vacancy.CITY').val(data.vacancy.CITY);

            $('.edit_vacancy .vacancy.SALARY_FROM').val(data.vacancy.SALARY_FROM);

            $('.edit_vacancy .vacancy.DESCRIPTION').html(data.vacancy.DESCRIPTION);


            //TODO: списком сделать!
            $('.edit_vacancy .vacancy.RESPONSIBILITY').html(data.vacancy.RESPONSIBILITY);
            $('.edit_vacancy .vacancy.QUALIFICATIONS').html(data.vacancy.QUALIFICATIONS);


            $('.edit_vacancy .vacancy.BENEFITS').html(data.vacancy.BENEFITS);



        }
    });



}





function showEditPersonalDataForm() {
    $('#edit_personal_info').hide();
    $('.blog_details.user-info').hide();

    $('#save_personal_info').show();
    $('.blog_details.edit-form').show();
}