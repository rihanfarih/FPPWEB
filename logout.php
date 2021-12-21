<?php
session_start();
if (!isset($_SESSION['login_in'])) {
    echo "<script type='text/javascript'>alert('Anda tidak diperkenankan masuk ke halaman ini!');location.href = \"index.php\"</script>";
}
// var_dump($_SESSION);
session_destroy();
echo "<script type='text/javascript'>alert('Logout berhasil!'); location.href=\"index.php\"</script>";