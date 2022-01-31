<?php
require_once "conn.php";

if ($func->isLoggedIn()) {
  header("Location: home.php");
}

if (isset($_POST['is_login'])) {
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Email tidak valid!";
  } else {
    $password = $_POST['password'];

    if ($func->login_user($email, $password)) {
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
  <title>Sign In - ds.raihankhalid.my.id</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/style.css"><!-- Custom CSS for this page  -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <style>
    .show {
      border: none;
    }
  </style>
</head>

<body>
  <nav class="navbar">
    <a class="navbar-brand text-white mt-1" href="./">
      <h4>TokyoLights | Sign In</h4>
    </a>
    <a href="register.php" class="form-inline my-2 my-lg-0 btn btn-primary">Register</a>
  </nav>
  <div class="container">
    <div class="login-form text-white">
      <form method="post" class="">
        <h2 class="text-center">Sign In</h2>
        <div class="form-group">
          <input type="email" class="form-control form-controllgn inpt" placeholder="Email Address" name="email" required="required" autocomplete="" value="<?php echo isset($email) ? $email : '' ?>">
          <?php if (isset($err)) : ?>
            <small class="text-danger form-group"><?= $err; ?></small>
          <?php endif; ?>
          <?php if (isset($error)) : ?>
            <small class="text-danger form-group"><?= $error; ?></small>
          <?php endif; ?>
        </div>
        <div class="form-group mb-3">
          <div class="input-group" id="show_hide_password">
            <input type="password" class="form-control form-controllgn inpt" id="password" placeholder="Password" name="password" required autocomplete="current-password">
            <button type="button" class="btn btn-dark shadow-none"><i class="bi bi-eye-slash" aria-hidden="true"></i></button>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" name="is_login" class="btn btnlgn btn-primary btn-block">Sign In</button>
        </div>
        <div class="clearfix form-check">
          <input class="form-check-input" type="checkbox" id="rememberme">
          <label class="float-left form-check-label" for="rememberme"> Remember me</label>
          <a href="forgotPassword.php" style="text-decoration: none;" class="float-right">Forgot Password?</a>
        </div>
      </form>
      <p class="text-center"><a href="register.php" style="text-decoration: none;">Create an Account</a></p>
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