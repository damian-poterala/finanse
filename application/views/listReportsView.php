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
        margin-bottom: 25px;
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

    .btnReports, #generateYourReport {
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

    .btnReports:hover, #generateYourReport:hover {
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
            <select name="chooseYear" id="chooseYear" class="chooseYear">
                <option value="100" selected disabled>Wybierz rok</option>
                    <?php foreach($year as $key) { ?>
                        <option value="<?php echo $key['id_roku']; ?>"><?php echo $key['rok']; ?></option>
                    <?php } ?>
                <option value="0">Wszystkie</option>
            </select>
        </div>
        <div class="textboxSelect">
            <select name="chooseMonth" id="chooseMonth" class="chooseMonth">
                <option value="100" selected disabled>Wybierz miesiąc</option>
                    <?php foreach($month as $key) { ?>
                        <option value="<?php echo $key['id_miesiaca']; ?>"><?php echo $key['miesiac']; ?></option>
                    <?php } ?>
                <option value="0">Wszystkie</option>
            </select>
        </div>
        <div class="textbox">
            <span class="option">Pokaż numer rachunku</span>
            <input type="checkbox" id="showNumberBill" name="showNumberBill"/>
        </div>
        <div class="textbox">
            <span class="option">Pokaż kategorię rachunku</span>
            <input type="checkbox" id="showCatBill" name="showCatBill"/>
        </div>
        <div class="textbox">
            <span class="option">Pokaż wypłatę</span>
            <input type="checkbox" id="showPayment" name="showPayment"/>
        </div>
        <div class="textbox">
            <span class="option">Pokaż kwotę rachunku</span>
            <input type="checkbox" id="showAmountBill" name="showAmountBill"/>
        </div>
        <div class="textbox">
            <span class="option">Pokaż datę rachunku</span>
            <input type="checkbox" id="showDateBill" name="showDateBill"/>
        </div>
        <div class="textbox">
            <span class="option">Pokaż datę dodania rachunku</span>
            <input type="checkbox" id="showAddDateBill" name="showAddDateBill"/>
        </div>
        <div class="textbox">
            <span class="option">Pokaż dodatkowy opis rachunku</span>
            <input type="checkbox" id="showDescription" name="showDescription"/>
        </div>
        <div class="textbox">
            <span class="option">Pokaż średnią rachunków</span>
            <input type="checkbox" id="showAverageBill" name="showAverageBill"/>
        </div>
        <br />
        <input type="submit" id="generateYourReport" name="generateYourReport" value="Generuj własny raport" />
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        
        $(document).ready(function()
        {
            $('#generateAllListBill').click(function()
            {
                window.location.href = 'http://localhost/reports/finanse/index.php';
            });

            // getting values from input

            $('#generateYourReport').click(function()
            {
                var year         = $('#chooseYear').val();
                var month        = $('#chooseMonth').val();
                var numberBill   = $('#showNumberBill').is(':checked');
                var categoryBill = $('#showCatBill').is(':checked');
                var payment      = $('#showPayment').is(':checked');
                var amountBill   = $('#showAmountBill').is(':checked');
                var dateBill     = $('#showDateBill').is(':checked');
                var addDateBill  = $('#showAddDateBill').is(':checked');
                var description  = $('#showDescription').is(':checked');
                var averageBill  = $('#showAverageBill').is(':checked');

                console.log(year, month, numberBill, categoryBill, payment, amountBill, dateBill, addDateBill, description, averageBill);
            });
        });
    
    </script>
</body>