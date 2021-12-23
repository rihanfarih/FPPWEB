<?php

include("../../config.php");

if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM admin WHERE id=$id";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: list-akun.php?status=sukses');
        
    } else {
        header('Location: list-akun.php?status=gagal');
    }

} else {
    die("akses dilarang...");
}

?>