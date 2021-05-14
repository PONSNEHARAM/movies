<?php
echo "Seat booked successfully!!!!";
include "connection.php";
session_start();

// variables
$fname = $_POST['fName'];
$lname = $_POST['lName'];

$mobile = $_POST['pNumber'];
$theatre = $_POST['theatre'];
$type = $_POST['type'];
$date = $_POST['date'];
$time = $_POST['hour'];
$movieid = $_POST['movie_id'];
$order = "ARVR" . rand(10000, 99999999);
$cust  = "CUST" . rand(1000, 999999);

//sessions
// $_SESSION['ORDERID'] = $order;


//conditions
if ((!$_POST['submit'])) {
    echo "<script>alert('You are Not Suppose to come Here Directly');window.location.href='index.php';</script>";
}

if (isset($_POST['submit'])) {

    $qry = "INSERT INTO bookingtable(`movieID`, `bookingTheatre`, `bookingType`, `bookingDate`, `bookingTime`, `bookingFName`, `bookingLName`, `bookingPNumber`,`amount`, `ORDERID`)VALUES ('$movieid','$theatre','$type','$date','$time','$fname','$lname','$mobile','Not Paid','$order')";

    $result = mysqli_query($con, $qry);
}


?>