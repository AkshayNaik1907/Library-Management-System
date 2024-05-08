<?php

include("data.php");

$feedback = $_POST['feedback'];
$obj=new data();
    $obj->setconnection();
    $obj->feedback($feedback);