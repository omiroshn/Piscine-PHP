<?php
session_start();
if ($_GET['basket']){
    if (isset($_SESSION['username'])) {
        $cook = unserialize($_COOKIE[hash('whirlpool', 'shop' . $_SESSION['username'])]);
        if ($cook['basket'] != false) {
            $flag = 0;
            foreach ($cook['basket'] as $key => $item) {
                if ($key == $_GET['basket'] . "shop") {
                    $flag = 1;
                }
            }
            if ($flag) {
                $cook['basket'][$_GET['basket'] . "shop"] += 1;
            } else {
                $cook['basket'] = array_merge($cook['basket'], array($_GET['basket'] . "shop" => 1));
            }
        } else if (empty($cook['basket'])) {
            $cook['basket'] = array('0shop' => 'start', [$_GET['basket']."shop"] => 1);
        }
        setcookie(hash('whirlpool', 'shop' . $_SESSION['username']), serialize($cook));
        unset($cook);
    }
    else{
        header("Location: Not_login.php");
        exit;
    }
}