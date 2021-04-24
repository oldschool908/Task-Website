<?php
require 'config.php';

session_start();

//additional php code for this page goes here

?>

<?= template_header('Home') ?>
<?= template_nav(isset($_SESSION['loggedin'])) ?>

    <!-- START PAGE CONTENT -->
    <h1 class="title">Tasks</h1>
    <p>Please login to see your tasks!</p>
    <!-- END PAGE CONTENT -->

<?= template_footer() ?>