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
        
        
        <h1>Welcome <span class="user"><?= $_SESSION['userName'] ?></span></h1>
        <?php
        $mysqli = new mysqli("localhost", "root", "", "webproject");
        if(isset($_POST['update'])){
			$UpdateQury = "UPDATE users SET firstname='$_POST[firstname]',lastname='$_POST[lastname]',email='$_POST[email]',phone='$_POST[phone]',username='$_POST[user]',password='$_POST[password]' WHERE firstname='$_POST[hidden]'";
			mysqli_query($mysqli,$UpdateQury);
		};
		
		//Select queries return a resultset
        $id='1';
		$sql = "SELECT firstname,lastname,username,phone, email,password FROM users WHERE username='$_SESSION[userName]'";
        $result = $mysqli->query($sql); //$result = mysqli_result object
        //var_dump($result);
		/*if($result){
			echo "Update Successful";
		}
		else{
			echo "Error Occurred, Update Failed!"; 
		}*/
        ?>
        <div id='registered'>
        <span><h2>Your Details:<h2></span>
        <?php
		echo "<table>
		<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Username</th>
		<th>Password</th>
		</tr>";
        while($row = $result->fetch_assoc()){ //returns associative array of fetched row
		echo "<form action=userupdate.php method=post>";

            echo "<tr>";
			echo "<td>" . "<input type=text name=firstname value=" . $row['firstname'] . " </td>";
			echo "<td>" . "<input type=text name=lastname value=" . $row['lastname'] . " </td>";
			echo "<td>" . "<input type=email name=email value=" . $row['email'] . " </td>";
			echo "<td>" . "<input type=text name=phone value=" . $row['phone'] . " </td>";
			echo "<td>" . "<input type=text name=user value=" . $row['username'] . " </td>";
            echo "<td>" . "<input type=text name=password value=" . $row['password'] . " </td>";
			echo "<td>" . "<input type=hidden name=hidden value=" . $row['firstname']. " </td>";
			echo "<td>" . "<input type=submit name=update value=update />" . " </td>";
			echo "</tr>";
			echo "</form>";
        }
		
		echo "</table>";
			$error = "";
		if(isset($_POST['update'])){
			echo "Update Successful <br/>";
		}
		elseif(mysqli_error($mysqli)){
			$error = "Error Occurred, Update Failed!"; 
			echo $error;
		}
        ?>  
        <p align="center"><br/><br/><button type="submit" class="btn btn-primary"><a href="book.html">Book Tickets</a></button></p>
        </div>
    </div>
</div>

</body>
</html>