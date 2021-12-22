<?php
include "../config.php";
session_start();
// var_dump($_SESSION);
if (!isset($_SESSION['login_in'])) {
    echo "<script type='text/javascript'>alert('Anda tidak diperkenankan masuk ke halaman ini!');location.href = \"../index.php\"</script>";
}
$getData = mysqli_query($db, "SELECT * FROM mhs");
?>

<!DOCTYPE html>
<html>
<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>    
<title>Laman Siswa | SMK Coding </title>
</head>

<body>
    <main>
        <div class="container py-4">

            <header class="pb-3 mb-4 border-bottom">
                <div class="row">
                    <div class="col">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                            <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                        </svg>
                        <span class="fs-4">SMK Coding</span>
                    </div>
                    <div class="col">
                    <a class="dropdown-item text-end " href="../logout.php">
                    <button type="button" class="btn btn-danger">Logout <?php echo $_SESSION['nama']; ?></button>
                            </a>
                    </div>
                </div>
            </header>


            <div class="p-1 mb-4 bg-light rounded-3">
                <div class="container-fluid py-1">
                    
                    <p>Selamat datang <b><?php echo $_SESSION['nama']; ?></b> di halaman akses <b>mahasiswa</b></p>
                    
                </div>
            </div>

            <div class="row align-items-md-stretch">
                <div class="col-md-6">
                    
                    <div class="h-100 p-5 bg-light border rounded-3">
                        
                            <h2 class="bi-calendar-date"> Lihat Jadwal Pelajaran</h2>
                            <p>Klik disini untuk melihat Jadwal Pelajaran</p>
                            <a href="jadwalpelajaran.php" class="btn btn-outline-secondary" type="button">Klik disini</a>
                        
                    </div>
                </div>

                <div class="col-md-6 ">
                    <div class="h-100 p-5 bg-light border rounded-3 ">
                    <h2 class="bi-graph-up"> Lihat Nilai</h2>
                    <p>Klik disini untuk melihat nilai</p>
                    <a href="nilai.php" class="btn btn-outline-secondary" type="button">Klik disini</a>
                    </div>
                </div>
             </div>
        

        <div class="row align-items-md-stretch mt-5">
                    <div class="col-md-6">
                    <div class="h-100 p-5 bg-light border rounded-3">
                        <h2 class="bi-clipboard-check"> Assignment Submission</h2>
                        <p>Klik disini untuk Mengumpulkan Tugas</p>
                        <a href="form-daftar.php" class="btn btn-outline-secondary" type="button">Klik disini</a>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="h-100 p-5 bg-light border rounded-3">
                    <h2 class="bi-easel"> Study Material</h2>
                    <p>Klik disini untuk melihat meteri pelajaran</p>
                    <a href="list-siswa.php" class="btn btn-outline-secondary" type="button">Klik disini</a>
                    </div>
                </div>
             </div>
        </div>

    </main>

   

</body>
</html>