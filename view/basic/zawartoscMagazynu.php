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
        foreach ($products as $key) {
            echo "<tr class='product' data-show=0>";

            echo "<td class='kolumna'>".$key->id_przedmiotu."</td>";
            echo "<td class='kolumna'>".$key->nazwa_przedmiotu."</td>";
            echo "<td class='kolumna'>".$key->cena."</td>";
            echo "<td class='kolumna'>".$key->ilosc."</td>";

            echo "</tr>";
        }

        //puste kolumny(wygląd tabeli)
        if ((count($products) / $_SESSION['howMuch']) < 1) {
            for ($i = (count($products)); ($i / $_SESSION['howMuch']) < 1; $i++) {
                echo "<tr class='ProductEmpty'>";
                for ($a = 1; $a <= 4; $a++) {
                    echo "<td class='kolumna'> </td>";
                }
                echo "</tr>";
            }
        }
        ?>
    </table>

    <?php
    App\core\Navigator::giveMeTheNav($_GET['strona'], $ile_stron_max, 2, 2, '/magazyn-master/magazyn');
    ?>
</div>


