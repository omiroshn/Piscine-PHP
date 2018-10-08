<?php
session_start();
if (!$_SESSION['username']){
    header("Location:index.php");
}
include ("delete_goods.php");
require_once('navbar.php');
include('server.php');

    $sql = "SELECT * FROM product";
    $result = mysqli_query($con, $sql);
    $cook = unserialize($_COOKIE[hash('whirlpool', 'shop'.$_SESSION['username'])]);
    $summa = 0;
    echo "<form action='basket.php' method='get'><table border='1'><tr><td style='width: 10vw; padding: 1vw'>Name</td><td style='padding: 1vw'>Price</td><td>Amount</td></tr>";
    while($test = mysqli_fetch_assoc($result)){
        foreach ($test as $key=>$item) {
            foreach ($cook['basket'] as $key_2=>$item_2) {
                if ($item."shop" == $key_2){
                    $summa += $test['price'];
                    echo"<tr><td style='padding: 0.5vw'>".$test['prod_name']."</td><td  style='padding: 1vw'>".$test['price']."</td><td style='text-align: center; padding: 1vw'>".$item_2."</td><td style='padding: 1vw; text-align: center;'><input type='submit' href='basket.php' name='".$key_2."' value='Delete'></td></tr>";
                }
            }
        }
    }
    echo "<tr><td style='padding: 0.5vw'>summa</td><td style='padding: 1vw'>".$summa."</td><td style='padding: 1vw; text-align: center;'><input type='submit' href='basket.php' name='delete' value='Buy'></td><td style='padding: 1vw; text-align: center;'><input type='submit' href='basket.php' name='delete' value='Delete All'></td></tr></table></form>";
?>
</body>
</html>