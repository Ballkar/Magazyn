<div id="magazynContent">

    <form method="POST" action="/magazyn-master/admin-warehouse">
        <label>Wpisz nazwe Przedmiotu: </label>
        <br/>
        <?php
        App\core\Message::ShowAndDelete('errorProductName', 'error');
        ?>
        <input type="text" placeholder="" name="productName"><br/>

        <label>Wpisz cene: </label>
        <br/>
        <?php
        App\core\Message::ShowAndDelete('errorPrice', 'error');
        ?>
        <input type="text" placeholder="" name="price"><br/>

        <label>Wpisz ilość: </label>
        <br/>
        <?php
        App\core\Message::ShowAndDelete('errorNumber', 'error');
        ?>
        <input type="number" placeholder="" name="number"><br/>

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