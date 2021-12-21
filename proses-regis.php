<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $nama_admin = $_POST['nama_admin'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = $_POST['level'];


   
    // buat query
    $sql = "INSERT INTO admin (nama_admin, email, password, level) VALUE ('$nama_admin', '$email', '$password', '$level')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }
    

} else {
    die("Akses dilarang...");
}

?>