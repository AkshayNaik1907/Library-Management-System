<?php
include ("data.php");
 $book_name=$_POST['book_name'];
 $student_name=$_POST['student_name'];
 $issue_date=date("d/m/Y");
 $issue_days=$_POST['issue_days'];
 $return_date=date("d/m/Y",strtotime('+'.$issue_days.'days'));

 $obj=new data();
$obj->setconnection();
$obj->issuebook($book_name,$student_name,$issue_date,$issue_days,$return_date);
