<?php
error_reporting(0);
try {
	$conn = new PDO('mysql:host=yourhost;dbname=datashop', 'khxlid', 'yourpassword', array(PDO::ATTR_PERSISTENT => TRUE));
} catch (PDOException $e) {
	$e->getMessage();
}

$func = new Auth($conn);

class Auth
{
	private $db;
	private $error;

	function __construct($dbconn)
	{
		$this->db = $dbconn;
		session_start();
		date_default_timezone_set('Asia/Jakarta');
	}


	public function getLastError()
	{
		return $this->error;
	}

	public function isLoggedIn()
	{
		if (isset($_SESSION['user_login'])) {
			return true;
		}
	}

	public function fetch_user_info($info)
	{
		$qry = $this->db->prepare("SELECT * FROM users WHERE id = :id");
		$qry->bindParam(":id", $_SESSION['user_login']);
		$qry->execute();
		$fetch = $qry->fetch();

		return $fetch[$info];
	}

	public function logout_user()
	{
		session_destroy();
		unset($_SESSION['user_login']);

		return true;
	}

	public function list_user_akun($userid)
	{
		$qry = $this->db->prepare("SELECT * FROM akun WHERE user_id = :userid");
		$qry->bindParam(":userid", $userid);
		$qry->execute();

		if ($qry->rowCount() > 0) {
			$no = 1;
			while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {
				$no++;
?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php print($row['email']); ?></td>
					<td><?php print($row['password']); ?></td>
					<td><?php print($row['provider']); ?></td>
					<td><?php print($row['created_at']); ?></td>
					<td>
						<a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
						<a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
					</td>
				</tr>
			<?php
				$no++;
			}
		} else {
			?>
			<tr>
				<td class="text-center" colspan="6">
					<h5>Nothing here...</h5>
				</td>
			</tr>
<?php
		}
	}

	public function login_user($email, $password)
	{
		try {
			$qry = $this->db->prepare("SELECT * FROM users WHERE email = :email OR username = :email");
			$qry->bindParam(":email", $email);
			$qry->execute();
			$fetch = $qry->fetch();
			$cnt = $qry->rowCount();

			if (!$fetch) {
				$this->error = "Email atau Password salah!";
				return false;
			}

			if ($cnt > 0) {
				if (password_verify($password, $fetch['password'])) {
					$_SESSION['user_login'] = $fetch['id'];
					header("Location: home.php");
					return true;
				} else {
					$this->error = "Email atau Password salah!";
					return false;
				}
			}
		} catch (PDOException $err) {
			echo $err->getMessage();
			return false;
		}
	}

	public function register_user($email, $username, $password)
	{
		try {
			$hashPw = password_hash($password, PASSWORD_DEFAULT);
			$qry = $this->db->prepare("INSERT INTO users (email, username, password) VALUES(:email, :username, :password)");
			$qry->bindParam(":email", $email);
			$qry->bindParam(":password", $hashPw);
			$qry->bindParam(":username", $username);
			$qry->execute();
			return true;
		} catch (PDOException $err) {

			if ($err->errorInfo[0] == 23000) {
				$this->error = "Email tersebut sudah terdaftar!";
				return false;
			} else {
				echo $err->getMessage();
				return false;
			}
		}
	}

	public function enkripsi_password_akun($password)
	{
		try {
			$method = "AES-128-CTR";
			$key = $this->fetch_user_info("password");
			$option = 0;
			$iv = "2766723155588222";
			$enkripsi = openssl_encrypt($password, $method, $key, $option, $iv);
			return $enkripsi;
		} catch (PDOException $err) {
			echo $err->getMessage();
			return false;
		}
	}

	public function dekripsi_password_akun($password, $keypass)
	{
		try {
			$method = "AES-128-CTR";
			$key = $this->fetch_user_info("");
			$option = 0;
			$iv = "2766723155588222";
			$dekripsi = openssl_decrypt($password, $method, $keypass, $option, $iv);
			return $dekripsi;
		} catch (PDOException $err){
			echo $err->getMessage();
			return false;
		}
	}

	public function save_akun($userid, $useremail, $password, $provider)
	{
		try {
			$hashpw = $this->enkripsi_password_akun($password);
			$date = date("Y-m-d");
			$qry = $this->db->prepare("INSERT INTO akun (user_id, email, password, provider, created_at) VALUES(:userid, :email, :password, :provider, :created_at)");
			$qry->bindParam(":userid", $userid);
			$qry->bindParam(":email", $useremail);
			$qry->bindParam(":password", $hashpw);
			$qry->bindParam(":provider", $provider);
			$qry->bindParam(":created_at", $date);
			$qry->execute();
			return true;
		} catch (PDOException $err) {
			echo $err->getMessage();
			return false;
		}
	}
}
