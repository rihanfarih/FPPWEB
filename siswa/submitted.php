<?php include("config.php"); ?>

<?php
// $file = $_FILES['berkas']['name'];
$tmp = $_FILES['berkas']['tmp_name'];

$file=basename($_FILES['berkas']['name']);
$file=str_replace(' ','|',$file);

$mapel = $_POST['mapel'];

$path = "tugas/" . $file;

echo $tmp;

if (move_uploaded_file($tmp, $path)) {
    $sql = "UPDATE tugas SET last_modified = CURRENT_TIMESTAMP, status = 'submitted', file='$file' WHERE mapel = '$mapel'";
    if (mysqli_query($db, $sql)) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: assignment.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: assignment.php?status=gagal');
    }
}
?>
