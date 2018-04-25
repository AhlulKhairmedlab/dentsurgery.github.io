<?php

    session_start();
    $hostname = 'localhost';
    $dbname   = 'webproject';
    $username = 'root'; 
    $password = '';
	
    $con = new mysqli($hostname, $username, $password, $dbname);

    $userName=mysqli_real_escape_string($con,$_POST['user']); 
    $passWord=md5(mysqli_real_escape_string($con,$_POST['password'])); 
    $query = "SELECT * FROM admin WHERE username='$_POST[user]' AND  password='$_POST[password]'";
    $res = mysqli_query($con,$query);
    $rows = mysqli_num_rows($res);
   
	if ($rows==1) 
    {
        $_SESSION['userName'] = $_POST['user'];
		echo "Succesfully Loged in as admin";
        header("Location: adminview.php");
    }
    else 
    {
        echo "user name and password not found";
        // TODO - replace message with redirection to login page
        //  header("Location: index.html");
    }
