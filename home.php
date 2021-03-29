<?php 
session_start();
if(! isset($_SESSION['is_login']))
{
  header('location:index.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Home</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">

    <!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


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
    </style>
    <!-- Custom styles for this template -->
    <link href="assets/css/starter-template.css" rel="stylesheet">
  </head>
  <body class="bg-dark">
    <nav class="navbar navbar-expand-lg bg-dark fixed-top">
  <a class="navbar-brand" href="#">Pride Store</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index/index.php"> Input Data</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index/dbase.php"> Database</a>
      </li>
    </ul>
    <a href="logout.php" class="form-inline my-2 my-lg-0 btn btn-info">Logout</a>
  </div>
</nav> 

<main role="main" class="container">

  <div class="starter-template text-white">
    <h2>Selamat Datang <?php echo $_SESSION['nama']; ?> di Database Rdp/Vps</h2>
    <p class="lead">Pusat Database Rdp/Vps</p>
  </div> 
  <div class="card mt-5 border-primary border-0">
  <div class="card-header text-white bg-secondary border-0">
      <h5> Nama : <?php echo $_SESSION['nama']; ?></h5>
    <h5>Username : <?php echo $_SESSION['username'] ?> </h5>
    <br>
    <h5>Input Data</h5>
    <a class="btn btn-primary" href="index/index.php" role="button">Input Data Rdp/Vps</a>
    <br>
    <br>
    <h5>Database Rdp/Vps</h5>
    <a class="btn btn-primary" href="index/dbase.php" role="button">Database Rdp/Vps</a>

  </div>

</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
</body>
</html>