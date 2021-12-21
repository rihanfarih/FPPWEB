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
<html lang="en">
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Home Page</title>
</head>

<body>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Data Mahasiswa
                <div style="margin-left: 10px; float:right;">
                    <a href="../logout.php">
                        <button type="button" class="btn btn-danger">Logout</button>
                    </a>
                </div>
                <div style="float:right;">
                    <a href="chart.php">
                        <button type="button" class="btn btn-success">Chart</button>
                    </a>
                </div>
            </h3>
            <p>Selamat datang <b><?php echo $_SESSION['nama']; ?></b> di halaman data mahasiswa</p>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-dark table-striped" aria-describedby="example2_info">
                            <thead>
                                <tr>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Rendering engine: activate to sort column descending"
                                        aria-sort="ascending">
                                        Id
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">
                                        Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">
                                        Email
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending">
                                        Gender
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending">
                                        GPA
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($i = mysqli_fetch_array($getData)) {
                                    echo
                                    "<tr class='odd'>
                                            <td>$i[id]</td>
                                            <td>$i[nama]</td>
                                            <td>$i[email]</td>
                                            <td>$i[gender]</td>
                                            <td>$i[ipk]</td>
                                    </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</body>

</html>

</html>