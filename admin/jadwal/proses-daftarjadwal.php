<?php

include("../../config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['tambah'])){

    // ambil data dari formulir
    
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $ruangan = $_POST['ruangan'];



    // buat query
    $sql = "INSERT INTO jadwal (mata_pelajaran, hari, jam_mulai, jam_selesai, ruangan) VALUE ('$mata_pelajaran', '$hari', '$jam_mulai', '$jam_selesai', '$ruangan')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: pelajaran-admin.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: pelajaran-admin.php?status=gagal');
    }
    

} else {
    die("Akses dilarang...");
}

?>