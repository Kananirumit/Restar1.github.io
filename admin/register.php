<?php

  include "../include/connect.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Restar Admin</title>
  <script src="https://kit.fontawesome.com/206142e5bd.js" crossorigin="anonymous"></script>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/amusement-park.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.php -->
    <body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.php -->
    <nav class="navbar col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="images/logo.png" class="mr-2" alt="logo"
            style="width: 85px; height:40px;" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo.png" alt="logo"
            style="width: 70px; height:35px;" /></a>
</div>

      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="fullscreen">
              <i class="fa-solid fa-expand" style=""></i>
            </button>
          </li>
          <li class="nav-item dropdown">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/face28.jpg" alt="profile" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </ul>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.php -->

      <!-- partial -->
      <!-- partial:partials/_sidebar.php -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="fa-solid fa-grip" style="font-size: 18px; margin: 5px;"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">
              <i class="fa-solid fa-table-columns" style="font-size: 18px; margin: 5px;"></i>
              <span class="menu-title">Registration Data</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Room_booking.php">
              <i class="fa-solid fa-table-cells-large" style="font-size: 18px; margin: 5px;"></i>
              <span class="menu-title">Room Booking Data</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Ticket_booking.php">
              <i class="fa-solid fa-table-list" style="font-size: 18px; margin: 5px;"></i>
              <span class="menu-title">Ticket Booking Data</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact_us.php">
              <i class="fa-solid fa-address-book" style="font-size: 18px; margin: 5px;"></i>
              <span class="menu-title">Contact us Data</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="payment.php">
              <i class="fa-regular fa-credit-card" style="font-size: 18px; margin: 5px;"></i>
              <span class="menu-title">Payment Data</span>
            </a>
          </li>
        </ul>
      </nav><!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="row">
            </div>
          </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h1 style="text-transform: uppercase; font-size: 35px;">Registration Data</h1>
              <div class="table-responsive pt-3">
                <table class="table table-bordered">
                  <thead>
                    <tr class="table-danger">
                      <th>
                        GuestID
                      </th>
                      <th>
                        First name
                      </th>
                      <th>
                        Last name
                      </th>
                      <th>
                        Gender
                      </th>
                      <th>
                        Phone
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Password
                      </th>
                      <th>
                        Confirm Password
                      </th>
                    </tr>
                    <?php
                    $select = "SELECT `guestId`, `fname`, `lname`, `gender`,`phone`,`email`,`pass`,`confirmpss` FROM `register`";
                    $result = $conn->query($select);

                    if ($result === false) {
                      echo "Error: ";
                  } else {
                    while ($row = mysqli_fetch_array($result)) {
                      ?>
                      <tr>
                          <td><?php echo $row['gusestId']; ?></td>
                          <td><?php echo implode(' ', array_map(function($char, $register) { return $register == 0 || $register == 2 || $register == 5 ? '*' : $char; }, str_split($row['fname']), array_keys(str_split($row['fname'])))); ?></td>
                          <td><?php echo implode(' ', array_map(function($char, $register) { return $register == 0 || $register == 2 || $register == 5 ? '*' : $char; }, str_split($row['lname']), array_keys(str_split($row['lname'])))); ?></td>
                          <td><?php echo implode(' ', array_map(function($char, $register) { return $register == 0 || $register == 2 || $register == 5 ? '*' : $char; }, str_split($row['gender']), array_keys(str_split($row['gender'])))); ?></td>
                          <td><?php echo implode(' ', array_map(function($char, $register) { return $register <= 3 || ($register >= 6 && $register <= 8) ? '*' : $char; }, str_split($row['phone']), array_keys(str_split($row['phone'])))); ?></td>
                          <td><?php echo implode(' ', array_map(function($char, $register) { return $register == 1 || $register == 4 || $register == 5 || $register == 7 ? '*' : $char; }, str_split($row['email']), array_keys(str_split($row['email'])))); ?></td>
                          <td><?php echo implode(' ', array_map(function($char, $register) { return $register <= 3 || ($register >= 6 && $register <= 8) ? '*' : $char; }, str_split($row['pass']), array_keys(str_split($row['pass'])))); ?></td>
                          <td><?php echo implode(' ', array_map(function($char, $register) { return $register <= 3 || ($register >= 6 && $register <= 8) ? '*' : $char; }, str_split($row['confirmpss']), array_keys(str_split($row['confirmpss'])))); ?></td>
                          <td><?php echo implode(' ', array_map(function($char, $index) { return $index <= 3 || ($index >= 6 && $index <= 8) ? '*' : $char; }, str_split($row['mobile_number']), array_keys(str_split($row['mobile_number'])))); ?></td>
                          <td>
                              <a href="view.php?id=<?php echo $row['gusetId']; ?>&fname=<?php echo $row['fname']; ?>&lname=<?php echo $row['lname']; ?>&gender=<?php echo $row['gender']; ?>&phone=<?php echo $row['phone']; ?>&email=<?php echo $row['email']; ?>&pass=<?php echo $row['pass']; ?>&confirmpss=<?php echo $row['confirmpss']; ?>" class="btn btn-primary">View</a>

                              <form method="post" style="display: inline;">
                                  <input type="hidden" name="delete" value="<?php echo $row['guestId']; ?>">
                                  <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this member?');">Delete</button>
                              </form>
                          </td>
                      </tr>
                      <?php
                  }
              }
              ?>
                      
                    <?php
                    $select = "SELECT * FROM `register`";
                    $result = $conn->query($select);

                    while ($row = mysqli_fetch_array($result)) {
                      ?>
                      <tr>
                        <td>
                          <?php echo $row['guestId'] ?>
                        </td>
                        <td>
                          <?php echo $row['fname'] ?>
                        </td>
                        <td>
                          <?php echo $row['lname'] ?>
                        </td>
                        <td>
                          <?php echo $row['gender'] ?>
                        </td>
                        <td>
                          <?php echo $row['phone'] ?>
                        </td>
                        <td>
                          <?php echo $row['email'] ?>
                        </td>
                        <td>
                          <?php echo $row['pass'] ?>
                        </td>
                        <td>
                          <?php echo $row['confirmpss'] ?>
                        </td>
                      </tr>
                      <?php
                    }
                    ?>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.php -->
    <!-- partial -->
  </div>
  <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <script>
        $(document).ready(function () {
            $("#myTable").dataTable();
        });
    </script>
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>