<!DOCTYPE>
<html lang="es">
  <head>
    <title>Welcome!</title>
    <meta charset="utf-8">

    <style>
      body {
        text-align:center;
      }
    </style>
  </head>
  <body>
    <?php
      session_start();
      if(isset($_SESSION["user"])) {
        echo "<h1>Welcome {$_SESSION["user"]}!</h1>";
        echo "<h2>Your password is: {$_SESSION["password"]}.</h2>";

        echo '<form name="close" action="" method="post">';
        echo '<input type="submit" name="submit" value="Close session">';
        echo '</form>';
      }

    if(isset($_POST["submit"])) {
      session_destroy();
      header("Location: index.php");
    }
    ?>
  </body>
</html>
