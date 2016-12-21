<?php
session_start();

function isLogin()
{
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
        return true;
    else
        return false;
}

function isAddedToCart($value)
{
    if(!isset($_SESSION['cart_items'])){
        $_SESSION['cart_items'] = array();
    }

    if(array_key_exists($value, $_SESSION['cart_items'])){
        return true;
    }
    else{
        return false;
    }
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}


?>