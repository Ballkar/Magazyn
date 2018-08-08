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
                <label for="recordsPerPage">Ile rekodrów na jednej stronie:</label>
                <select id="recordsPerPage" name='recordsPerPage'>
                    <option value="2"<?php if ($_SESSION['recordsPerPage'] == 2) {
                        echo "selected";
                    }
?>>
                        2
                    </option>
                    <option value="3"<?php if ($_SESSION['recordsPerPage'] == 3) {
                        echo "selected";
                    }
?>>
                        3
                    </option>
                    <option value="5"<?php if ($_SESSION['recordsPerPage'] == 5) {
                        echo "selected";
                    }
?>>
                        5
                    </option>
                    <option value="10"<?php if ($_SESSION['recordsPerPage'] == 10) {
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