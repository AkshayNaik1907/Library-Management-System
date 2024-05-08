<?php
include ("data.php");
$issue_book_name=$_POST['issue_book_name'];
$student_name=$_POST['student_name'];

 $obj=new data();
$obj->setconnection();
$obj->returnbook($issue_book_name,$student_name);