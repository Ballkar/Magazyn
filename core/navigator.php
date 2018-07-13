<?php
namespace App\core;


class navigator{
    public static function giveMeTheNav($aktualna,$ilemax,$przod,$tyl,$link)
    {
        echo "<div class='nawigacja'>";
            //Wyświetlanie przycisku poprzedni gdy jesteś na stronie większej niż 1. a jak nie to daj 2 divy żeby sie ni przesuwało
            if ($aktualna>=2)
            {
                echo "<a href='$link?strona=".($aktualna-1)."' class='strona1'>Poprzednia</a>";
                // jak jest przycisk poprzedni to wypisz przyciski do stron zaczynając od strony -2 od aktualnej
                for ($i=($aktualna-$tyl); $i<$aktualna; $i++){
                    //jeżeli strona -2 jest mniejsze od 1 to pomiń ten krok
                    if ($i<1){
                        continue;
                    }
                    echo "<a href='$link?strona=".$i."' class='strona'>".$i."</a>";
                }
            }else{
                echo "<div class='strona11'>&nbsp;</div>";
            }
            //strona aktualna
            if ($aktualna){
                echo "<a href='$link?strona={$aktualna}' class='strona' style='color:red'>{$aktualna}</a>";
            }

            //wyświetl przycisk następny o ile aktualna strona nie jest maksymalna.
            if ($aktualna<$ilemax)
            {
                //jak jesteś na 1 stronie to wyświetlaj 4 strony do przodu jeżeli nie ma tylu to daj tam puste divy
                if ($aktualna==1){
                    for ($i=$aktualna; $i<($aktualna+($przod+2)); $i++){
                        if ($i<$ilemax){
                            echo "<a href='$link?strona=".($i+1)."' class='strona'>".($i+1)."</a>";
                        }else{
                            echo "<div class='strona'>&nbsp;</div>";
                        }
                    }
                }
                //na stronie 2 daj mi 3 strony do przodu jeżeli ni ma tylu daj puste divy
                if ($aktualna==2){
                    for ($i=$aktualna; $i<$aktualna+($przod+1); $i++){
                        if ($i<$ilemax){
                            echo "<a href='$link?strona=".($i+1)."' class='strona'>".($i+1)."</a>";
                        }else{
                            echo "<div class='strona'>&nbsp;</div>";
                        }
                    }
                }
                //jeżeli jesteś na stronie większej od 2 to dawaj 2 strony w przód ewentualnie puste divy
                if ($aktualna>2){
                    for ($i=$aktualna; $i<$aktualna+$przod; $i++){
                        if ($i<$ilemax){
                            echo "<a href='$link?strona=".($i+1)."' class='strona'>".($i+1)."</a>";
                        }else{
                            echo "<div class='strona'>&nbsp;</div>";
                        }
                    }
                }
                echo "<a href='$link?strona=".($aktualna+1)."' class='strona1'>Następna</a>";
            }
        echo "</div>";
    }
}
