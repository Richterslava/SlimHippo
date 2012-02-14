<?php

function _get($v) {
    if (isset($_GET[$v])) {
        return $_GET[$v];
    }
    return null;
}

function _post($v) {
    if (isset($_POST[$v])) {
        return $_POST[$v];
    }
    return null;
}

function _sessions($v) {
    if (isset($_SESSION[$v])) {
        return $_SESSION[$v];
    }
    return null;
}

/*
blank(array('name' => $name, 'email' => $email), 'name')
// name will not be checked if blanked
*/
function blank($arr)
{
    $args = func_get_args();
    foreach ($arr as $a => $b) {
        if (in_array($a, $args)) {
            continue;
        }
        if (empty($b)) {
            return true;
        }
    }
    return false;
}

function salt($str, $salt = '1234567890') {
    return sha1(sha1($salt . $str . $salt) . $salt);
}

function redirect($url = null)
{
    if (!is_string($url)) {
        $url = URL;
    }
    header('Location: ' . $url);
    exit;
}

function randomStr($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzQWERTYUIOPLKJHGFDSAZXCVBNM';
    $string = '';    
    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters))];
    }
    return $string;
}