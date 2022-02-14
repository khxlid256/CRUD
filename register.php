<?php
require_once "conn.php";

if ($func->isLoggedIn()) {
  header("Location: home.php");
}

if (isset($e)) {
  $err = basename($_SERVER['SCRIPT_FILENAME']);
  header("Location: errorPage.php?page=".$err);
}

if (isset($_POST['is_register'])) {
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
  $password = $_POST['password'];
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Email tidak valid!";
    if (!$username) {
      $errorUsrnm = "Username tidak valid!";
      if (!$password) {
        $errorPasswd = "Password tidak valid!";
      }
    }
  } else {
    
    if ($func->register_user($email, $username, $password)) {
      $success = true;
    } else {
      $err = $func->getLastError();
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sign Up - ds.raihankhalid.my.id</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/style.css"><!-- Custom CSS for this page  -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>

<body>
  <nav class="navbar">
    <a class="navbar-brand text-white mt-1" href="./register.php">
      <h4>TokyoLights | Sign Up</h4>
    </a>
    <a href="./" class="form-inline my-2 my-lg-0 btn btn-primary">Login</a>
  </nav>
  <div class="container">
    <div class="login-form text-white">
      <form method="POST" action="">
        <h2 class="text-center">Sign Up</h2>
        <?php if (isset($success)) : ?>
          <div class="alert alert-success mb-3">
            <div class="text-center">Berhasil Mendaftar! <a style="text-decoration: none;" href="index.php">Login</a></div>
            <!-- <button type="button" class="close"><span aria-hidden="true">&times;</span></button> -->
          </div>
        <?php endif; ?>
        <div class="form-group">
          <input type="text" class="form-control form-controllgn inpt" placeholder="Username" name="username" required value="<?php echo isset($username) ? $username : '' ?>">
          <?php if (isset($errorUsrnm)) : ?>
            <small class="text-danger form-group"><?= $errorUsrnm; ?></small>
          <?php endif; ?>
        </div>
        <div class="form-group">
          <input type="email" class="form-control form-controllgn inpt" placeholder="Email Address" name="email" required autocomplete="" value="<?php echo isset($email) ? $email : '' ?>">
          <?php if (isset($err)) : ?>
            <small class="text-danger form-group"><?= $err; ?></small>
          <?php endif; ?>
          <?php if (isset($error)) : ?>
            <small class="text-danger form-group"><?= $error; ?></small>
          <?php endif; ?>
        </div>
        <div class="form-group mb-3">
          <div class="input-group" id="show_hide_password">
            <input type="password" class="form-control form-controllgn inpt" id="password" placeholder="Password" name="password" required>
            <button type="button" class="btn btn-dark shadow-none"><i class="bi bi-eye-slash" aria-hidden="true"></i></button>
          </div>
          <?php if (isset($errorPasswd)) : ?>
            <small class="text-danger form-group"><?= $errorPasswd; ?></small>
          <?php endif; ?>
        </div>
        <div class="form-group">
          <button type="submit" name="is_register" class="btn btnlgn btn-primary btn-block">Sign Up</button>
        </div>
      </form>
      <p class="text-center"><a href="./" style="text-decoration: none;">Back to Login</a></p>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $("#show_hide_password button").on('click', function(event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
          $('#show_hide_password input').attr('type', 'password');
          $('#show_hide_password i').addClass("bi bi-eye-slash");
          $('#show_hide_password i').removeClass("bi bi-eye");
        } else if ($('#show_hide_password input').attr("type") == "password") {
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass("bi bi-eye-slash");
          $('#show_hide_password i').addClass("bi bi-eye");
        }
      });
    });
  </script>
</body>

</html>