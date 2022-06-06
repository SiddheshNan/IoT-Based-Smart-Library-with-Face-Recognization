<?php
session_start();
if (($_SESSION['usertype'] != 'user') || (!$_SESSION['login_user'])) {
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
  <title>Student Dashboard</title>
  <!-- Favicon -->
  <?php
  include('../includes/incCSS.php');
  ?>
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
          </div>
        </div>

        <!-- Card stats -->
        <div class="row" >

        <div class="col-xl-3 col-md-6" class="col-xl-3 col-md-6" style="  display: block;
  margin-left: auto;
  margin-right: auto;">
            <div class="card card-stats">
              <!-- Card body -->
              <a href="./viewBooks.php">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <span class="h2 font-weight-bold mb-0">View Books Catalog</span>
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
          
          <div class="col-xl-3 col-md-6" class="col-xl-3 col-md-6" style="  display: block;
  margin-left: auto;
  margin-right: auto;">
            <div class="card card-stats">
              <!-- Card body -->
              <a href="./myIssuedBooks.php">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <span class="h2 font-weight-bold mb-0">My Current Issued Books</span>
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
         

          <div class="col-xl-3 col-md-6" class="col-xl-3 col-md-6" style="  display: block;
  margin-left: auto;
  margin-right: auto;">
            <div class="card card-stats">
              <!-- Card body -->
              <a href="./myIssueHistory.php">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <span class="h2 font-weight-bold mb-0">My Issued Books History</span>
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