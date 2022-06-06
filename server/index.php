<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Smart Library System
    </title>
    <!-- Favicon -->
    <?php
    include('./includes/incCSS.php');
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

<h2 class="text-center">Welcome to Smart Library System</h2>
<br>

                            <hr class="my-1">
                            <div class="text-center">

                                <a href="/admin" class="btn btn-primary my-4">Click here for Admin Login Page</a>
                            </div>

                            <hr class="my-1">

                            <div class="text-center">

                                <a href="/student" class="btn btn-success my-4">Click here for Student Login Page</a>
                            </div>

                            <hr class="my-1">
                        </div>

                    </div>

                </div>
            </div>

        </div>
        <!--   Core   -->
        <?php
        include('./includes/incJS.php');
        ?>
</body>

</html>