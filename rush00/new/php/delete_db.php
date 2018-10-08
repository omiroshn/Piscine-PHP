<?php
session_start();
if (isset($_POST["bumbum"])) {
    $conn = mysqli_connect('localhost', 'root', 'qwerty12345', 'shop');
    $sql = "DROP DATABASE shop";
    if (mysqli_query($conn, $sql)) {
        header("Refresh:1; url=index.php");
        mysqli_close($conn);
        session_unset();
        session_destroy();
        unset($_SESSION['username']);
        echo "Succes!";
    }
}
?>