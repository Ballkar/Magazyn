<div id="nav">
    <?php
    if (isset($_SESSION['zalogowany'])&& $_SESSION['zalogowany']==true) {
        echo '<nav>';
        echo '<a href="/magazyn-master">Strona Główna</a>';
        echo '<a href="/magazyn-master/magazyn">Magazyn</a>';

        if (isset($_SESSION['admin'])&&$_SESSION['admin']==true) {
            echo '<a href="/magazyn-master/admin-magazyn">Dodaj do Magazynu</a>';
        }
        echo '</nav>';
    } else {
        echo '<nav>';
        echo '<a href="/magazyn-master">Strona Główna</a>';
        echo '</nav>';
    }
    ?>

</div>
