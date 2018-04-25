<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="logojam.jpg" type="image/x-icon">
  <meta name="description" content="">
  <title>Classic Bookings</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <body>
<section id="menu-0">

    <nav class="navbar navbar-dropdown navbar-fixed-top">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-brand">
                        <a href="index.html" class="navbar-logo"><img src="logo.png" alt="Mobirise"></a>
                        <a class="navbar-caption" href="index.html">CLASSIC BOOKINGS</a>
                    </div>

                </div>
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar"><li class="nav-item nav-btn"><a class="nav-link btn btn-white btn-white-outline" href="about.html">ABOUT</a></li><li class="nav-item nav-btn"><a class="nav-link btn btn-white btn-white-outline" href="concerts.html">TICKETS</a></li><li class="nav-item nav-btn"><a class="nav-link btn btn-white btn-white-outline" href="register.html">REGISTER</a></li><li class="nav-item nav-btn"><a class="nav-link btn btn-white btn-white-outline" href="login.html">LOGIN</a></li</ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>
<?php

    session_start();
    $hostname = 'localhost';
    $dbname   = 'webproject';
    $username = 'root'; 
    $password = '';
	
    $con = new mysqli($hostname, $username, $password, $dbname);

    $userName=mysqli_real_escape_string($con,$_POST['user']); 
    $passWord=md5(mysqli_real_escape_string($con,$_POST['password'])); 
    $query = "SELECT * FROM users WHERE username='$_POST[user]' AND  password='$_POST[password]'";
    $res = mysqli_query($con,$query);
    $rows = mysqli_num_rows($res);
   
	if ($rows==1) 
    {
        $_SESSION['userName'] = $_POST['user'];
		echo "Succesfully Logedin";
        header("Location: userview.php");
    }
    else 
    {

        ?>
         <br/><br/><br/><br/><br/><br/><br/>
        <div class="Content" align="center">
            The Username or Password you entered is either incorrect or invalid<br>
            <button type="submit" class="btn btn-primary"><a href="login.html">Login</a></button>
             again or <button type="submit" class="btn btn-primary"><a href="register.html">Register</a></button><br><br>
            For enquiries, you can contact our manager yusufsunusi63@gmail.com (Mr. Yusuf)</a>
            <br/><br/><br/><br/><br/><br/><br/> <br/><br/><br/><br/><br/><br/>
        </div>
        <script>
            alert("Username or Password Incorrect");
            window.href.location(login.html);
            </script>
    <?php
    //header("Location: login.php");
    }
    ?>
    <footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-2" style="background-color: rgb(50, 50, 50); padding-top: 1.75rem; padding-bottom: 1.75rem;">
    
    <div class="container">
        <p class="text-xs-center">Copyright &copy; 2018 Yusufwebs .</p>
    </div>
</footer>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
  <script src="assets/jarallax/jarallax.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
  <input name="animation" type="hidden">
  </body>
</html>
