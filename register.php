<?php include "connection.php";?>
<?php
    session_start();

    if (array_key_exists("logout", $_GET)) {
        
        unset($_SESSION);
        setcookie("email", "", time() - 60*60);
        $_COOKIE["email"] = "";  
        
        session_destroy();
        
    } 
    if (array_key_exists("submit", $_POST)) {
        
        include("connection.php");
            
        if ($_POST['signUp'] == '1') {
            
                $query = "SELECT name FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";

                $result = mysqli_query($link, $query);

                if (mysqli_num_rows($result) > 0) {

                    $error = "The email address is already taken.";

                } else {

                    $query = "INSERT INTO `users` (`name`,`contact`,`email`, `password`,`income`) VALUES ('".mysqli_real_escape_string($link, $_POST['fullname'])."','".mysqli_real_escape_string($link, $_POST['contact'])."','".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."','".mysqli_real_escape_string($link, $_POST['income'])."')";

                    if (!mysqli_query($link, $query)) {

                        $error = "<p>Could not sign you up - please try again later.</p>";

                    } else {

                        $query = "UPDATE `users` SET password = '".md5($_POST['password'])."' WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
                        
                        mysqli_query($link, $query);

                        $_SESSION['email'] = $_POST['email'];
                        $_SESSION['password']=$_POST['password'];

                        if ($_POST['rememberme'] == '1') {

                            setcookie("email", $_POST["email"], time() + 60*60*24*365);
                            setcookie("password", $_POST["password"], time() + 60*60*24*365);
                        } 
                            
                        header("Location:Admin/index.php");

                    }

                } 
                
            } else {
                    
                    $query = "SELECT * FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
                
                    $result = mysqli_query($link, $query);
                
                    $row = mysqli_fetch_array($result);
                
                    if (isset($row)) {
                        
                        $hashedPassword = md5($_POST['password']);
                        
                        if ($hashedPassword == $row['password']) {
                            
                            $_SESSION['email'] = $row['email'];
                            
                            if (isset($_POST['rememberme']) AND $_POST['rememberme'] == '1') {

                                setcookie("email", $_POST["email"], time() + 60*60*24*365);
                                setcookie("password", $_POST["password"], time() + 60*60*24*365);

                            } 

                            header("Location:Admin/index.php");
                                
                        } else {
                            
                            $error = "That email/password combination could not be found.";
                            
                        }
                        
                    } else {
                        
                        $error = "That email/password combination could not be found.";
                        
                    }
                    
               }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Inner Page - FlexStart Bootstrap Template</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <link
      href="assets/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />

    <!-- =======================================================
  * Template Name: FlexStart - v1.1.1
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  </head>

  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
      <div
        class="container-fluid container-xl d-flex align-items-center justify-content-between"
      >
        <a href="index.html" class="logo d-flex align-items-center">
          <img src="assets/logo.png" alt="" />
        </a>

        <nav id="navbar" class="navbar">
          <ul>
            <li>
              <a class="nav-link scrollto active" href="index.php">Home</a>
            </li>
            <li><a class="nav-link scrollto" href="#about">About</a></li>
            <li>
              <a class="nav-link scrollto" href="register.php">Register</a>
            </li>

            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            <li><a class="getstarted scrollto" href="login.php">Login</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
      </div>
    </header>
    <!-- End Header -->

    <main id="main">
      <!-- ======= Breadcrumbs ======= -->
      <section class="breadcrumbs">
        <div class="container">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
              <div class="card-body">
                <h5 class="card-title text-center">Sign In</h5>
                <form method="post" class="form-signin">
                  <div class="form-label-group">
                     <input type="hidden" name="signUp" value="1">
                    <input
                      type="text"
                      name="fullname"
                      id="fullname"
                      class="form-control"
                      placeholder="=Full Name"
                      required
                      autofocus
                    />
                    <label for="fullname">Full Name</label>
                  </div>

                  <div class="form-label-group">
                    <input
                      type="text"
                      name="contact"
                      id="number"
                      class="form-control"
                      placeholder="Contact Number"
                      required
                      autofocus
                    />
                    <label for="number">Contact Number</label>
                  </div>

                  <div class="form-label-group">
                    <input
                      type="email"
                      name="email"
                      value="<?php     if(isset($_COOKIE['email']))
    {
      echo $_COOKIE["email"];
    }   ?>"
                      id="inputEmail"
                      class="form-control"
                      placeholder="Email address"
                      required
                      autofocus
                    />
                    <label for="inputEmail">Email address</label>
                  </div>

                  <div class="form-label-group">
                    <input
                      type="password"
                      name="password"
                       value="<?php     if(isset($_COOKIE['password']))
    {
      echo $_COOKIE["password"];
    }   ?>"
                      id="inputPassword"
                      class="form-control"
                      placeholder="Password"
                      required
                    />
                    <label for="inputPassword">Password</label>
                  </div>

                  <div class="form-label-group">
                    <input
                      type="password"
                      id="reinputPassword"
                      class="form-control"
                      placeholder="Password"
                      required
                    />
                    <label for="reinputPassword">Re-enter Password</label>
                  </div>

                  <div class="form-label-group">
                    <select name="income" id="income">
                      <option value="default">Select income type</option>
                      <option value="3">< 3 LPA</option>
                      <option value="8">< 8 LPA</option>
                      <option value="12">< 12 LPA</option>
                      <option value="13">>12 LPA</option>
                    </select>
                  </div>

                  <div class="custom-control custom-checkbox mb-3">
                    <input
                      type="checkbox" name="rememberme" value=1
                      class="custom-control-input"
                      id="customCheck1"
                    />
                    <label
                      style="color: black"
                      class="custom-control-label"
                      for="customCheck1"
                      >Remember password</label
                    >
                  </div>
                  <button
                    class="btn btn-lg btn-primary btn-block text-uppercase"
                    type="submit" name="submit" value="SignIn"
                  >
                    Sign in
                  </button>
                  <hr class="my-4" />
                  <button
                    class="btn btn-lg btn-google btn-block text-uppercase"
                    type="submit"
                  >
                    <i class="fab fa-google mr-2"></i> Sign in with Google
                  </button>
                  <button
                    class="btn btn-lg btn-facebook btn-block text-uppercase"
                    type="submit"
                  >
                    <i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Breadcrumbs -->
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
      <div class="footer-newsletter">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
              <h4>Our Newsletter</h4>
              <p>
                Tamen quem nulla quae legam multos aute sint culpa legam noster
                magna
              </p>
            </div>
            <div class="col-lg-6">
              <form action="" method="post">
                <input type="email" name="email" /><input
                  type="submit"
                  value="Subscribe"
                />
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="footer-top">
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-info">
              <a href="index.html" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="" />
                <span>FlexStart</span>
              </a>
              <p>
                Cras fermentum odio eu feugiat lide par naso tierra. Justo eget
                nada terra videa magna derita valies darta donna mare fermentum
                iaculis eu non diam phasellus.
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"
                  ><i class="bi bi-instagram bx bxl-instagram"></i
                ></a>
                <a href="#" class="linkedin"
                  ><i class="bi bi-linkedin bx bxl-linkedin"></i
                ></a>
              </div>
            </div>

            <div class="col-lg-2 col-6 footer-links">
              <h4>Useful Links</h4>
              <ul>
                <li>
                  <i class="bi bi-chevron-right"></i> <a href="#">Home</a>
                </li>
                <li>
                  <i class="bi bi-chevron-right"></i> <a href="#">About us</a>
                </li>
                <li>
                  <i class="bi bi-chevron-right"></i> <a href="#">Services</a>
                </li>
                <li>
                  <i class="bi bi-chevron-right"></i>
                  <a href="#">Terms of service</a>
                </li>
                <li>
                  <i class="bi bi-chevron-right"></i>
                  <a href="#">Privacy policy</a>
                </li>
              </ul>
            </div>

            <div class="col-lg-2 col-6 footer-links">
              <h4>Our Services</h4>
              <ul>
                <li>
                  <i class="bi bi-chevron-right"></i> <a href="#">Web Design</a>
                </li>
                <li>
                  <i class="bi bi-chevron-right"></i>
                  <a href="#">Web Development</a>
                </li>
                <li>
                  <i class="bi bi-chevron-right"></i>
                  <a href="#">Product Management</a>
                </li>
                <li>
                  <i class="bi bi-chevron-right"></i> <a href="#">Marketing</a>
                </li>
                <li>
                  <i class="bi bi-chevron-right"></i>
                  <a href="#">Graphic Design</a>
                </li>
              </ul>
            </div>

            <div
              class="col-lg-3 col-md-12 footer-contact text-center text-md-start"
            >
              <h4>Contact Us</h4>
              <p>
                A108 Adam Street <br />
                New York, NY 535022<br />
                United States <br /><br />
                <strong>Phone:</strong> +1 5589 55488 55<br />
                <strong>Email:</strong> info@example.com<br />
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>FlexStart</span></strong
          >. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </footer>
    <!-- End Footer -->

    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
  </body>
</html>
