<div id="magazynContent">

    <form method="POST" action="/magazyn-master/admin-warehouse">
        <label>Wpisz nazwe Przedmiotu: </label>
        <br/>
        <?php
        App\core\Message::showAndDelete('errorProductName', 'error');
        ?>
        <input type="text" placeholder="" name="productName" value="<?php
        App\core\Message::showValueAndDelete('valueProductName', 'error');

        ?>"><br/>

        <label>Wpisz cene: </label>
        <br/>
        <?php
        App\core\Message::showAndDelete('errorPrice', 'error');
        ?>
        <input type="text" placeholder="" name="price" value="<?php
        App\core\Message::showValueAndDelete('valueProductPrice', 'error');

        ?>"><br/>

        <label>Wpisz ilość: </label>
        <br/>
        <?php
        App\core\Message::showAndDelete('errorNumber', 'error');
        ?>
        <input type="number" placeholder="" name="number" value="<?php
        App\core\Message::showValueAndDelete('valueProductNumber', 'error');

        ?>"><br/>

        <label>Wybierz dział: </label>
        <br/>
        <?php

        App\core\Message::ShowAndDelete('errorSection', 'error');
        ?>
        <label for="section"></label>
        <select name="section" id="section">
            <option value="1">Budowlany</option>
            <option value="2">Elektronika</option>
            <option value="3">Mechanika</option>
        </select><br/>
        <input type="submit" value="Dodaj przedmiot">


    </form>



</div>