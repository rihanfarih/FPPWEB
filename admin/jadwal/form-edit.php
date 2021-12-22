<?php

include("config.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: list-siswa.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM jadwal WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Formulir Edit Siswa | SMK Coding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>

    <header>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                                 <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                            </svg>
                            <span class="fs-4">Pendaftaran Siswa Baru | SMK Coding</span>
                        </div>
                        <div class="col">
                            <a class="dropdown-item text-end " href="../home.php">
                                <i class="bi bi-arrow-left-circle-fill me-2"></i>
                                Kembali menu utama
                            </a>
                        </div>
                    </div>
                </div>
    </header>

<div class="container shadow py-4 mt-5">

            <div class="p-5 mb-4 bg-light rounded-3 height: 4rem">
                    <h3 class="display-7 fw-bold">Formulir Edit data Pelajaran</h3>
            </div>

    <form action="proses-edit.php" method="POST" enctype="multipart/form-data">

        <fieldset>

            <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />

            <div class="form-group">
                <label>mata pelajaran</label>
                <input type="text" name="mata_pelajaran" class="form-control" value="<?php echo $siswa['mata_pelajaran']; ?>" placeholder="mata_pelajaran" required />
            </div>

            <div class="form-group">
                <label>hari</label>
                <input type="text" name="hari" class="form-control" value="<?php echo $siswa['hari']; ?>" placeholder="hari" required />
            </div>

            <div class="form-group">
                <label>jam_mulai:</label>
                <input type="text" name="jam_mulai" class="form-control" value="<?php echo $siswa['jam_mulai']; ?>" placeholder="jam_mulai" required />
            </div>

            <div class="form-group">
                <label>jam_selesai:</label>
                <input type="text" name="jam_selesai" class="form-control" value="<?php echo $siswa['jam_selesai']; ?>" placeholder="jam_selesai" required />
            </div>

            <div class="form-group">
                <label>ruangan:</label>
                <input type="text" name="ruangan" class="form-control" value="<?php echo $siswa['ruangan']; ?>" placeholder="ruangan lengkap" required />
            </div>

        <p>
            <input type="submit" value="Simpan" name="simpan" />
        </p>
</div>
        </fieldset>


    </form>

    </body>
</html>