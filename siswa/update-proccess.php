<?php

include("config.php");
session_start();

// cek apakah tombol update sudah diklik atau blum?
if (isset($_POST['update'])) {

    // ambil data dari formulir
    $nama_admin = $_POST['nama'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    // $id = $get['id'];
    $id = $_SESSION['id'];
    // var_dump($password);

    if (isset($password) && isset($password2)) {
        if ($password !== $password2) {
            echo "
                <script>
                    alert('Password tidak sesuai')
                </script>
            ";
            header('Location: profile.php?status=gagal');
            // return false;
        } else {
            // var_dump($_SESSION['id']);
            $query1 = mysqli_query($db, "UPDATE admin SET nama_admin = '$nama_admin', email = '$email' WHERE id = $id");
            $query2 = mysqli_query($db, "UPDATE userdata SET nohp = '$nohp', alamat = '$alamat' WHERE id_siswa = $id");

            if ($query1 && $query2) {
                $_SESSION['nama'] = $nama_admin;
                $_SESSION['login_in'] = $email;
            } else {
                header('Location: profile.php?status=gagal');
            }

            mysqli_query($db, "UPDATE admin SET password = '$password' WHERE id = $id");
            header('Location: profile.php?status=success');
        }
    }
} else {
    die("Akses dilarang...");
}
