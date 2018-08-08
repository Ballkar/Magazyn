<?php

namespace App\core;

class Navigator
{
    public static function giveMeTheNav($currentPage, $howManyPages, $HowManyNextPages, $HowManyBackPages, $http)
    {
        echo "<div class='nawigacja'>";
        //Wyświetlanie przycisku poprzedni gdy jesteś na stronie większej niż 1. a jak nie to daj 2 divy
        // żeby sie ni przesuwało
        if ($currentPage>=2) {
            echo "<a href='$http?page=".($currentPage-1)."' class='strona1'>Poprzednia</a>";
            // jak jest przycisk poprzedni to wypisz przyciski do stron zaczynając od strony -2 od aktualnej
            for ($i=($currentPage-$HowManyBackPages); $i<$currentPage; $i++) {
                //jeżeli strona -2 jest mniejsze od 1 to pomiń ten krok
                if ($i<1) {
                    continue;
                }
                echo "<a href='$http?page=".$i."' class='strona'>".$i."</a>";
            }
        } else {
            echo "<div class='strona11'>&nbsp;</div>";
        }
        //strona aktualna
        if ($currentPage) {
            echo "<a href='$http?page={$currentPage}' class='strona' style='color:red'>{$currentPage}</a>";
        }

        //wyświetl przycisk następny o ile aktualna strona nie jest maksymalna.
        if ($currentPage<$howManyPages) {
            //jak jesteś na 1 stronie to wyświetlaj 4 strony do przodu jeżeli nie ma tylu to daj tam puste divy
            if ($currentPage==1) {
                for ($i=$currentPage; $i<($currentPage+($HowManyNextPages+2)); $i++) {
                    if ($i<$howManyPages) {
                        echo "<a href='$http?page=".($i+1)."' class='strona'>".($i+1)."</a>";
                    } else {
                        echo "<div class='strona'>&nbsp;</div>";
                    }
                }
            }
            //na stronie 2 daj mi 3 strony do przodu jeżeli ni ma tylu daj puste divy
            if ($currentPage==2) {
                for ($i=$currentPage; $i<$currentPage+($HowManyNextPages+1); $i++) {
                    if ($i<$howManyPages) {
                        echo "<a href='$http?page=".($i+1)."' class='strona'>".($i+1)."</a>";
                    } else {
                        echo "<div class='strona'>&nbsp;</div>";
                    }
                }
            }
            //jeżeli jesteś na stronie większej od 2 to dawaj 2 strony w przód ewentualnie puste divy
            if ($currentPage>2) {
                for ($i=$currentPage; $i<$currentPage+$HowManyNextPages; $i++) {
                    if ($i<$howManyPages) {
                        echo "<a href='$http?page=".($i+1)."' class='strona'>".($i+1)."</a>";
                    } else {
                        echo "<div class='strona'>&nbsp;</div>";
                    }
                }
            }
            echo "<a href='$http?page=".($currentPage+1)."' class='strona1'>Następna</a>";
        }
        echo "</div>";
    }
}
