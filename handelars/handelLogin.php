<?php
session_start();
include('../core/f.php');
include('../core/v.php');

$errors=[];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {

    foreach($_POST as $key => $input){
        $$key = sanitizeInput($input);
    }

    if(!requiredVal($email)){
        $errors[] = "email is required value";
    }elseif(!emailVal($email)){
        $errors[] = "please type a valid email";
    }

    if(!requiredVal($password)){
        $errors[] = "password is required value";
    }elseif(!minVal($password, 6)){
        $errors[] = "password must be greater than 3 chars";
        
    }elseif(!maxVal($password, 25)){
        $errors[] = "password must be smaller than 25 chars";
    }

    if(empty($errors)){
        if(filesize("../data/user.json")==0){
            $errors[] = "You does not have account creat one";
            $_SESSION["errors"] = $errors;
            redirect('../login.php');
        }else{
            if(passwordUserExist("../data/user.json")){
                $jsonDataFile = file_get_contents("../data/user.json");  
                $jsonDataArray = json_decode($jsonDataFile,true);
                foreach($jsonDataArray as $user){
                    if($user['email']==$_POST['email'] && $user['password']==sha1($_POST['password'])){
                        $_SESSION['auth'] = [$user['name'],$user['email'],$user['id']];
                        $_SESSION['login'] = true;
                        redirect('../index.php'); 
                        die;   
                    }
            }
            }else{
                $errors[] = "You does not have account creat one";
                $_SESSION["errors"] = $errors;
                redirect('../login.php');
            }

        }
    }else{
        $_SESSION["errors"] = $errors;
        redirect('../login.php');
    }

}else{
    echo 'not supported';
}