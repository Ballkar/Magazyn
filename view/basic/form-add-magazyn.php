<div id="magazynContent">

    <form method="POST" action="/magazyn-master/admin-magazyn">
        <label>Wpisz nazwe Przedmiotu: </label>
        <br/>
        <?php
        App\core\Message::ShowAndDelete('err_nazwa', 'error');
        ?>
        <input type="text" placeholder="" name="nazwa"><br/>

        <label>Wpisz cene: </label>
        <br/>
        <?php
        App\core\Message::ShowAndDelete('err_cena', 'error');
        ?>
        <input type="text" placeholder="" name="cena"><br/>

        <label>Wpisz ilość: </label>
        <br/>
        <?php
        App\core\Message::ShowAndDelete('err_ilosc', 'error');
        ?>
        <input type="number" placeholder="" name="ilosc"><br/>

        <label>Wybierz dział: </label>
        <br/>
        <?php

        App\core\Message::ShowAndDelete('err_dzial', 'error');
        ?>
        <select name="dzial">
            <option value="1">Budowlany</option>
            <option value="2">Elektronika</option>
            <option value="3">Mechanika</option>
        </select><br/>
        <input type="submit" value="Dodaj przedmiot">


    </form>



</div>