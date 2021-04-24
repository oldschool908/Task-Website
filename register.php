<?php
require 'config.php';
require 'utilities/connection.php';

$msg = "";
$err = false;
$success = "";

if (isset($_GET['msg'], $_GET['err'])) {
    $msg = $_GET['msg'];
    $err = $_GET['err'];
}



?>

<?= template_header('Register') ?>
<?= template_nav(isset($_SESSION['loggedIn'])) ?>

    <!-- START PAGE CONTENT -->
    <?php if ($msg && !$err) : ?>
        <div class="notification is-success is-light py-2">
            <p><strong><?php echo $msg; ?></strong></p>
        </div>
    <?php elseif ($msg && $err) : ?>
        <div class="notification is-danger is-light py-2">
            <p><strong><?php echo $msg; ?></strong></p>
        </div>
    <?php endif; ?>
    <h1 class="title">Register</h1>
    <form action="user_insert.php" method="POST">
        <div class="field">
            <p class="control has-icons-left">
                <input name="first_name" class="input" type="text" placeholder="First Name" required>
                <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                </span>
            </p>
            </div>
        
            <div class="field">
            <p class="control has-icons-left">
                <input name="last_name" class="input" type="text" placeholder="Last Name" required>
                <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                </span>
            </p>
        </div>

        <div class="field">
            <p class="control has-icons-left">
                <input name="username" class="input" type="text" placeholder="Username" required>
                <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                </span>
            </p>
            </div>

            <div class="field">
            <p class="control has-icons-left">
                <input name="password" class="input" type="password" placeholder="Password" required>
                <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                </span>
            </p>
            </div>
            <div class="field">
            <p class="control">
                <button class="button is-success">
                Register
                </button>
            </p>
        </div>
    </form>
    <!-- END PAGE CONTENT -->

<?= template_footer() ?>