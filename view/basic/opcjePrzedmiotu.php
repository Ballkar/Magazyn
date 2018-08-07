<div id="magazynContent">

    <div class="hpx50"><?php
        App\core\Message::ShowAndDelete('err_cena', 'error');
        App\core\Message::ShowAndDelete('err_ilosc', 'error');
    ?></div>

    <a class="f-right" href=<?= "/magazyn-master/przedmiot/delete?id=$product->id_przedmiotu" ?>>Usuń z magazynu</a>

    <h2><?= 'cena: ' . $product->cena ?>
        <button class="m-10px">Zmień cene</button>
        <form class="d-none" method="post">
            <input type="text" name="cena" value="<?= $product->cena ?>">
            <input type="submit">
        </form>
    </h2>

    <h2><?= 'ilość: ' . $product->ilosc ?>
        <button class="m-10px">Zmień ilość</button>
        <form class="d-none" method="post">
            <input type="number" name="ilosc" value="<?= $product->ilosc ?>">
            <input type="submit">
        </form>
    </h2>
    <h2><?= 'dział: ' . $product->dzial ?>
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