jQuery(document).ready(function ($) {

    let sendBtn = $('#form_submit');

    sendBtn.click(function (event) {
        event.preventDefault();

        let firstName = $('#form_first_name');
        let lastName = $('#form_last_name');
        let phone = $('#form_tel');
        let message = $('#form_message');

        let successMessageContainer = $('#success-message');
        let errorMessageContainer = $('#error-message');

        if (firstName.val().trim() === '') {
            firstName.addClass('error');
            return;
        } else {
            firstName.removeClass('error');
        }

        if (lastName.val().trim() === '') {
            lastName.addClass('error');
            return;
        } else {
            lastName.removeClass('error');
        }

        if (phone.val().trim() === '') {
            phone.addClass('error');
            return;
        } else {
            phone.removeClass('error');
        }

        if (message.val().trim() === '') {
            message.addClass('error');
            return;
        } else {
            message.removeClass('error');
        }


        let formData = {
            action: 'ajax_mail_form_callback',
            firstName: firstName.val(),
            lastName: lastName.val(),
            phone: phone.val(),
            message: message.val()
        };

        console.log(formData);

        $.ajax({
            url: lets.ajax_url,
            method: 'POST',
            data: formData,
            success: function (response) {
                // console.log(response);
                successMessageContainer.text("Thank you, sending complete");

            },
            error: function (xhr, status, error) {
                // console.error(xhr.responseText);
                errorMessageContainer.text("Ops, please send again");
            }
        });

        $('#form')[0].reset();
    });
});