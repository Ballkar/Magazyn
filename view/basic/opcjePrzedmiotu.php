<div id="magazynContent">

    <div class="hpx50"><?php
        App\core\message::ShowAndDelete('err_cena', 'error');
        App\core\message::ShowAndDelete('err_ilosc', 'error');

        ?></div>

    <a class="f-right" href=<?="/magazyn-master/przedmiot/delete?id=$przedmiot->id_przedmiotu" ?>>Usuń z magazynu</a>

    <h2><?= 'cena: ' . $przedmiot->cena ?>
        <button class="m-10px">Zmień cene</button>
        <form class="d-none" method="post">
            <input type="text" name="cena" value="<?= $przedmiot->cena ?>">
            <input type="submit">
        </form>
    </h2>

    <h2><?= 'ilość: ' . $przedmiot->ilosc ?>
        <button class="m-10px">Zmień ilość</button>
        <form class="d-none" method="post">
            <input type="number" name="ilosc" value="<?= $przedmiot->ilosc ?>">
            <input type="submit">
        </form>
    </h2>
    <h2><?= 'dział: ' . $przedmiot->dzial ?>
        <button class="m-10px">Przenieś do innego działu</button>
        <form class="d-none" method="post">
            <select name="dzial">
                <option value="1">1. Budowlany</option>
                <option value="2">2. Elektronika</option>
                <option value="3">3. Mechanika</option>
            </select>
            <input type="submit">
        </form>
    </h2>

</div>