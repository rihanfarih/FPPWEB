<?php
include("config.php");
session_start();
if (!isset($_SESSION['login_in'])) {
    echo "<script type='text/javascript'>alert('Anda tidak diperkenankan masuk ke halaman ini!');location.href = \"../index.php\"</script>";
}

$id = $_SESSION['id'];
// var_dump($_SESSION['id']);
$mhs = mysqli_query($db, "SELECT * FROM admin JOIN userdata ON admin.id = userdata.id_siswa WHERE admin.id = $id");
$arrmhs = mysqli_fetch_array($mhs);
// var_dump($arrmhs['nama_admin']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Profil Siswa</title>
</head>

<body>
    <div class="container py-4">
        <header class="pb-3 mb-4 border-bottom">
            <div class="row">
                <div class="col">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                        <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                    </svg>
                    <span class="fs-4">SMK Coding</span>
                </div>
                <div class="col">
                    <div class="d-flex flex-row" style="justify-content: right; align-items: center;">
                        <a class="dropdown-item text-end " href="../logout.php" style="width: fit-content;">
                            <button type="button" class="btn btn-danger">Logout <?php echo $_SESSION['nama']; ?></button>
                        </a>
                        <a href="profile.php">
                            <i class="bi bi-person-circle" style="font-size: 2.5rem; color: black"></i>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <div class="p-1 mb-4 bg-light rounded-3">
            <div class="container-fluid py-1">
                            <a class="dropdown-item text-end " href="homesis.php">
                                <i class="bi bi-arrow-left-circle-fill me-2"></i>
                                Kembali menu utama
                            </a>
                

            </div>
        </div>
        <?php if (isset($_GET['status'])) : ?>
            <p>
                <?php
                if ($_GET['status'] == 'gagal') {
                    echo "<div class=\"alert alert-danger mt-4\" role=\"alert\">";
                    echo "Data invalid , Silahkan coba kembali !";
                    echo "</div>";
                } else {
                    echo "<div class=\"alert alert-success mt-4\" role=\"alert\">";
                    echo "Data berhasil di-update !";
                    echo "</div>";
                }
                ?>
            </p>
        <?php endif; ?>
        <div class="card card-body">
            <h3>Profil</h3>
            <div class="d-flex flex-row">
                <div class="d-flex flex-column col-lg-4 p-3" style="align-items: center;">
                    <i class="bi bi-person-circle" style="font-size: 10rem; color: black"></i>
                    <p><?php echo $_SESSION['nama']; ?></p>
                    <p><?php echo $_SESSION['login_in']; ?></p>
                </div>
                <div class="d-flex flex-column col-lg-8 p-3">
                    <!-- <div class="d-flex flex-row"> -->
                    <form action="update-proccess.php" method="post" class="">
                        <div class="d-flex flex-row">
                            <div class="d-flex flex-column col-lg-6 pe-2">
                                <div class="d-flex flex-column mb-3">
                                    <label for="">Nama</label>
                                    <input type="text" name="nama" value="<?= $arrmhs["nama_admin"] ?>">
                                </div>
                                <div class="d-flex flex-column mb-3">
                                    <label for="">Email</label>
                                    <input type="text" name="email" value="<?= $arrmhs["email"] ?>">
                                </div>
                                <div class="d-flex flex-column mb-3">
                                    <label for="">No. Hp</label>
                                    <input type="text" name="nohp" value="<?= $arrmhs["nohp"] ?>">
                                </div>
                                <div class="d-flex flex-column mb-3">
                                    <label for="">Alamat</label>
                                    <input type="text" name="alamat" value="<?= $arrmhs["alamat"] ?>">
                                </div>
                            </div>
                            <div class="d-flex flex-column col-lg-6 ps-2">
                                <div class="d-flex flex-column mb-3">
                                    <label for="">Password Baru</label>
                                    <input type="password" name="password">
                                </div>
                                <div class="d-flex flex-column mb-3">
                                    <label for="">Ulang Password Baru</label>
                                    <input type="password" name="password2">
                                </div>
                                <!-- <div class="d-flex flex-column mb-3">
                                <label for="">Update Foto Profil</label>
                                <input type="file">
                            </div> -->
                            </div>
                        </div>
                        <a href="" style="width: 100%;">
                            <input type="submit" class="btn btn-success" value="Update" name="update" style="width: 100%;" />
                        </a>
                    </form>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>