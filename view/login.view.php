<?php
require "basic/TopHTML.php";
require "basic/nav.php";
?>


    <div id="TOP">
        <div id="textbox">
            <h1>Logowanie</h1>
        </div>
        <div id="TopContent">
            <h1>
                <?php
                if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == true) {
                    echo "Witaj w magazynie";
                } else {
                    $_SESSION['err_log'] = "Podano złe dane";
                    echo "Podałeś nieprawidłowe dane";
                }
                ?>
            </h1>
        </div>
        <?php
        require "basic/userMenu.php";
        ?>
    </div>


<?php
require "basic/BotHTML.php";
?>