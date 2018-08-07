<div id="log">
    <h2>Zalogowany jako: <?php
        echo $_SESSION['login'];
    ?></h2>
    <form method="post" action="logout">
        <input type="submit" value="Wyloguj">
    </form>
</div>
