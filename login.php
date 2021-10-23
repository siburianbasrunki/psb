<?php
	session_start();
	include 'koneksi.php';

	if(isset($_POST['login'])){

		$cek = mysqli_query($conn, "SELECT * FROM tb_admin 
			WHERE username = '".$_POST['username']."' and password = '".MD5($_POST['password'])."'");

		if (mysqli_num_rows($cek) > 0) {
			$a = mysqli_fetch_object($cek);

			$_SESSION['stat_login'] = true;
			$_SESSION['id'] = $a->id_admin;
			$_SESSION['nama'] = $a->nm_admin;
			echo '<script>window.location="beranda.php"</script>';
		}else{
			echo '<script>alert("Gagal, username atau password salah")</script>';
		}
			
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <title>Login</title>
</head>

<body style="height: 100vh;" class="d-flex justify-content-center align-items-center flex-column">
    <h1 class="mb-4">LOGIN</h1>
    <div class="card align-self-center" style="width: 60%;">
        <div class="card-body">
            <?php
            if (isset($error)) {
                echo "<script>alert('Username atau password salah!');</script>";
            }
            ?>
            <form action="" method="post" class="p-5">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" aria-describedby="username" name="username"
                        required>
                </div> 
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <center><button type="submit" class="btn btn-dark mt-3" style="width: 7rem;" name="login">Login</button>
                </center>
            </form>
        </div>
    </div>
</body>

</html>