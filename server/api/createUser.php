<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');


if ((!isset($_GET['auth'])) || ($_GET['auth'] != 'rHpW4fzd')) {

    die('{"error":"unauthorized"}');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents('php://input'), true);

    if ((!isset($data['username'])  ||  (!$data['username']))) {

        die('{"error":"invalid username"}');
    }
    if ((!isset($data['password'])  ||  (!$data['password']))) {
        die('{"error":"invalid password"}');
    }
    if ((!isset($data['rollno'])  ||  (!$data['rollno']))) {
        die('{"error":"invalid rollno"}');
    }
    if ((!isset($data['branch'])  ||  (!$data['branch']))) {
        die('{"error":"invalid branch"}');
    }
    if ((!isset($data['section'])  ||  (!$data['section']))) {
        die('{"error":"invalid section"}');
    }
    include("../includes/config.php");
    $username = $data['username'];
    $password = $data['password'];
    $rollno = $data['rollno'];
    $branch = $data['branch'];
    $section = $data['section'];

    $sql = "SELECT username, rollno FROM users WHERE username = '{$username}' OR rollno = '{$rollno}'";

    $result = $db->query($sql);

    $count = mysqli_num_rows($result);

    if ($count > 0) {
        $db->close();
        die('{"error":"username or roll no already taken"}');
    }
    $sql = "INSERT INTO `users` (`id`, `username`, `password`, `rollno`, `branch`, `section`) VALUES (NULL, '{$username}', '{$password}', '{$rollno}', '{$branch}', '{$section}');";


    if ($db->query($sql) === TRUE) {
        echo '{"success":"user added to database"}';
        $db->close();
    } else {
        $db->close();
        die('{"error":"somthing went wrong"}');
        // echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    
    die('{"error":"method not allowed"}');
}
