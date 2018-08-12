<?php
require "basic/TopHTML.php";
require "basic/nav.php";

?>
    <div id="TOP">
        <div id="textbox">
            <h1>Rejestracja</h1>
        </div>
        <div id="TopContent">
            <h1>Dodaj nowego użytkownika</h1>
        </div>
        <?php
        require "basic/userMenu.php";
        ?>
    </div>
    <div id="register">
        <form action="/magazyn-master/register" method="POST">

            <label FOR="login">Podaj login</label>
            <?php
            App\core\Message::ShowAndDelete('errorLogin', 'error_register');
            ?>
            <input type="text" placeholder="Login" name="login" id="login" value="<?php
            App\core\Message::ShowValueAndDelete('registrationLogin');
            ?>">


            <label FOR="password">Podaj hasło
                <span class="info_register">minimum 6 znaków</span>

                <?php
                App\core\Message::ShowAndDelete('errorPassword', 'error_register');
                ?>
            </label>

            <input type="password" placeholder="Hasło" name="password" id="password">


            <label FOR="passwordConfirmation">Powtórz hasło</label>
            <?php
            App\core\Message::ShowAndDelete('errorPasswordConfirmation', 'error_register');
            ?>
            <input type="password" placeholder="Powtórz Hasło" name="passwordConfirmation" id="passwordConfirmation">


            <label FOR="email">Podaj adres Email</label>
            <?php
            App\core\Message::ShowAndDelete('errorEmail', 'error_register');
            ?>
            <input type="text" placeholder="Email" name="email" id="email" value="<?php
            App\core\Message::ShowValueAndDelete('registrationEmail');
            ?>">


            <label FOR="section">Oświadczam że przeczytałem <a href="https://pl.wikipedia.org/wiki/Regulamin">
                    regulamin</a> i się z nim zgadzam.</label>
            <?php
            App\core\Message::ShowAndDelete('errorSection', "error_register");
            ?>
            <input type="checkbox" name="section" id="section" <?php
            if (isset($_SESSION['registrationSection'])) {
                echo "checked";
                unset($_SESSION['registrationSection']);
            }
            ?>
            >

            <input type="submit" value="Zarejestruj">
        </form>
    </div>

<?php
require "basic/BotHTML.php";
?>