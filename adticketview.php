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
<?php session_start(); ?>
<div class="body content">
    <div class="welcome">
       <br/><br/><br/><br/><br/>
        
        <h1>Welcome back <span class="user"><?= $_SESSION['userName'] ?></span></h1>
        <?php
        $mysqli = new mysqli("localhost", "root", "", "webproject");
        $sql = "SELECT * FROM userbookings";
        $result = $mysqli->query($sql); //$result = mysqli_result object
        //var_dump($result);
        ?>
        <div id='registered'>
        <span><h2>All users:<h2></span>
        <?php
		echo "<table border=1 align=center>
		<tr>
		<th>Ticket ID</th>
		<th>User</th>
		<th>Venue</th>
		<th>Date</th>
        <th>Price</th>
        <th>Manage</th>
		</tr>";
        while($row = $result->fetch_assoc()){ //returns associative array of fetched row
            //echo '<pre>';
            //print_r($row);
            //echo '</pre>';
            echo "<tr><td>$row[id]</span></td><td>$row[user]</span></td><td><div class='userlist'><span>$row[venue]</span>";"</td>";
            echo "<td>$row[date]<td>$row[price]</td></div><td><a href='adticketview.php?idd=$row[id]'>Delete</a>";"</td></tr></table>";
			
			 
        }
		if(isset($_GET['idd'])){
			$idd = $_GET['idd'];
			$delsql = "delete from userbookings where id='$idd'";
			$query = $mysqli->query($delsql);
			if($delsql){
				?>
				<script>
					alert("Successfully deleted data");
					window.location.href='adticketview.php';
				</script>
				<?php
				header("Location: adticketview.php");
			}
			else{
				?>
				<script>
					alert("Failed to delete data");
					window.location.href='adticketview.php';
				</script>
				<?php
			}
		}
        ?>  
        </div>
		
    </table>
    <br/><br/>
    <div align="center">Go to: <button type="submit" class="btn btn-primary"><a href="book.php">EVENTS</a></button>
    <button type="submit" class="btn btn-primary"><a href="adminview.php">USERS</a></button></div>
    <br/><br/><br/><br/><br/><br/><br/>
    </div>
</div>
<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-2" style="background-color: rgb(50, 50, 50); padding-top: 1.75rem; padding-bottom: 1.75rem;">
    
    <div class="container">
        <p class="text-xs-center">Copyright &copy; 2018 Yusufwebs .</p>
    </div>
</footer>


  </body>
</html>
