<?php
function checkMethod($method){
    if($method=== 'POST'){
        return true;
    }else{
        return false;
    }
}

function redirect($path){
    header("Location:$path");
}

function sanitizeInput($input){
    return htmlspecialchars(trim($input));
}

function userExist($file,$email){
    $jsonDataFile = file_get_contents("../data/user.json");  
    $jsonDataArray = json_decode($jsonDataFile,true);
    foreach($jsonDataArray as $user){
        if($user['email']==$_POST['email']){
            return true;
}
}
return false;
}

function passwordUserExist($file){
    $jsonDataFile = file_get_contents("../data/user.json");  
    $jsonDataArray = json_decode($jsonDataFile,true);
    foreach($jsonDataArray as $user){
        if($user['password']==sha1($_POST['password'])&&$user['email']==$_POST['email']){
            return true;
}
}
return false;
}