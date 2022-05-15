<?php
session_start();
include('../core/c.php');
include('../core/m.php');

$errors=[];
if ($_SERVER['REQUEST_METHOD']) {

    $jsonDataFile = file_get_contents("../data/user.json");  
    $jsonDataArray = json_decode($jsonDataFile,true);

    foreach($jsonDataArray as $key => $user){
        if($user['id']==$_POST['id']){
            unset($jsonDataArray[$key]);
           
                $jsonDataArray = json_encode($jsonDataArray);
                file_put_contents("../data/user.json", $jsonDataArray);
        }
    }
}else{
    echo 'not supported';
}