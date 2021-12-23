<?php include("config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>SMK Coding</title>
</head>

<body>
    <?php
    if (isset($_POST['pilih'])) {
        $mapel = $_POST['pelajaran'];
        $judul = $_POST['tugas'];
        // $sql = "SELECT * FROM jadwal WHERE mata_pelajaran = '$mapel' LIMIT 1";
        // $query = mysqli_query($db, $sql);
        // $jadwal = mysqli_fetch_array($query);
        //$jadwal['hari'] ['jam_mulai'];

        $sql = "SELECT * FROM tugas WHERE mapel = '$mapel' AND judul = '$judul'";
        $query = mysqli_query($db, $sql);
        $tugas = mysqli_fetch_array($query);
    }
    ?>

    <header>
        <div class="container-fluid shadow">
            <div class="row">
                <div class="col">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                        <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
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
        <div class="p-5 mb-4 bg-light rounded-3 height: 4rem">
            <h3 class="display-7 ">Pengumpulan <?php echo $tugas['judul'] ?> <?php echo $tugas['mapel'] ?></h3>
        </div>
        <?php if ($tugas['status'] == 'no attempt') : ?>
            <table class="table table-striped ">
                <tbody>
                    <tr>
                        <td>Submission status</td>
                        <td><?php echo $tugas['status'] ?></td>
                    </tr>
                    <tr>
                        <td>Grading status</td>
                        <td><?php echo $tugas['grading_status'] ?></td>
                    </tr>
                    <tr>
                        <td>Due date</td>
                        <td><?php echo $tugas['due_date'] ?></td>
                    </tr>
                    <tr>
                        <td>Time remaining</td>
                        <td><?php
                            $due = $tugas['due_date'];
                            $sql = "SELECT DATEDIFF('$due',CURRENT_TIMESTAMP) as date";
                            $query = mysqli_query($db, $sql);
                            $remaining = mysqli_fetch_array($query);
                            echo $remaining['date'];
                            ?> days</td>
                    </tr>
                    <tr>
                        <td>Last modified</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
            <form action="submitted.php" method="POST" enctype="multipart/form-data">
                <input name="mapel" type="hidden" value="<?php echo htmlspecialchars($mapel) ?>" />
                <div class="berkas">
                    <label for="berkas" class="form-label">Masukkan File</label>
                    <input class="form-control" name="berkas" type="file" id="berkas">
                </div>
                <br>
                <input type="submit" value="submit" name="submit" />
            </form>
        <?php else : ?>
            <table class="table table-striped ">
                <tbody>
                    <tr>
                        <td>Submission status</td>
                        <td><?php echo $tugas['status'] ?></td>
                    </tr>
                    <tr>
                        <td>Grading status</td>
                        <td><?php echo $tugas['grading_status'] ?></td>
                    </tr>
                    <tr>
                        <td>Due date</td>
                        <td><?php echo $tugas['due_date'] ?></td>
                    </tr>
                    <tr>
                        <td>Time remaining</td>
                        <td><?php
                            $due = $tugas['due_date'];
                            $sql = "SELECT DATEDIFF('$due',CURRENT_TIMESTAMP) as date";
                            $query = mysqli_query($db, $sql);
                            $remaining = mysqli_fetch_array($query);
                            echo $remaining['date'];
                            ?> days</td>
                    </tr>
                    <tr>
                        <td>Last modified</td>
                        <td><?php echo $tugas['last_modified']?></td>
                    </tr>
                    <tr>
                        <td>File</td>
                        <td><a href="<?php echo 'tugas/';echo $tugas['file']?>" download><?php echo $tugas['file']?></a></td>
                    </tr>
                </tbody>
            </table>
            <form action="remove.php" method="POST" enctype="multipart/form-data">
                <input name="mapel" type="hidden" value="<?php echo htmlspecialchars($mapel) ?>" />
                <br>
                <input type="submit" value="remove" name="remove" />
            </form>
        <?php endif; ?>
    </div>
</body>

</html>