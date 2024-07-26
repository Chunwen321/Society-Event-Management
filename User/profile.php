<?php
@include 'config.php';

session_start();

if (!isset($_SESSION['user_id'])) {
  header('location:login.php');
  exit(); // Prevent further execution if user is not logged in
}

// Fetch user profile data from the database
$userID = $_SESSION['user_id'];
$query = "SELECT * FROM user WHERE userID = '$userID'";
$result = mysqli_query($conn, $query);

// Initialize $user array
$user = array();

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
}
?>


<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="includes/header-footer.css" rel="stylesheet">
  <link rel="icon" href="includes/image/logo.png" type="image/icon type">
  
  <!-- Favicons -->
  <link href="includes/assets/img/favicon.png" rel="icon">
  <link href="includes/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="includes/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="includes/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="includes/assets/css/style.css" rel="stylesheet">
</head>

<body>

   <!--header Start-->

   <?php include 'header.php'; ?>

    <!--header End-->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="includes/img/<?php echo $user['pp']; ?>" alt="Profile" class="rounded-circle">
              <h2><?php echo $user['name']; ?></h2>
              <h3><?php echo $user['programme']; ?></h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <a class="nav-link active" href="profile.php">Overview</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="editprofile.php">Edit Profile</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="password.php">Change Password</a>
              </li>
              </ul>

              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic"><?php echo $user['about']; ?></p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $user['name']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Student ID</div>
                    <div class="col-lg-9 col-md-8"><?php echo $user['studentID']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?php echo $user['phone']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $user['email']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Gender</div>
                    <div class="col-lg-9 col-md-8"><?php echo $user['gender']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Programme</div>
                    <div class="col-lg-9 col-md-8"><?php echo $user['programme']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Nationality</div>
                    <div class="col-lg-9 col-md-8"><?php echo $user['nationality']; ?></div>
                  </div>

                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->



</body>
<!-- Footer Start -->

<?php include 'footer.php'; ?>
    <!-- Footer End -->
</html>