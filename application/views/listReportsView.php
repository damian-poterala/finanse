<style>

    body {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 500px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
    }

    .container h1 {
        float: left;
        font-size: 25px;
        border-bottom: 6px solid #4CAF50;
        margin-bottom: 50px;
        padding: 13px 0;
    }

    .textbox {
        width: 100%;
        overflow: hidden;
        font-size: 20px;
        padding: 8px 0;
        margin: 8px 0;
    }

    .textboxSelect {
        width: 100%;
        overflow: hidden;
        font-size: 20px;
        padding: 8px 0;
        margin: 8px 0;
        border-bottom: 1px solid #4CAF50;
    }

    .textbox input {
        float: right;
    }

    #chooseYear, #chooseMonth {
        border: none;
        outline: none;
        background: none;
        color: #fff;
        font-size: 16px;
        width: 98%;
        float: left;
        margin: 0 10px;
    }

    #chooseYear option, #chooseMonth option {
        background: #1B1B1B;
    }

    .btnReports {
        width: 100%;
        background: none;
        border: 2px solid #4CAF50;
        color: #fff;
        padding: 5px;
        font-size: 18px;
        cursor: pointer;
        margin: 6px 0;
        transition: all 300ms;
    }

    .btnReports:hover {
        background: #4CAF50;
        color: #fff;
        transition: all 300ms;
    }

</style>
<body>
    <div class="container">
        <h1>Pobierz raport wszystkich rachunków</h1>
        <button class="btnReports" id="generateAllListBill">Pobierz raport</button>
        <br />
        <h1>Generator własnego raportu</h1>
        <div class="textboxSelect">
            <select name="chooseYear" id="chooseYear">
                <option value="100" selected disabled>Wybierz rok</option>
                    <?php foreach($year as $key) { ?>
                        <option value="<?php echo $key['id_roku']; ?>"><?php echo $key['rok']; ?></option>
                    <?php } ?>
                <option value="0">Wszystkie</option>
            </select>
        </div>
        <div class="textboxSelect">
            <select name="chooseMonth" id="chooseMonth">
                <option value="100" selected disabled>Wybierz miesiąc</option>
                    <?php foreach($month as $key) { ?>
                        <option value="<?php echo $key['id_miesiaca']; ?>"><?php echo $key['miesiac']; ?></option>
                    <?php } ?>
                <option value="0">Wszystkie</option>
            </select>
        </div>
        <div class="textbox">
            <span class="option">Pokaż numer rachunku</span>
            <input type="checkbox" />
        </div>
        <div class="textbox">
            <span class="option">Pokaż kategorię rachunku</span>
            <input type="checkbox" />
        </div>
        <div class="textbox">
            <span class="option">Pokaż wypłatę</span>
            <input type="checkbox" />
        </div>
        <div class="textbox">
            <span class="option">Pokaż kwotę rachunku</span>
            <input type="checkbox" />
        </div>
        <div class="textbox">
            <span class="option">Pokaż datę rachunku</span>
            <input type="checkbox" />
        </div>
        <div class="textbox">
            <span class="option">Pokaż datę dodania rachunku</span>
            <input type="checkbox" />
        </div>
        <div class="textbox">
            <span class="option">Pokaż dodatkowy opis rachunku</span>
            <input type="checkbox" />
        </div>
        <div class="textbox">
            <span class="option">Pokaż średnią rachunków</span>
            <input type="checkbox" />
        </div>
        <br />
        <input type="submit" class="btnReports" name="generate" value="Generuj własny raport" />
    </div>
    <script>

        var btn = document.querySelector('#generateAllListBill');

        btn.addEventListener("click", function()
        {
            window.location.href = 'http://localhost/reports/finanse/index.php';
        });

    </script>
</body>