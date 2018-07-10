<div id="magazynContent">

    <table id="tabela">
        <thead id="naglowek_tabeli">
        <tr>
            <td>Identyfikator</td>
            <td>Nazwa przedmiotu</td>
            <td>Cena</td>
            <td>Dostępna ilość</td>
        </tr>
        </thead>

        <?php
        //dla każdego rekordu
        foreach ($wynik['wyniki'] as $key) {
            echo "<tr class='product' data-show=0>";
            //dla każdej informacji w rekordzie
            foreach ($key as $inner) {
                echo "<td class='kolumna'>" . $inner . "</td>";
            }
            echo "</tr>";
        }

        //puste kolumny(wygląd tabeli)
        if ((count($wynik['wyniki']) / $_SESSION['howMuch']) < 1) {
            for ($i = (count($wynik['wyniki']) + 1); ($i / $_SESSION['howMuch']) <= 1; $i++) {
                echo "<tr class='ProductEmpty'>";
                for ($a = 1; $a <= 3; $a++) {
                    echo "<td class='kolumna'> </td>";
                }
                echo "</tr>";
            }
        }


        ?>
    </table>

    <?php
    navigator::giveMeTheNav($_GET['strona'], $ile_stron_max, 2, 2, '/magazyn-master/magazyn');
    ?>
</div>


