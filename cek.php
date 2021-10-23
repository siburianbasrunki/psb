<?php

session_start();

include "koneksi.php";

$cek = mysqli_query($conn, "SELECT * FROM tb_admin 
			WHERE username = '".$_POST['username']."' and password = '".MD5($_POST['password'])."'");


    $a = mysqli_num_rows($cek);

    if($cek > 0){

        $data = mysqli_fetch_assoc($cek);


        if ($data['level'] == "admin") {
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "admin";

            header(location:beranda.php);
            // <script>window.location ="beranda.php</script>;

        }else if ($data['level'] == "siswa") {
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "siswa";

            header(location:index.php);
            // <script>window.location ="index.php"</script>;

        }else{
            header("location:login.php?pesan=gagal");

        }
        
        }


?>