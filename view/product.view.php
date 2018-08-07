<?php
require "basic/TopHTML.php";
require "basic/nav.php";
?>

<div id="TOP">


    <div id="textbox">
        <h1>Produkt</h1>
    </div>
    <div id="TopContent">
        <h1><?= $product->nazwa_przedmiotu ?></h1>
    </div>

    <?php
    require "basic/userMenu.php";
    ?>

</div>

<?php
require "basic/opcjePrzedmiotu.php";
?>

<?php
require "basic/BotHTML.php";


echo "<script src='js/product.js'></script>";
?>


