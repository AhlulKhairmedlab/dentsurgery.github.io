  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
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
<div class="container">
<p>Add new rooms to Block</p>
		   <form action="book.php" method="post" enctype="multipart/form-data"><br/><br/><br/><br/>
		   	   <input type="file" name="image" required />
               <input type="text" name="venue" placeholder="Enter Name and Venue" required/>
               <input type="date" name="date"  required/>
			   <input type="text" name="price" placeholder="Price in RM" required/>
			   <input type="submit" name="submit" value="Add" />		   
           </form>

<?php
		   $mysqli = new mysqli("localhost","root","","webproject");
			 $msg = "";	
			 $result = mysqli_query($mysqli, "SELECT * FROM bookings");
			 while($row = mysqli_fetch_array($result)){
				/*echo "<table class='mbr-section-small' ><tr><td><img src='images/$row[artimage]' width=350 height=200 /> </td>";
				echo "<td> ".$row['venue']." </td>";
                echo "<td> ".$row['date']." </td>";
                echo "<td> ".$row['price']." </td>";
                echo "<td> <a href='book.php?idd=$row[id]'>Delete</a></td></tr></table>";*/
                echo"<div class='mbr-cards-col col-xs-12 col-lg-3' style='padding-top: 80px; padding-bottom: 80px;'>
                        <div class='container'>
                            <div class='card cart-block'>
                                <div class='card-img'><img src='images/$row[artimage]' class='card-img-top' height=300 width=300 ></div>
                                    <div class='card-block'>
                                        <h4 class='card-title'>The Best is Us</h4>
                                        <h5 class='card-subtitle'>Enjoy live Concerts<br>
                                        <b>".$row['venue']."<br>
                                        ".$row['price']."<br>
                                         United States<br>
                                         ".$row['date']."<br>
                                         <a href='book.php?idd=$row[id]'>Delete</a>
                                        </b>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                    </div>";
			}    
		   if(isset($_POST['submit'])){
               $venue = $_POST['venue'];
               $date = $_POST['date'];
		   	   $price = $_POST['price'];
			   $target_dir = "images/";
			   $target_file = $target_dir . basename($_FILES['image']['name']);
			   $image = $_FILES['image']['name'];
				// Get text
                $venue = mysqli_real_escape_string($mysqli, $_POST['venue']);
                $date = mysqli_real_escape_string($mysqli, $_POST['date']);
				$price = mysqli_real_escape_string($mysqli, $_POST['price']);

				// image file directory
				$sql = "INSERT INTO bookings (artimage, venue, date, price) VALUES ('$image', '$venue', '$date','$price')";
				// execute query
				mysqli_query($mysqli, $sql);

				if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
					$msg = "<div id='alert alert-success'> Image uploaded successfully </div>";
				}else{
					$msg = "Failed to upload image";
				}
				?>
				<script>
					alert("Successfully added room");
					window.location.href='book.php';
				</script>
				<?php
			}
			 if(isset($_GET['idd'])){
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
			
			}
		
			  
		   
?>
</table>
<div align="center">Go to: <button type="submit" class="btn btn-primary"><a href="adminview.php">Users</a></button>
<button type="submit" class="btn btn-primary"><a href="adticketview.php">User Tickets</a></button></div>
<br/><br/><br/></div>
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