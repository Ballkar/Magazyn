<div id="magazynContent">

    <div class="hpx50"><?php
        App\core\Message::ShowAndDelete('errorPrice', 'error');
        App\core\Message::ShowAndDelete('errorNumber', 'error');
    ?></div>

    <a class="f-right" href=<?= "/magazyn-master/product/delete?id=$product->id" ?>>Usuń z magazynu</a>

    <h2><?= 'cena: ' . $product->price ?>
        <button class="m-10px">Zmień cene</button>
        <form class="d-none" method="post">
            <label for="price">Wpisz nową Cenę</label>
            <input type="text" id="price" name="price" value="<?= $product->price ?>">
            <input type="submit">
        </form>
    </h2>

    <h2><?= 'ilość: ' . $product->number ?>
        <button class="m-10px">Zmień ilość</button>
        <form class="d-none" method="post">
            <label for="number">Wpisz nową ilość</label>
            <input type="number" id="number" name="number" value="<?= $product->number ?>">
            <input type="submit">
        </form>
    </h2>
    <h2><?= 'dział: ' . $product->section ?>
        <button class="m-10px">Przenieś do innego działu</button>
        <form class="d-none" method="post">
            <label for="section"></label>
            <select id="section" name="section">
                <option value="1">1. Budowlany</option>
                <option value="2">2. Elektronika</option>
                <option value="3">3. Mechanika</option>
            </select>
            <input type="submit">
        </form>
    </h2>

</div>