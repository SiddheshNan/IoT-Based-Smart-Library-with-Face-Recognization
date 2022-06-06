<?php
session_start();
include("../includes/config.php");
if (($_SESSION['usertype'] != 'admin') || (!$_SESSION['login_user'])) {
    header("location: ./login.php");
    exit();
}

$title = "Manage Students";

$sql = "SELECT * FROM users";

$result = $db->query($sql);

$db->close();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?php
        echo $title;
        ?>

    </title>
    <!-- Favicon -->

    <?php
    include('../includes/incCSS.php');
    ?>
</head>

<body>
    <!-- Sidenav -->
    <?php
    include('../includes/adminNav.php');
    ?>


    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0"><?php
                                                                        echo $title;
                                                                        ?></h6>
          <br><h6 class="h5 text-white d-inline-block mb-0">New Students should be added from raspberry pi.</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0"><?php
                                            echo $title;
                                            ?></h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                  
                                    <th scope="col" class="sort" >Username</th>
                                    <th scope="col" class="sort" ">Password</th>
                                    <th scope="col" class="sort" >RollNo</th>
                                    <th scope="col" class="sort" >Branch</th>
                                    <th scope="col" class="sort" >Section</th>

                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>';
                                      
                                        echo "<th>{$row["username"]} </th>";
                                        echo "<th>{$row["password"]} </th>";
                                        echo "<th>{$row["rollno"]} </th>";
                                        echo "<th>{$row["branch"]} </th>";
                                        echo "<th>{$row["section"]} </th>";
                                        echo '</tr>';
                                    }
                                } else {
                                    echo "<tr><th>no results found</th></tr>";
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>
    <?php
    include('../includes/incJS.php');
    ?>
</body>

</html>