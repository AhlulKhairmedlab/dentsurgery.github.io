<div align=center>
<form action="carloan.php" method="POST">
Car Price: <input type="text" name="carprice" placeholder="Enter car price" required/>
Yearly Loan: <input type="text" name="year_loan" placeholder="Enter years of loan" required/>
Interest Rate: <input type="text" name="interest" placeholder="Enter interest rate" required/>
<input type="submit" name="submit" value="Submit" />
</form>
</div>

<?php
$carprice = $_POST['carprice'];
$yearl = $_POST['year_loan'];
$interest = $_POST['interest'];

if(isset($_POST['submit'])){
    $int  = $interest/100;
    $mon = $carprice + (($int*$yearl)*$carprice);
    $tmonths = $yearl*12;
    $montly_car = $mon/$tmonths;
    echo "Your monthly car loan price is ". $montly_car;
}
else{
    echo "Error Occured";
}