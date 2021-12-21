<?php
include "../config.php";
session_start();
if (!isset($_SESSION['login_in'])) {
    echo "<script type='text/javascript'>alert('Anda tidak diperkenankan masuk ke halaman ini!');location.href = \"../index.php\"</script>";
}
$getIPK23 = mysqli_query($conn, "SELECT COUNT(*) FROM mhs WHERE ipk >= 2 AND ipk < 3");
$getIPK34 = mysqli_query($conn, "SELECT COUNT(*) FROM mhs WHERE ipk >= 3 AND ipk <= 4");
$a = mysqli_fetch_array($getIPK23);
$b = mysqli_fetch_array($getIPK34);
// var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Chart Page</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
</head>

<body>
    <div class="card-header">
        <h3 class="card-title">
            Data Mahasiswa
            <div style="margin-left: 10px; float:right;">
                <a href="../logout.php">
                    <button type="button" class="btn btn-danger">Logout</button>
                </a>
            </div>
            <div style="float:right;">
                <a href="home.php">
                    <button type="button" class="btn btn-success">Back</button>
                </a>
            </div>
        </h3>
        <p>Selamat datang <b><?php echo $_SESSION['nama']; ?></b> di halaman chart</p>
    </div>
    <div style="max-height: 35vh; padding: 20px">
        <canvas id="myChart" height="90" style="margin: 15px; height: 100%"></canvas>
    </div>
    <script>
    var fixA = <?php echo $a[0] ?>;
    var fixB = <?php echo $b[0] ?>;
    const ctx = document.getElementById("myChart");
    const myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["GPA 2.0 - 3.0", "GPA 3.0 - 4.0"],
            datasets: [{
                label: "GPA Mahasiswa",
                data: [fixA, fixB],
                backgroundColor: ["rgba(255, 99, 132, 0.2)", "rgba(54, 162, 235, 0.2)"],
                borderColor: ["rgba(255, 99, 132, 1)", "rgba(54, 162, 235, 1)"],
                borderWidth: 1,
            }, ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
    </script>
</body>

</html>