<?php

include("../../config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
   // $foto = isset($_POST['foto']['name']) ? $_POST['foto']['name'] : 'x';
   // $tmp = isset($_POST['foto']['tmp_name']) ? $_POST['foto']['tmp_name'] : 'x';
    
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $ruangan = $_POST['ruangan'];


    
    // Set path folder tempat menyimpan fotonya
    
    // buat query
    $sql = "UPDATE jadwal SET mata_pelajaran='$mata_pelajaran', hari='$hari', jam_mulai='$jam_mulai', jam_selesai='$jam_selesai', ruangan='$ruangan' WHERE id=$id";
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