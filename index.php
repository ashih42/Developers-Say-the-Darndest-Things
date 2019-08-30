<?php
include 'inc/bootstrap.php';
$pageTitle = "Developers Say the Darndest Things";
$section = "home";
require 'inc/header.php';
?>
  <div class="wrapper">
    <?php
    $repository = json_decode(getenv('REPOSITORY'));
    echo $repository->type;
    switch ($repository->type) {
      // Randomly select a line from file
      case 'text':
        $file = file($repository->source);
        $quote = $file[array_rand($file)];
        break;
      // Randomly select a line database
      case 'sqlite':
        try {
          $db = new PDO("sqlite:$repository->source");
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $result = $db->query('SELECT quote FROM quotes ORDER BY RANDOM() LIMIT 1');
          $quote = $result->fetchColumn();
        } catch (Exception $e) {
          echo 'Error: ' . $e->getMessage();
          exit;
        }
        break;
      default:
        $quote = 'It works on my machine.';
    }
    echo "<h1>$quote</h1>";
    ?>
  </div>
<?php 
require 'inc/footer.php';
