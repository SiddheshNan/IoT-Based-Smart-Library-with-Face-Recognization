<?php
session_start();
if (($_SESSION['usertype'] != 'admin') || (!$_SESSION['login_user'])) {
  header("location: ./login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Admin Dashboard</title>
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
          </div>
        </div>

        <!-- Card stats -->
        <div class="row">
          
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <a href="./addBook.php">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <span class="h2 font-weight-bold mb-0">Add Book</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                      <i class="ni ni-book-bookmark"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
          </div>
         
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <a href="./manageBooks.php">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <span class="h2 font-weight-bold mb-0">Manage Book</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                      <i class="ni ni-books"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <a href="./issueHistory.php">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <span class="h2 font-weight-bold mb-0">Book Issue History</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                      <i class="ni ni-collection"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <a href="./manageStudents.php">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <span class="h2 font-weight-bold mb-0">Manage Students</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                      <i class="ni ni-single-02"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
          </div>

        </div>
        <div class="row">
        <div class="col-xl-3 col-md-6" style="  display: block;
  margin-left: auto;
  margin-right: auto;">
            <div class="card card-stats">
              <!-- Card body -->
              <a href="./logout.php">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <span class="h2 font-weight-bold mb-0">Logout</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                    <i class="fas fa-sign-out-alt"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>




  <!-- Footer -->

  </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <?php
  include('../includes/incJS.php');
  ?>
</body>

</html>