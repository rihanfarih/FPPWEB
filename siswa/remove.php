<?php include("config.php"); ?>

<?php

$mapel = $_POST['mapel'];

$sql = "UPDATE tugas SET last_modified = NULL, status = 'no attempt',file = NULL WHERE mapel = '$mapel'";
if (mysqli_query($db, $sql)) {
    // kalau berhasil alihkan ke halaman index.php dengan status=sukses
    header('Location: assignment.php?status=sukses');
} else {
    // kalau gagal alihkan ke halaman indek.php dengan status=gagal
    header('Location: assignment.php?status=gagal');
}
?>