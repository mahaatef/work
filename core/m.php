<?php

function requiredVal($input){
    if(empty($input)){
        return false;
    }
    return true;
}
function emailVal($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function minVal($input , $length){
        return strlen($input) > $length;
}

function maxVal($input , $length){
    return strlen($input)  < $length;

}