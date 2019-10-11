<!DOCTYPE>
<html lang="es">
  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <link href="style.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div id="main">
      <h1>Login</h1>
      <form name="login" method="post" action="">
        <input class="input" type="text" name="user" placeholder="Username">
        <input class="input" type="password" name="password" placeholder="Password">
        <input class="input" type="submit" name="submit" value="Submit">
      </form>
      <?php
          if(isset($_POST["submit"])) {
            $database = new mysqli("localhost", "root", "", 'baseprueba');
            $query = "SELECT password FROM usuarios WHERE username='{$_POST["user"]}'";
            $rows_data = ($database -> query($query))->num_rows;
            $query = $database -> query($query);
            $query = $query -> fetch_array()[0];
            if($query == $_POST["password"] and $rows_data == 1) {
              session_start();
              $_SESSION["user"] = $_POST["user"];
              $_SESSION["password"] = $_POST["password"];
              header("Location: welcome.php");
            }
            else if ($query != $_POST["password"]) {
              echo "<script src=form_validation.js></script>";
              echo "<p class='error'>User or password are incorrect.</p>";
            }
            else {
              echo "<script src=form_validation.js></script>";
              echo "<p class='error'>You have to enter a username and a password.</p>";
            }
            $database->close();
          }
      ?>
      <a href="register.php">Register here!</a>
    </div>
  </body>
</html>
