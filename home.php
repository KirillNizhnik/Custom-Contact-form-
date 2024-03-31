<?php
/*
 * Template Name: Home
*/
get_header();
?>


    <main>

        <section class="form" id="ajax_form">
            <div class="container">
                <div class="form-inner">
                    <div class="form-inner-wrap">
                        <h2 class="form-inner-wrap-title">Mail form</h2>
                        <form class="form-flex" id="form" action="" method="POST">
                            <input class="form-input" type="text" id="form_first_name" name="name" placeholder="First name*"
                                   required>

                            <input class="form-input" type="text" id="form_last_name" name="name" placeholder="Last name*"
                                   required>

                            <input class="form-input" type="text" id="form_tel" name="phone"
                                   placeholder="Your Phone*" required>


                            <textarea class="form-input textarea" id="form_message" name="message"
                                      placeholder="Message*" rows="4" required
                                      cols="50"></textarea>

                            <div class="form-btn">
                                  <input id="form_submit" class="btn-section form-btn-i" type="submit"
                                       value="Send message">
                            </div>
                            <div class="success-message-container" id="success-message"></div>
                            <div class="error-message-container" id="error-message"></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
get_footer();
?>