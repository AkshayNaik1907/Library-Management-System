<?php

include("data.php");

$student_id = $_GET['student_id'];
$student_password=$_GET['student_password'];
if($student_id==null||$student_password==null){
    $id="";
    $pass="";
    if($student_id==null){
        $id="Id Empty";
    }
    if($student_password==null){
        $pass="Password empty";
    }




    header("Location:index.php?student_id=$id&student_password=$pass");
}
else if($student_id!=null&& $student_password!=null){
    $obj=new data();
    $obj->setconnection();
    $obj->studentlogin($student_id,$student_password);
}