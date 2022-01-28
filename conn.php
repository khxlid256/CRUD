<?php 
class database{
	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "datashop";
	var $koneksi;

	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
	}

	function login_user($username, $password)
	{
		if ($username === "Khxlid" AND $password === "@Raihan156") {
			$_SESSION['is_login'] = TRUE;
			$_SESSION['user'] = $username;
			return TRUE;
		}
	}

	function relogin($username)
	{
		$query = mysqli_query($this->koneksi,"select * from users where username='$username'");
		$data_user = $query->fetch_array();
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $data_user['nama'];
		$_SESSION['is_login'] = TRUE;
	}
} 


?>