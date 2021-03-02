<?php

// è il php dedicato al frontend (alla view)

// per la prima milestone
require_once __DIR__ . '/database/database.php';

// print_r($dischi);

?>

<!-- qui a questo punto possiamo creare (per la prima milestone) tutto il nostro html.

 per la seconda milestone, index.php dovrà eseguire una chiamata ajax (meglio se con vuejs) verso app/server.php -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/app.css">
  </head>
  <body>
<div class="wrapper">
<header>
<div class="container">
<img style="padding-left:10px;" src="http://via.placeholder.com/90" alt="">
</div>
</header>
<main>
<div class="container">
<?php foreach ($dischi as $disco) {
?>

<ul>
<li><img style="width:100%;" src=" <?php echo $disco["poster"];?> " alt=""></li>
<li><?php echo $disco["title"];?></li>
<li><?php echo $disco["author"];?></li>
<li><?php echo $disco["year"];?></li>
</ul>

<?php } ?>
</div>
</main>
</div>
  </body>
</html>
