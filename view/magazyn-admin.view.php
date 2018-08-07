<?php
require "basic/TopHTML.php";
require "basic/nav.php";

?>

    <div id="TOP">



        <div id="textbox">
            <h1>Magazyn</h1>
        </div>

        <div id="TopContent">

            Tutaj możesz obsługiwać magazyn.
            <br/>
            <?php
            if ($stanMagazynu==1) {
                echo"<span class='info'>Dodałeś przedmiot</span>";
            }
            if ($stanMagazynu==2) {
                echo"<span class='info'>Usunąłeś przedmiot</span>";
            }
            ?>
        </div>

        <?php
        require "basic/userMenu.php";
        ?>

    </div>

<?php
require "basic/form-add-magazyn.php";
?>


<?php
require "basic/BotHTML.php";
?>