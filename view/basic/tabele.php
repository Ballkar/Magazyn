<?php
function nawigacja($gdzieProwadzic,$ileStronMax, $ileTyl, $ilePrzod, $aktualnaStrona)
{
    if ($aktualnaStrona){
        echo "<a href='$gdzieProwadzic{$_GET['strona']}' class='strona' style='color:red'>{$_GET['strona']}</a>";
    }
//wyświetl przycisk następny jeżeli aktualna strona nie jest maksymalna
    if (($_GET['strona']+1)<=$ile_stron_max)
    {
        //jeżeli jest przycisk następny to wypisz także 2 następne strony chyba że nie ma już strony +2
        for ($i=$_GET['strona']; $i<($_GET['strona']+2)&&($i+2)<=($ile_stron_max+1); $i++){
            echo "<a href='/magazyn-master/magazyn?strona=".($i+1)."' class='strona'>".($i+1)."</a>";
        }
        echo "<a href='/magazyn-master/magazyn?strona=".($_GET['strona']+1)."' class='strona1'>Następna</a>";
    }
}


