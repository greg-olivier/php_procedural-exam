<?php

function extr($str, $max = 150, $add = '[...]') {
    $text = strip_tags($str);
    //var_dump($text);
    if (strlen($text) > $max) {
        $text = substr($text, 0, $max). $add;
    } return $text;
}

function fr_date_time($time, $format = '%A %d %B %Y à %Hh%M'){
    $newtime = strftime($format, strtotime($time));
    return $newtime;
}


function fr_date($time, $format = '%A %d %B %Y'){
    $newtime = strftime($format, strtotime($time));
    return $newtime;
}


// Protection CSRF : token
function token_form() {
    $token = sha1(uniqid(rand(), TRUE));
    $_SESSION['token']= $token;
    $_SESSION['token_time']=time();
    return $token;
}
