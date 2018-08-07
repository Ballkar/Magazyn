<?php
require "basic/TopHTML.php";
require "basic/nav.php";
?>

    <div id="TOP">


        <div id="textbox">
            <h1>Magazyn</h1>
        </div>
        <div id="TopContent">

            <form method="POST" action="/magazyn-master/warehouse">
                Ile rekodrów na jednej stronie:
                <select name='howMuch'>
                    <option value="2"<?php if ($_SESSION['howMuch'] == 2) {
                        echo "selected";
                    }
?>>
                        2
                    </option>
                    <option value="3"<?php if ($_SESSION['howMuch'] == 3) {
                        echo "selected";
                    }
?>>
                        3
                    </option>
                    <option value="5"<?php if ($_SESSION['howMuch'] == 5) {
                        echo "selected";
                    }
?>>
                        5
                    </option>
                    <option value="10"<?php if ($_SESSION['howMuch'] == 10) {
                        echo "selected";
                    }
?>>
                        10
                    </option>
                </select>
                <input type="submit" value="potwierdź">
            </form>

        </div>

        <?php
        require "basic/userMenu.php";
        ?>

    </div>

<?php
require "basic/zawartoscMagazynu.php";
?>

<?php
require "basic/BotHTML.php";
?>