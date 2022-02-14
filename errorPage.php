<?php
require_once "conn.php";

if (isset($e)) {
    $page = $_GET['page'];
    $err = "Something went wrong while accessing <b>" . $page . "</b>    page!";
} else {
    header("Location: ./home.php");
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
</head>

<body>
    <nav class="navbar">
        <a class="navbar-brand text-white mt-1" href="./errorPage.php">
            <h4>TokyoLights | Error Page</h4>
        </a>
        <a href="home.php" class="form-inline my-2 my-lg-0 btn btn-primary">Home</a>
    </nav>

    <div class="container">
        <div class="card cardError mt-5">
            <div class="card-body text-white">
                <h1 class="text-center">Oops! Page got error.</h1>
                <hr>
                <h4 class="ml-3"><?= $err; ?></h4>
                <hr>
                <details class="ml-3">
                    <summary>Error Message</summary>
                    <p></p>
                    <?= $e; ?>
                </details>

            </div>
        </div>
    </div>
</body>

</html>