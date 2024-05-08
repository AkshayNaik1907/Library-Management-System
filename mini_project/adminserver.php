<?php

include("data.php");

$admin_id = $_GET['admin_id'];
$admin_password=$_GET['admin_password'];
if($admin_id==null||$admin_password==null){
    $id="";
    $pass="";
    if($admin_id==null){
        $id="Id Empty";
    }
    if($admin_password==null){
        $pass="Password empty";
    }


    header("Location:index.php?admin_id=$id&admin_password=$pass");
}
else if($admin_id!=null&& $admin_password!=null){
    $obj=new data();
    $obj->setconnection();
    $obj->adminlogin($admin_id,$admin_password);
}