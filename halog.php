<?php
?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>    
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    
</head>


<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container shadow py-4 mt-5">

    <?php if(isset($_GET['status'])): ?>
                <p>
                    <?php
                        if($_GET['status'] == 'gagal'){
                            echo "<div class=\"alert alert-danger mt-4\" role=\"alert\">";
                            echo "login gagal , Silahkan coba kembali !";
                            echo "</div>";
                            

                        } 
                    
                    ?>
                 </p>
             <?php endif; ?>


        <form action="login-process.php" method="POST">

        <div class="p-1 mb-4 bg-light rounded-3 height: 2rem">
                    <h4 class="display-7 ">Login</h4>
            </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email </label>
            <input type="email" name="email" class="form-control" id="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        
        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" class="btn btn-primary"  name="login">Submit</button>
        </div>

        <div class="mb-3 text-center">
        <p class="login-register-text">Anda belum punya akun? <a href="form-buatakun.php">Register</a></p>
        </form>
    </div>
</body>

</html>
        </form>
    </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>