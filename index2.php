<?php
session_start();
include_once('koneksi.php');
$database = new database();

if (isset($_SESSION['is_login'])) {
  header('location:home.php');
}

if (isset($_COOKIE['username'])) {
  $database->relogin($_COOKIE['username']);
  header('location:home.php');
}

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  // if (isset($_POST['remember'])) {
  //   $remember = TRUE;
  // } else {
  //   $remember = FALSE;
  // }

  if ($database->login_user($username, $password)) {
    header('location:home.php');
  } else {
    $alert = "Username or Password wrong!";
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 65 px;
      background-color: #333;
      padding-top: 20px;
    }
  </style>
</head>

<body class="text-center">
  <div class="container">
    <div class="row">
      <div class="col"></div>
      <div class="col-sm-6">
        <form class="form-signin" method="post" action="">
          <img src="assets/icons-images/user.png" class="mb-4 mt-5" width="140" height="140">
          <h1 class="h3 mb-5 font-weight-normal text-white">Sign In to Database</h1>
          <div class="col-12">
            <?php if (isset($alert)) : ?>
              <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Username atau Password yang ada masukkan salah!</strong>
              </div>
            <?php endif; ?>
            <label for="username" class="sr-only">Username</label>
            <input type="text" id="username" class="form-control mb-3" placeholder="Username" name="username" required autofocus autocomplete="off">
            <label for="password" class="sr-only">Password</label>
            <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
            <button class="btn btn-lg btn-dark btn-block mt-5" type="submit" name="login">Sign in</button>
          </div>
        </form>
      </div>
      <div class="col"></div>
    </div>
  </div>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 text-center text-white">
          <strong>
            <p>Made by RaihanKhalid &copy; 2021 - <script>
                document.write(new Date().getFullYear())
              </script>
            </p>
          </strong>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>