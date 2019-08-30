<?php 
include 'inc/bootstrap.php';
$pageTitle = "Contact";
$section = "contact";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'inc/process_form.php';
    $error_message = process_form();
}
include 'inc/header.php';
if (isset($_GET['thanks'])) {
    echo "<p>Thanks for your response, I&rsquo;ll check it out shortly!</p>";
    include 'inc/footer.php';
    exit;
}
?>
    <div class="wrapper">
        <form method="post" class="form-contact" action="<?php echo getenv('SCRIPT_NAME'); ?>">
        <?php
        echo "<h1>$pageTitle</h1>";
        if (isset($error_message))
            echo '<div class="alert alert-danger">' . $error_message . '</div>';
        ?>
            <p>Have a comment or additional suggestions?<br />Complete the form to send me an email.</p>
            <div class="form-label-group">
                <input type="text" id="name" name="name" class="form-control" placeholder="Name" required value="<?php if (isset($_POST['name'])) echo htmlspecialchars($_POST['name']); ?>" />
                <label for="name" class="sr-only">Name</label>
            </div>
            <div class="form-label-group">
                <input type="text" id="email" name="email" class="form-control" placeholder="Email" required value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>" />
                <label for="email" class="sr-only">Email</label>
            </div>
            <div class="form-label-group">
                <textarea name="message" id="message" class="form-control" placeholder="Message" required>
                    <?php if (isset($_POST['message'])) echo htmlspecialchars($_POST['message']); ?>
                </textarea>
                <label for="message" class="sr-only">Message</label>
            </div>
            <div class="g-recaptcha form-label-group" data-sitekey="<?= getenv('SITE_KEY') ?>"></div>
            <div class="form-label-group">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
            </div>
        </form>
    </div>
<?php 
include 'inc/footer.php';
