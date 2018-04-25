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
$servername="localhost";
$artist = $_POST["artist"];
$venue = $_POST["venue"];
$date = $_POST["date"];
$name = $_POST["username"];
$seat = $_POST["seat"];
$tickno = $_POST["tickno"];
$user = "root";
$password = "";
$database = "webproject";

 $con = new mysqli($servername, $user, $password, $database);

 session_start();
 $userName = $_POST['user'];
 $userName=mysqli_real_escape_string($con,$_POST['username']); 
 $sql = "INSERT INTO bookings(artist,venue,date,name,seat,tickno) VALUES ('$artist','$venue','$date','$name','$seat','$tickno')";

 if($con->query($sql)=== TRUE){
	 echo "<br/><br/>Successfully Booked Ticket";
	 
	 echo "<div class=welcome>";
       $_SESSION['userName']=$_POST['username'];
	   
        echo "<br/>";
       echo " Hello <span class=user>". $_SESSION['userName'] ;" </span>";
        
        $mysqli = new mysqli("localhost", "root", "", "webproject");
        
        $sql = "SELECT artist,venue,date,name,seat,tickno FROM bookings WHERE name='$_SESSION[userName]'";
        $result = $mysqli->query($sql); 
        
       echo "<div id='registered'>";
       echo "<span><h2>Your Ticket:<h2></span>";
		echo "<table border=1 align=center>
		<tr>
		<th>Artist</th>
		<th>Venue</th>
		<th>Date</th>
		<th>Name</th>
		<th>Seat</th>
		<th>No of Tickets</th>
		</tr>";
        while($row = $result->fetch_assoc()){ 

            echo "<tr><td>$row[artist]</span></td><td>$row[venue]</span></td><td><div class='userlist'><span>$row[date]</span>";"</td>";
             echo "<td>$row[name]<td>$row[seat]<td>$row[tickno]</td></div>";"</td></tr></table>";
			 
        }
       // ?  
        echo "</div>";
		echo "Enjoy your concert!!!";
 }
 
 else{
	 echo "Error".$sql."br".$con->error;
 }
 $con->close();


?>
</table>
<br/><br/><br/><br/><br/><br/><br/><br/>
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