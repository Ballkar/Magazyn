<div id="nav">
    <?php
    if (isset($_SESSION['logged'])&& $_SESSION['logged']==true) {
        echo '<nav>';
        echo '<a href="/magazyn-master">Strona Główna</a>';
        echo '<a href="/magazyn-master/warehouse">Magazyn</a>';

        if (isset($_SESSION['admin'])&&$_SESSION['admin']==true) {
            echo '<a href="/magazyn-master/admin-warehouse">Dodaj do Magazynu</a>';
        }
        echo '</nav>';
    } else {
        echo '<nav>';
        echo '<a href="/magazyn-master">Strona Główna</a>';
        echo '</nav>';
    }
    ?>

</div>
