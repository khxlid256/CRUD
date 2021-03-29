<?php
    $conn = mysqli_connect("localhost","root","","rdp") or die(mysqli_error($conn));

	if(isset($_POST['bsimpan']))
	{
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($conn, "INSERT INTO data (nama, ip, ram)
										  VALUES ('$_POST[tbuyer]', 
										  		 '$_POST[tip]', 
										  		 '$_POST[tram]')");
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Simpan data suksess!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='index.php';
				     </script>";
			}
		}


		
	}
	
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Input Data</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</head>
<body>
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
	<h1 class="text-center text-white"> Input Data Rdp/Vps </h1>
	<!-- Awal Form -->
	<div class="card mt-5 border-0 ">
  	<div class="card-header bg-primary text-white border-0">
    	<h5>Input Data Rdp/Vps</h5>
  	</div>
<div class="card text-white bg-dark border-0">
  	<div class="card-body border-0">
  		<form method="POST" action="">
  			<div class="form-group">
  				<label class="bg-dark">Nama Buyer</label>
  				<input type="text" name="tbuyer" value="<?=@$vnama?>" class="form-control" placeholder="Masukkan Nama Buyer!" required>
  			</div>
  			<div class="form-group">
  				<label>IP Rdp/Vps</label>
  				<input type="text" name="tip" value="<?=@$vip?>" class="form-control" placeholder="Masukkan IP Rdp/Vps!" required>
  			</div>
  			<div class="form-group">
  				<label>Varian RAM Rdp/Vps</label>
  				<select class="form-control" name="tram" required>
  					<option value="<?=$vram?>"><?=@$vram?></option>
  					<option value="1">RAM 1GB</option>
  					<option value="2">RAM 2GB</option>
  					<option value="4">RAM 4GB</option>
  					<option value="8">RAM 8GB</option>
  					<option value="16">RAM 16GB</option>
  				</select>
  			</div>

  			<button type="submit" class="btn btn-success" name="bsimpan">Save</button>
  			<button type="reset" class="btn btn-danger" name="breset">Reset</button>
  			

  		</form>
  </div>
</div>
	<!-- Penutup Form -->
</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>