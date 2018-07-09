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
    <form action="/magazyn-master/rejestracja" method="POST">

        <?php
        message::ShowAndDelete('reg_success','info');
        ?>

        <label FOR="login">Podaj login</label>
        <?php
        message::ShowAndDelete('err_reg_login','error_register');
        ?>
        <input type="text" placeholder="Login" name="login" id="login" value="<?php
        message::ShowValueAndDelete('reg_login');
        ?>">


        <label FOR="haslo">Podaj hasło
            <?php
            message::ShowMassage('minimum 6 znaków','info_register');
            ?>
        </label>
        <?php
        message::ShowAndDelete('err_reg_haslo','error_register');
        ?>
        <input type="password" placeholder="Hasło" name="haslo" id="haslo">


        <label FOR="haslo2">Powtórz hasło</label>
        <?php
        message::ShowAndDelete('err_reg_haslo2','error_register');
        ?>
        <input type="password" placeholder="Powtórz Hasło" name="haslo2" id="haslo2">



        <label FOR="email">Podaj adres Email</label>
        <?php
        message::ShowAndDelete('err_reg_email','error_register');
        ?>
        <input type="text" placeholder="Email" name="email" id="email" value="<?php
        message::ShowValueAndDelete('reg_email');
        ?>">


        <label FOR="regulamin">Oświadczam że przeczytałem <a href="https://pl.wikipedia.org/wiki/Regulamin">regulamin</a> i się z nim zgadzam.</label>
        <?php
        message::ShowAndDelete('err_reg_regulamin',"error_register");
        ?>
        <input type="checkbox" name="regulamin" id="regulamin" <?php
        if (isset($_SESSION['reg_regulamin'])) {
            echo "checked";
            unset($_SESSION['reg_regulamin']);
        }
        ?>
        >

        <input type="submit" value="Zarejestruj">
    </form>
</div>

<?php
require "basic/BotHTML.php";
?>