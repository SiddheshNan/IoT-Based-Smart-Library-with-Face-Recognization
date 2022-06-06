<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');


if ((isset($_GET['auth'])) && ($_GET['auth'] == 'rHpW4fzd')) {
    include("../includes/config.php");
    $sql = "SELECT * FROM users";

    $sth = mysqli_query($db, $sql);
    $rows = array();
    while ($r = mysqli_fetch_assoc($sth)) {
        $rows[] = $r;
    }
    $db->close();
    print json_encode($rows);
} else {
    echo '{"error":"unauthorized"}';
}
