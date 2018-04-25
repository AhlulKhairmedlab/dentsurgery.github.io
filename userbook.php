<!DOCTYPE html>
<html>
<head>
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
  
  
  
</head>
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

<section class="mbr-section mbr-after-navbar" id="form1-e" style="background-color: rgb(255, 255, 255); padding-top: 120px; padding-bottom: 120px;">
    
    <div class="mbr-section mbr-section__container mbr-section__container--middle">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-center">
                    <h3 class="mbr-section-title display-2"><font color="cc4747">BOOKING FORM</font></h3>
                    <small class="mbr-section-subtitle">Fill out the form and book your tickets at the most affordable price.</small>
                </div>
            </div>
        </div>
    </div>
    <div class="mbr-section mbr-section-nopadding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1" >


                    <div data-form-alert="true">
                        <div hidden="" data-form-alert-success="true" class="alert alert-form alert-success text-xs-center">Thanks for filling out the form!</div>
                    </div>
<?php
session_start();
		   $mysqli = new mysqli("localhost","root","","webproject");
			 $msg = "";	
			 $result = mysqli_query($mysqli, "SELECT * FROM bookings");
			 while($row = mysqli_fetch_array($result)){
                echo"<div class='mbr-cards-col col-xs-12 col-lg-3' style='padding-top: 80px; padding-bottom: 80px;'>
                        <div class='container'>
                            <div class='card cart-block'>
                                <div class='card-img'><img src='images/$row[artimage]' class='card-img-top' height=300 width=300 ></div>
                                    <div class='card-block'>
                                        <h4 class='card-title'>The Best is Us</h4>
                                        <h5 class='card-subtitle'>Enjoy live Concerts<br>
                                        <form action='userbook.php' method='GET'>
                                        <b><input type=text name=venue value=".$row['venue']." /> <br>
                                        <input type=text name=price value=".$row['price']." /> <br>
                                         United States<br>
                                         <input type=text name=date value=".$row['date']." /> <br>
                                         <button type='submit' name=submit class='btn btn-primary'><a href='userbook.php?idd=$row[id]'>Book Ticket</a></button>
                                        </b>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                    </div>";
            }    
            if(isset($_GET['submit'])){
                $idd = $_GET['idd'];
                $venue = $_GET['venue'];
                $date = $_GET['date'];
                   $price = $_GET['price'];
               /* $target_dir = "images/";
                $target_file = $target_dir . basename($_FILES['image']['name']);
                $image = $_FILES['image']['name'];
                 // Get text*/
                 $user = $_SESSION['userName'] ;
                 $venue = mysqli_real_escape_string($mysqli, $_GET['venue']);
                 $date = mysqli_real_escape_string($mysqli, $_GET['date']);
                 $price = mysqli_real_escape_string($mysqli, $_GET['price']);

                 $sql = "INSERT INTO userbookings (user, venue, date, price) VALUES ('$user', '$venue', '$date','$price') where id='$idd'";
                 
                 $result=mysqli_query($mysqli, $sql);
                 if($result===TRUE){
                    ?>
                    <script>
                        alert("Successfully booked ticket");
                        window.location.href='userticketview.php';
                    </script>
                    <?php
                    header("Location: ticketview.php");
                 }
                 
             }
		   
			 /*if(isset($_GET['idd'])){
				$idd = $_GET['idd'];
				$delsql = "delete from bookings where id='$idd'";
				$query = $mysqli->query($delsql);
				if($delsql){
					?>
					<script>
						alert("Successfully deleted data");
						window.location.href='book.php';
					</script>
					<?php
					//header("Location: adminadd.php");

				}
				else{
					?>
					<script>
						alert("Failed to delete data");
						window.location.href='book.php';
					</script>
					<?php
				}
			
			}*/
		
			  
		   
?>
</table>
<div align="center">Go to: <button type="submit" class="btn btn-primary"><a href="userview.php">My Profile</a></button></div>
<br/><br/><br/></div>


                </div>
            </div>
        </div>
    </div>
</section>

<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-c" style="background-color: rgb(50, 50, 50); padding-top: 1.75rem; padding-bottom: 1.75rem;">
    
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
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/formoid/formoid.min.js"></script>
  
  
  <input name="animation" type="hidden">
  </body>
</html>