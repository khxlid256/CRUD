<?php
session_start();
if (!isset($_SESSION['is_login'])) {
  header('location:index.php');
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Home</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="vendor/css-hamburgers/hamburgers.css" rel="stylesheet">
  <!-- <link href="assets/bootstrap.css" rel="stylesheet"> -->


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

    body {
      background-color: #2D001D;
    }

    nav {
      background-color: #002656;
    }

    .txtpink {
      color: #e43681;
    }

    .bgcyb {
      background-color: #6c193d;
    }

    .btn-bl {
      background-color: #5994ce;
    }

  </style>
</head>

<body>
  <nav class="navbar">
    <a class="navbar-brand text-white" href="./"><h4>TokyoLights</h4></a>
    <button class="hamburger hamburger--slider is-inactive" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto mb-3 mt-3">
        <li class="nav-item active">
          <a class="nav-link txtpink" href="home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link txtpink" href="index/index.php"> Input Data</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link txtpink" href="index/dbase.php"> Database</a>
        </li>
      </ul>
      <a href="logout.php" class="form-inline my-2 my-lg-0 btn btn-danger mb-3">Logout</a>
    </div>
  </nav>

  <main role="main" class="container">

    <div class="starter-template text-white mt-5">
      <h2>Selamat Datang <?= $_SESSION['user']; ?> di Database RDP/VPS</h2>
      <p class="lead">Database Rdp/Vps P-Store</p>
    </div>
    <div class="card mt-5 border-primary border-0">
      <div class="card-header text-white bgcyb border-0">
        <h5> Nama : <?= $_SESSION['user']; ?></h5>
        <br>
        <h5>Input Data</h5>
        <a class="btn btn-secondary text-white" href="index/index.php" role="button">Input Data Rdp/Vps</a>
        <br>
        <br>
        <h5>Database Rdp/Vps</h5>
        <a class="btn btn-secondary mb-3 text-white" href="index/dbase.php" role="button">Database Rdp/Vps</a>
        <p class="mt-3">Waktu : <span id="jam"></span></p>
      </div>

  </main><!-- /.container -->
  <script>
    // Look for .hamburger
    var hamburger = document.querySelector(".hamburger");
    // On click
    hamburger.addEventListener("click", function() {
      // Toggle class "is-active"
      hamburger.classList.toggle("is-active");
      // Do something else, like open/close menu
    });
  </script>
  <script type="text/javascript">
    window.onload = function() {
      jam();
    }

    function jam() {
      var e = document.getElementById('jam'),
        d = new Date(),
        h, m, s;
      h = d.getHours();
      m = set(d.getMinutes());
      s = set(d.getSeconds());

      e.innerHTML = h + ':' + m + ':' + s;

      setTimeout('jam()', 1000);
    }

    function set(e) {
      e = e < 10 ? '0' + e : e;
      return e;
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  <script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
</body>

</html>