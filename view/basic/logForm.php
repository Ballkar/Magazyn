<div id="log">
    <h2>Zaloguj się</h2>
    <form method="post" action="login">
        <?php
        if (isset($_SESSION['err_log'])&&$_SESSION['err_log']==true) {
            echo $_SESSION['err_log'];
            unset($_SESSION['err_log']);
        }
        ?>
        <input type="text" name="login" placeholder="Login">
        <input type="password" name="password" placeholder="Hasło">
        <input type="submit" value="Zaloguj">
    </form>

    <div id="registerbutton"><a href="rejestracja"><i class="icon-user-plus"></i>Zarejestruj się</a></div>
</div>
