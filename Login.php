<?php

include_once("./Admin/conn.php");
session_start();
if (isset($_SESSION['EmailAddress']) && isset($_SESSION['Role']) == 'Admin') {
    header("Location: ./Admin/index.php");
} elseif (isset($_SESSION['EmailAddress']) && isset($_SESSION['Role']) == 'User') {
    header("Location:index.php");
}

if (isset($_REQUEST['loginNow'])) {
    $EmailAddress = $_REQUEST['EmailAddress'];
    $password = $_REQUEST['password'];

    $LoginQuery = "SELECT * FROM `users` WHERE EmailAddress = '$EmailAddress' AND UserPassword = '$password'";
    $result = mysqli_query($connection, $LoginQuery);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['Roles'] == 'Admin') {
            $_SESSION['Name'] = $row['UserName'];
            $_SESSION['EmailAddress'] = $EmailAddress;
            $_SESSION['Role'] = 'Admin';
            header("Location: ./Admin/index.php");
        } elseif ($row['Roles'] == 'User') {
            $_SESSION['Name'] = $row['UserName'];
            $_SESSION['EmailAddress'] = $EmailAddress;
            $_SESSION['Role'] = 'User';
            header("Location:index.php");
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="./Admin/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="./Admin/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="./Admin/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./Admin/assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Log In</h3>
                            </a>
                        </div>
                        <form action="./Login.php" method="post" class="needs-validation" novalidate>
                            <div class="form-floating mb-3">
                                <input type="email" name="EmailAddress" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input style="border: 1px solid white;" type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                            </div>
                            <button style="margin-top: -8px;" name="loginNow" type="submit" class="btn btn-primary py-3 w-100 mb-4">Log In</button>
                        </form>
                        <p class="text-center mb-0">Don't Have An Account ! <a href="./Register.php">Register</a></p>
                    </div>
                    <?php if (isset($_GET['successmsg'])): ?>
                        <div id="flash-msg" class=" mt-3 alert alert-success" role="alert">
                            <?php echo $_GET['successmsg']; ?>
                        </div>
                    <?php elseif (isset($_GET['errormsg'])): ?>
                        <div id="flash-msg" class=" mt-3 alert alert-danger" role="alert">
                            <?php echo $_GET['errormsg']; ?>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./Admin/assets/lib/chart/chart.min.js"></script>
    <script src="./Admin/assets/lib/easing/easing.min.js"></script>
    <script src="./Admin/assets/lib/waypoints/waypoints.min.js"></script>
    <script src="./Admin/assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="./Admin/assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="./Admin/assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="./Admin/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="./Admin/assets/js/main.js"></script>
</body>

</html>