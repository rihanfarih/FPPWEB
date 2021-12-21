<?php

include("config.php");

if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];

    if(is_file("images/".$data['foto'])) // Jika foto ada
    unlink("images/".$data['foto']); // Hapus foto yang telah diupload dari folder images

    // buat query hapus
    $sql = "DELETE FROM calon_siswa WHERE id=$id";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: list-siswa.php');
        
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>