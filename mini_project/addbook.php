<?php
include("data.php");
$book_name=$_POST['book_name'];
$author=$_POST['author'];
$branch=$_POST['branch'];
$quantity=$_POST['quantity'];
$book_available=$_POST['book_available'];
$Rack=$_POST['Rack'];
$Sub_Rack=$_POST['Sub_Rack'];

$obj=new data();
$obj->setconnection();
$obj->addbook($book_name,$author,$branch,$quantity,$book_available,$Rack,$Sub_Rack);