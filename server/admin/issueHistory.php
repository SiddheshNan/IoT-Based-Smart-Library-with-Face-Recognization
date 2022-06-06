<?php
session_start();
include("../includes/config.php");
if (($_SESSION['usertype'] != 'admin') || (!$_SESSION['login_user'])) {
    header("location: ./login.php");
    exit();
}

$title = "Book Issue History";

$sql = "SELECT * FROM issue_history";

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
                                    <th scope="col" class="sort" data-sort="id">ID</th>
                                    <th scope="col" class="sort" data-sort="book">Book</th>
                                    <th scope="col" class="sort" data-sort="action">Action</th>
                                    <th scope="col" class="sort" data-sort="studentname">Student Name</th>
                                    <th scope="col" class="sort" data-sort="rollno">RollNo</th>
                                    <th scope="col" class="sort" data-sort="datetime">DateTime</th>

                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>';
                                        echo "<th>{$row["id"]} </th>";
                                        echo "<th>{$row["book"]} </th>";
                                        echo "<th>{$row["action"]} </th>";
                                        echo "<th>{$row["student_name"]} </th>";
                                        echo "<th>{$row["student_rollno"]} </th>";
                                        echo "<th>{$row["datetime"]} </th>";
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