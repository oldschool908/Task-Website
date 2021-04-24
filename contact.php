<?php
require 'config.php';
require './utilities/connection.php';

//additional php code for this page goes here
$response = '';

if (isset($_POST['email'], $_POST['name'], $_POST['subject'], $_POST['msg'])) {
    //send email
    $to = 'sydneysorensen@mail.weber.edu';
    $from = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['msg'];
    $headers = 'From: ' . $_POST['email'] . "\r\n" . 'Reply-To: ' . $_POST['email'] . "\r\n" . 'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
    //update response
    $response = 'Message sent';
}

?>

<?= template_header('Contact') ?>
<?= template_nav(isset($_SESSION['loggedIn'])) ?>

    <!-- START PAGE CONTENT -->
    <?php if ($response) : ?>
                <div class="notification is-success is-light py-2">
                <p><strong><?php echo $response; ?></strong></p>
                </div>
            <?php endif; ?>
    <h1 class="title">
                Contact us
            </h1>
            <form action="" method="post">
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control has-icons-left">
                        <input name="email" class="input" type="email" placeholder="your@email.com">
                        <span class="icon is-small is-left">
                            <i class="fas fa-at"></i>
                        </span>
                    </div>
                </div> 
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input name="name" class="input" type="text" placeholder="Your Name">
                    </div>
                </div> 
                <div class="field">
                    <label class="label">Message Subject</label>
                    <div class="control">
                        <input name="subject" class="input" type="text" placeholder="Message">
                    </div>
                </div> 
                <div class="field">
                    <label class="label">Message</label>
                    <div class="control">
                        <input name="msg" class="textarea" placeholder="What would you like to contact us about?">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <button class="button is-success">
                            <span class="icon">
                                <i class="fas fa-paper-plane"></i>
                            </span>
                            <span>Send Message</span>
                        </button>
                    </div>
                </div>     
            </form>
    <!-- END PAGE CONTENT -->

<?= template_footer() ?>