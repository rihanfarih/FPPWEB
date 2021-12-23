<?php

include("../../config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
   // $foto = isset($_POST['foto']['name']) ? $_POST['foto']['name'] : 'x';
   // $tmp = isset($_POST['foto']['tmp_name']) ? $_POST['foto']['tmp_name'] : 'x';
    
   $nama_admin = $_POST['nama_admin'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $level = $_POST['level'];


    
    // Set path folder tempat menyimpan fotonya
    
    // buat query
    $sql = "UPDATE admin SET nama_admin='$nama_admin', email='$email', password='$password', level='$level' WHERE id=$id";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: list-akun.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: list-akun.php?status=gagal');
    }
    

} else {
    die("Akses dilarang...");
}

?>