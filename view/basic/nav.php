<div id="nav">
    <?php
    if (isset($_SESSION['zalogowany'])&& $_SESSION['zalogowany']==true){
        echo '<nav>';
        echo '<a href="/magazyn-master">Strona Główna</a>';
        echo '<a href="/magazyn-master/magazyn">Magazyn</a>';
        echo '<a href="/magazyn-master/orders">Zamówienia</a>';
        echo '<a href="/magazyn-master/edit">Edycja Konta</a>';

        if (isset($_SESSION['admin'])&&$_SESSION['admin']==true)
            {
                echo '<a href="/magazyn-master/admin-magazyn">Dodaj do Magazynu</a>';
            }
    echo '</nav>';
    }else{
        echo '<nav>';
        echo '<a href="/magazyn-master">Strona Główna</a>';
        echo '<a href="/magazyn-master/credit">Credit</a>';
    echo '</nav>';
    }
    ?>

</div>