<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
   // $foto = isset($_POST['foto']['name']) ? $_POST['foto']['name'] : 'x';
   // $tmp = isset($_POST['foto']['tmp_name']) ? $_POST['foto']['tmp_name'] : 'x';
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];


    // Rename nama fotonya dengan menambahkan tanggal dan jam upload
    $fotobaru = date('dmYHis').$foto;
    // Set path folder tempat menyimpan fotonya
    $path = "images/".$fotobaru;
    if(move_uploaded_file($tmp, $path)){
        if(is_file("images/".$data['foto'])) // Jika foto ada
        unlink("images/".$data['foto']); // Hapus file foto sebelumnya yang ada di folder images
    // buat query
    $sql = "UPDATE calon_siswa SET foto='$fotobaru', nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah' WHERE id=$id";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=suksesedit');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }
    }

} else {
    die("Akses dilarang...");
}

?>