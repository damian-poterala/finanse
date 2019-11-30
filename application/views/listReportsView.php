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



</style>
<body>
    <div class="container">
        <h1>Pobierz raport wszystkich rachunków</h1>
        <button>Pobierz raport</button>
        <br />
        <h1>Generator własnego raportu</h1>
        <div class="textboxSelect">
            <select name="chooseYear" id="chooseYear">
                <option value="100" selected disabled>Wybierz rok</option>

                <option value="0">Wszystkie</option>
            </select>
        </div>
        <div class="textboxSelect">
            <select name="chooseMonth" id="chooseMonth">
                <option value="100" selected disabled>Wybierz miesiąc</option>

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
        <button>Generuj własny raport</button>
    </div>
</body>