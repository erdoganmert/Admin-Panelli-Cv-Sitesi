<?php

function post($name)
{
    if(isset($_POST[$name]))
    {
        if(is_array($_POST[$name]))
        {
            return array_map(function ($item){
                $item = htmlspecialchars($item);
                $item = trim($item);
                return $item;
            },$_POST[$name]);
        }

        return htmlspecialchars(trim($_POST[$name]));
    }
}

function get($name)
{
    if(isset($_GET[$name]))
    {
        if(is_array($_GET[$name]))
        {
            return array_map(function ($item){
                return htmlspecialchars(trim($_GET[$item]));
            },$_GET[$name]);
        }

        return htmlspecialchars(trim($_GET[$name]));
    }

}
function error(){
    global $err;
    return isset($err) ? $err : false;
}

function success(){
    global $success;
    return isset($success) ? $success : false;
}