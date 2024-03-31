<?php
add_action('wp_ajax_ajax_mail_form_callback', 'mail_form_callback');
add_action('wp_ajax_nopriv_ajax_mail_form_callback', 'mail_form_callback');

function mail_form_callback(): void
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $first_name = sanitize_text_field($_POST['firstName']);
        $last_name = sanitize_text_field($_POST['lastName']);
        $phone = sanitize_text_field($_POST['phone']);
        $message = sanitize_text_field($_POST['message']);
        sending_letter_mail($first_name, $last_name, $phone, $message);
        wp_send_json_success();
    } else {
        wp_send_json_error("Sorry, request data not corrected");
    }
}



function sending_letter_mail($first_name, $last_name, $phone, $user_message): void
{
    $message = generate_message($first_name, $last_name, $phone, $user_message);
    $subject = 'New mail - Kyrylo Nizhnyk Test Task';
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>',
    );
    send_message($message, $subject, $headers);
}

function send_message(string $message, string $subject, array $headers): void
{
    $mail_list = get_field('mail_list', "options");
    if ($mail_list) {
        foreach ($mail_list as $email) {
            wp_mail($email['mail'], $subject, $message, $headers);
        }
    }
}

function generate_message($first_name, $last_name, $phone, $user_message) : String {
     $message = "First name: $first_name\n";
    $message .= "Last name: $last_name\n";
    $message .= "Phone: $phone\n";
    $message .= "Message: $user_message\n";
    return $message;
}


