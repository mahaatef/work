<?php
session_start();
include('../core/f.php');
include('../core/v.php');

$errors=[];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {

    foreach($_POST as $key => $input){
        $$key = sanitizeInput($input);
    }

    if(!requiredVal($name)){
        $errors[] = "name is required value";
    }elseif(!maxVal($name, 20)){
        $errors[] = "name must be smaller than 20 chars";
    }elseif(!minVal($name,3)){
        $errors[] = "name must be greater than 3 chars";
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

    $file = $_FILES['image'] ;
    $fName = $file['name'];
    $fType = $file['type'];
    $f_tmp_name = $file['tmp_name'];
    $fError = $file['error'];
    $fSize = $file['size'];

    if($fName!= ''){
        $ext = pathinfo($fName);
        $orgName = $ext['filename'];
        $orgExt = $ext['extension'];

        $allow = ['png','jpg','jpeg','gif'];
        if(in_array($orgExt,$allow)){

        }else{
        $errors[] = "not allowed file";
        }

        if($fError === 0){
            if($fSize < 50000){
                $fNewName = uniqid('',true)."." .$orgName;
            }else{
                $errors[] = "file too big";

            }

        }else{
        $errors[] = "file error";
        }
    }else{
        $errors[] = "choose image";
    }

    
    if(empty($errors)){
        if(file_exists("../data/user.json")){
            if(filesize("../data/user.json")==0){
                $newUser = 
                [
                    "name" => $_POST['name'],
                    "email" => $_POST['email'],
                    "password" => sha1($_POST['password']),
                    "id" => $_POST['id'],
                    "img" => $fNewName,
                ];
    
                $jsonDataArray[] = $newUser;
                  //array => json 
                $jsonDataArray = json_encode($jsonDataArray);
                //put data in json 
                file_put_contents("../data/user.json", $jsonDataArray);
                $_SESSION['auth'] = [$name,$email,$id];
                        redirect('../index.php');
    

                $_SESSION['auth'] = [$name,$email,$id];
                redirect('../index.php');
            }else{

                if(!userExist("../data/user.json",$email)){
                $newUser = 
                [
                    "name" => $_POST['name'],
                    "email" => $_POST['email'],
                    "password" => sha1($_POST['password']),
                    "id" => $_POST['id'],
                ];
                $jsonDataFile = file_get_contents("../data/user.json");  
                $jsonDataArray = json_decode($jsonDataFile,true);
                // add to json array
                $jsonDataArray[] = $newUser;
                //array => json 
                    $jsonDataArray = json_encode($jsonDataArray);
                //put data in json 
                file_put_contents("../data/user.json", $jsonDataArray);
                $_SESSION['auth'] = [$name,$email,$id];
                        redirect('../index.php');


            }else{
                $errors[] = "Already registered";
                $_SESSION["errors"] = $errors;
                redirect('../register.php');
                die;
            }
        }
        }else{
            echo "error file not exist";
        }

    }else{
        $_SESSION["errors"] = $errors;
        redirect('../register.php');
    }

}else{
    echo 'not supported';
}