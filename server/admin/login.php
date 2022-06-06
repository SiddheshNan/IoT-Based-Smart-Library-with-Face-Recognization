<?php
session_start();
include("../includes/config.php");
in_array("usertype", $_SESSION);
if(((isset($_SESSION['usertype'])) &&($_SESSION['usertype'] == 'admin'))&&($_SESSION['login_user'])){
   header("location: ./dashboard.php");
}
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 

    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT id FROM admins WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($db, $sql);
    
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);
    
    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1) {
        $_SESSION['login_user'] = $myusername;
        $_SESSION['usertype'] = 'admin';

        header("location: ./dashboard.php");
    } else {
        $error = "1";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Admin Login
    </title>
    <!-- Favicon -->
  <?php
 include('../includes/incCSS.php');
 ?>
</head>

<body class="bg-default">
    <div class="main-content">
        <!-- Navbar -->
        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-8">
            <div class="container">

            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary shadow border-0">

                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <h2>Admin Login</h2>
                            </div>
                            <form role="form" method="POST">
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Username" name="username" id="username" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Password" type="password" name="password" id="password" required>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Sign in</button>
                                </div>
                            </form>

                            <hr class="my-1">
                                <div class="text-center">
                                
                                <a href="/" class="btn btn-warning my-4">Click here for Homepage</a>
                                </div>
                            
                        </div>
                        <?php 
                        if($error != null){
                            echo '<div class="alert alert-danger" role="alert"><strong>Error!</strong> Invaild Username or Password!</div>';
                            unset($error);
                        }
                        
                        ?>
                        
                    </div>

                </div>
            </div>

        </div>
        <!--   Core   -->
        <?php
 include('../includes/incJS.php');
 ?>
</body>

</html>