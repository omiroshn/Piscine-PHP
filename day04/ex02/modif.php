<?php
    if (!$_POST['login']) {
        echo "Error. Login is empty.\n";
        exit;
    }
    if (!$_POST['oldpw']) {
        echo "Error. Old password is empty.\n";
        exit;
    }
    if (!$_POST['newpw']) {
        echo "Error. New password is empty.\n";
        exit;
    }
    if ($_POST['submit'] && $_POST['submit'] === "OK") {
        $account = unserialize(file_get_contents('../private/passwd'));
        if ($account) {
            $exist = 0;
            foreach ($account as $acc => $value) {
                if ($value['login'] === $_POST['login'] && $value['passwd'] === hash('whirlpool', $_POST['oldpw'])) {
                    $exist = 1;
                    $account[$acc]['passwd'] =  hash('whirlpool', $_POST['newpw']);
                }
            }
            if ($exist) {
                file_put_contents('../private/passwd', serialize($account));
                echo "OK\n";
            } else {
                echo "ERROR\n";
            }
        } else {
            echo "ERROR\n";
        }
    } else {
        echo "ERROR\n";
    }
?>