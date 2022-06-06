<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

if ((!isset($_GET['auth'])) || ($_GET['auth'] != 'rHpW4fzd')) {

    die('{"error":"unauthorized"}');
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents('php://input'), true);

    if ((!isset($data['rfid'])  ||  (!$data['rfid']))) {

        die('{"error":"no rfid"}');
    }
    if ((!isset($data['rollno'])  ||  (!$data['rollno']))) {
        die('{"error":"no rollno"}');
    }
    if ((!isset($data['username'])  ||  (!$data['username']))) {
        die('{"error":"no username"}');
    }

    include("../includes/config.php");
    $username = $data['username'];
    $rfid = $data['rfid'];
    $rollno = $data['rollno'];


 

    $sql = "SELECT book_name FROM books WHERE book_rfid = '{$rfid}'";
    $bookname =  mysqli_fetch_array($db->query($sql))[0];
    if (!$bookname) {
        $db->close();
        die('{"error":"invalid rfid"}');
    }


    $sql = "UPDATE `books` SET `issued_by_name` = 'Not Issued', `issued_by_rollno` = 'Not Issued', `issued_at` = 'Not Issued' WHERE `books`.`book_rfid` = '{$rfid}'";


    if ($db->query($sql) == FALSE) {
        $db->close();
        die('{"error":"error updating books"}');
        // echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "INSERT INTO `issue_history` (`id`, `book`, `student_name`, `student_rollno`, `datetime`, `action`) VALUES (NULL, '{$bookname}', '{$username}', '{$rollno}', current_timestamp(), 'return')";

    if ($db->query($sql) == FALSE) {
        $db->close();
        die('{"error":"error updating issue_history"}');
        // echo "Error: " . $sql . "<br>" . $conn->error;
    }

    echo '{"success":"book retuned"}';
    $db->close();
    
} else {
    die('{"error":"method not allowed"}');
}
