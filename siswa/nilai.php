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
    <title>Pendaftaran Siswa Baru | SMK Coding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>
        <header>
                <div class="container-fluid shadow">
                    <div class="row">
                        <div class="col">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                                 <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                            </svg>
                            <span class="fs-4">SMK Coding</span>
                        </div>
                        <div class="col">
                            <a class="dropdown-item text-end " href="homesis.php">
                                <i class="bi bi-arrow-left-circle-fill me-2"></i>
                                Kembali menu utama
                            </a>
                        </div>
                    </div>
                </div>
        </header>

   

    <br>
  
<div class="container shadow py-4 mt-5">
   
    
                <div class="p-4 mb-4 bg-light rounded-3 ">
                        <h4 class="display-8 ">Rekapitulasi Nilai</h4>
                        <h7>siswa : <?php echo $_SESSION['nama']; ?> </h7>
                </div>

        <table class="table table-striped text-center ">
        <thead>
            <tr>
                <th>mata pelajaran</th>
                <th>tugas 1</th>
                <th>tugas 2</th>
                <th>tugas 3</th>
                <th>tugas 4</th>
                <th>tugas 5</th>
                <th>rerata tugas </th>
                <th>tugas 1</th>
                <th>tugas 2</th>
                <th>tugas 3</th>
                
            </tr>
        </thead>
        <tbody>

            <?php
            $sql = "SELECT * FROM sql_nilai";
            $query = mysqli_query($db, $sql);

            while($siswa = mysqli_fetch_array($query)){
                echo "<tr>";

                echo "<td>".$siswa['Mata_Pelajaran']."</td>";
                echo "<td>".$siswa['TUGAS_1']."</td>";
                echo "<td>".$siswa['TUGAS_2']."</td>";
                echo "<td>".$siswa['TUGAS_3']."</td>";
                echo "<td>".$siswa['TUGAS_4']."</td>";
                echo "<td>".$siswa['TUGAS_5']."</td>";
                echo "<td>".$siswa['AVG_TUGAS']."</td>";

                echo "<td>".$siswa['QUIZ_2']."</td>";
                echo "<td>".$siswa['QUIZ_3']."</td>";
                echo "<td>".$siswa['QUIZ_4']."</td>";

                
                echo "</tr>";
            }
            ?>

        </tbody>
        </table>

        <p>Total: <?php echo mysqli_num_rows($query) ?></p>
    
</div>

    </body>
</html>