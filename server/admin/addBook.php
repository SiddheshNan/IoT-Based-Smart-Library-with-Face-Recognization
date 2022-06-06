<?php
session_start();
include("../includes/config.php");
if (($_SESSION['usertype'] != 'admin') || (!$_SESSION['login_user'])) {
    header("location: ./login.php");
    $db->close();
    exit();
}

$title = "Add Book";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = false;
    if ((!isset($_POST['book'])) || (!isset($_POST['rfid'])) || (!isset($_FILES['coverimg'])) || (!isset($_FILES['pdf']))) {
        $errors = 'Files not properly uploaded';
        $errors = true;
        $db->close();
    }

    try {
        $book =  mysqli_real_escape_string($db, $_POST['book']);
        $rfid =  mysqli_real_escape_string($db, $_POST['rfid']);

        ///--------- coverimage oprations start
        $mainimg = $_FILES['coverimg']['tmp_name'];       // get the file image
        $maxDim = 600;
        $target_filename = '';
        $file_name = $mainimg;
        list($width, $height, $type, $attr) = getimagesize($file_name);
        if ($width > $maxDim || $height > $maxDim) {
            $target_filename = $file_name;
            $ratio = $width / $height;
            if ($ratio > 1) {
                $new_width = $maxDim;
                $new_height = $maxDim / $ratio;
            } else {
                $new_width = $maxDim * $ratio;
                $new_height = $maxDim;
            }
            $src = imagecreatefromstring(file_get_contents($file_name));
            $dst = imagecreatetruecolor($new_width, $new_height);
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            imagedestroy($src);
            imagepng($dst, $mainimg); // adjust format as needed
            imagedestroy($dst);
        }
        $imgpath = dirname(__FILE__) . "/../booksimg/";  
        move_uploaded_file($mainimg, $imgpath . $_POST['book'] . '.png');
        //$mainimg_base64 = 'data:image/' . pathinfo($mainimg, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($mainimg));
        ///--------- coverimage oprations end


        //---- pdf opration start
        $indexpdf = $_FILES['pdf']['tmp_name'];        // get the file pdf
        $pdfpath = dirname(__FILE__) . "/../bookspdf/";        // get corret path for bookspdf foler
        $pdfname = $_POST['book'] . ".pdf";                   // only name eg --> thisisname.pdf
        move_uploaded_file($indexpdf, $pdfpath . $pdfname);
        //---- pdf opration end

        // echo '<img src="' . $mainimg_base64 . '" alt="" />';
    } catch (Exception $e) {
        $error = true;
        $errors = $e;
        $db->close();
    }

    if (!$error) { // if not error update database

        try {
            $imgpt = $_POST['book'] . '.png';

            $sql = "INSERT INTO books (book_name, book_rfid, issued_by_name, issued_by_rollno, issued_at, cover_img, indexpdf) 
        VALUES ('{$book}', '{$rfid}', 'Not Issued', 'Not Issued', 'Not Issued', '{$imgpt}' , '{$pdfname}')";

            if ($db->query($sql) === TRUE) {
                $success = true;
            } else {
                $errors = $sql . " " . $db->error;
                $db->close();
            }
        } catch (Exception $e) {
            $errors = $e;
            $db->close();
        }
    }
}

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
    if (isset($errors)) {
        echo "<script>alert(" . $errors . ");</script>";
    } else if (isset($success)) {
        echo "<script>alert(
            'Book Added Successfully'
        );</script>";
    }
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

                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="book">Book Name</label>
                                            <input type="text" id="book" name="book" class="form-control" placeholder="Book" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="rfid">Book RFID</label>
                                            <input type="text" id="rfid" name="rfid" class="form-control" placeholder="RFID" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="coverimg">Cover Image</label><br>
                                            <input type="file" name="coverimg" id="coverimg" accept="image/*" class="btn btn-success" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="pdf">Index PDF</label><br>
                                            <input type="file" name="pdf" id="pdf" accept="application/pdf" class="btn btn-success" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <br>
                                        <div style="  display: flex; justify-content: center;">

                                            <button class="btn btn-primary" type="submit">submit</button>
                                        </div>

                                    </div>

                                </div>
                            </div>


                        </form>
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