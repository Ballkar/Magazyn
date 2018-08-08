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

            echo "<td class='kolumna'>" . $key->id . "</td>";
            echo "<td class='kolumna'>" . $key->productName . "</td>";
            echo "<td class='kolumna'>" . $key->price . "</td>";
            echo "<td class='kolumna'>" . $key->number . "</td>";

            echo "</tr>";
        }

        //puste kolumny(wygląd tabeli)
        if ((count($products) / $_SESSION['recordsPerPage']) < 1) {
            for ($i = (count($products)); ($i / $_SESSION['recordsPerPage']) < 1; $i++) {
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
    App\core\Navigator::giveMeTheNav(
        $_GET['page'],
        $howManyPagesMax,
        2,
        2,
        '/'.\App\core\App::get('config')['App']['AppName'].'/warehouse'
    );
    ?>
</div>


