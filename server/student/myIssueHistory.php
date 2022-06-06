<?php
session_start();
include("../includes/config.php");
if (($_SESSION['usertype'] != 'user') || (!$_SESSION['login_user'])) {
    header("location: ./login.php");
    exit();
}

$title = "My Issued Books History";

$sql = "SELECT * FROM issue_history WHERE student_rollno = '{$_SESSION['rollno']}'";

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
    <style>
        .tbimg{
            width: 20vh;
  height: auto;
        }
    </style>
</head>

<body>
    <!-- Sidenav -->
    <?php
    include('../includes/userNav.php');
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
                                  
                                    <th scope="col" class="sort" >Image</th>
                                    <th scope="col" class="sort" >BookName</th>
         
                                    <th scope="col" class="sort" >Action</th>
                                    <th scope="col" class="sort" >Issue DateTime</th>


                                    <th scope="col" class="sort" >Index</th>

                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>';
                                       
                                        echo "<th><img class='tbimg' src='/booksimg/{$row["book"]}.png' alt=''> </th>";
                                        echo "<th>{$row["book"]} </th>";
                                        echo '<th><span class="badge badge-pill badge-lg badge-success" style="font-size:90%;">'.$row["action"].'</span></th>';
                                        echo "<th>{$row["datetime"]} </th>";
                     
                                        echo "<th><a href='/bookspdf/{$row["book"]}.pdf' target='_blank' class='btn btn-success btn-sm'>Click here</a> </th>";
                                        
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