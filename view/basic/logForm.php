<div id="log">
    <h2>Zaloguj się</h2>
    <form method="post" action="login">
        <?php
        if (isset($_SESSION['errorLog']) && $_SESSION['errorLog'] == true) {
            App\core\Message::ShowAndDelete('errorLog', 'error');
        }
        ?>
        <input type="text" name="login" placeholder="Login">
        <input type="password" name="password" placeholder="Hasło">
        <input type="submit" value="Zaloguj">
    </form>

    <div id="registerButton"><a href="register"><i class="icon-user-plus"></i>Zarejestruj się</a></div>
</div>
