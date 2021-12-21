<?php
include "config.php";
// var_dump($_POST);
session_start();
// var_dump($_SESSION);
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = mysqli_query($db, "SELECT * FROM admin WHERE email = '$email' AND password = '$password'");
    if (mysqli_num_rows($query) != 0) {
        $get = mysqli_fetch_array($query);
        // var_dump($get);
        $level = $get['level'];
        // var_dump($level);
        $nama = $get['nama_admin'];
        // var_dump($nama);
        $_SESSION['nama'] = $nama;
        $_SESSION['login_in'] = $email;
        if ($level == "admin") {
            echo "<script type='text/javascript'>alert('selamat datang $level');location.href = \"admin/home.php\"</script>";
        }
        if ($level == "siswa") {
            echo "<script type='text/javascript'>alert('selamat datang $level');location.href = \"siswa/homesis.php\"</script>";
        }
    } else {
       // echo "<script type='text/javascript'>alert('Login gagal, username atau password salah!');location.href = \"halog.php\"</script>";
       header('Location: halog.php?status=gagal');
    }
} else {
    echo "<script type='text/javascript'>alert('Anda tidak diperkenankan masuk ke halaman ini!');location.href = \"index.php\"</script>";
}