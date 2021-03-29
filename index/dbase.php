<?php
    $conn = mysqli_connect("localhost","root","","rdp") or die(mysqli_error($conn));

    if(isset($_GET['hal']))
    {
      if($_GET['hal'] == "edit")
      {
        $results = mysqli_query($conn,"SELECT * FROM data WHERE id = '$_GET[id]' ");
        $data = mysqli_fetch_array($results);
        if($data)
        {
          $vnama = $data['nama'];
          $vip = $data['ip'];
          $vram = $data['ram'];
        }
      }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Database Rdp/Vps</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</head>
<body background-color="#121212">
<nav class="navbar navbar-expand-lg bg-dark">
  <a class="navbar-brand" href="#">Pride Store</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/crud/home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php"> Input Data</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="dbase.php"> Database</a>
      </li>
    </ul>
    <a href="/crud/logout.php" class="form-inline my-2 my-lg-0 btn btn-info">Logout</a>
  </div>
</nav>
	<br>
<div class="container">
	<h1 class="text-center text-white"> Database Rdp/Vps </h1>
	<!-- Awal Table -->
	<div class="card mt-5 border-0">
  	<div class="card-header bg-primary text-white border-0">
    	<h5>Database Rdp/Vps</h5>
  	</div>
<div class="card text-white bg-dark">
  	<div class="card-body">
  		<table class="table table-bordered text-white">
        <tr>
            <th>No.</th>
            <th>Nama Buyer</th>
            <th>IP Rdp/Vps</th>
            <th>Varian RAM</th>
            <th>Tanggal Pembelian</th>
            <th>Action</th>
        </tr>
        <?php 
          $no = 1;
          $results = mysqli_query($conn,"SELECT * FROM data");
          while($data = mysqli_fetch_array($results)):
        ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$data['nama']?></td>
            <td><?=$data['ip']?></td>
            <td><?=$data['ram']?> GB</td>
            <td> 12-Maret-2021</td>
            <td>
              <a href="edit.php?hal=edit&id=<?=$data['id']?>" class="btn btn-warning btn-sm">Edit</a>
              <a href="edit.php?hal=hapus&id=<?=$data['id']?>" onclick="return confirm('Are you sure you want to delete data?')" class="btn btn-danger btn-sm">Remove</a>
            </td>
        </tr> 
        <?php endwhile; ?>
      </table>
    </div>
  </div>
</div>
	<!-- Penutup Table -->
</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>