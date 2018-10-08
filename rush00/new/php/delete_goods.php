<?php
if ($_GET['delete']){
    setcookie(hash('whirlpool', 'shop' . $_SESSION['username']), '');
}
else {
    $cook = unserialize($_COOKIE[hash('whirlpool', 'shop' . $_SESSION['username'])]);
    foreach ($cook['basket'] as $key => $item) {
        foreach ($_GET as $key_2 => $item_2) {
            if ($key == $key_2) {
                unset ($cook['basket'][$key]);
            }
        }
    }
    setcookie(hash('whirlpool', 'shop' . $_SESSION['username']), serialize($cook));
}
