<style>
    
    body {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 280px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
    }

    .container h1 {
        float: left;
        font-size: 40px;
        border-bottom: 6px solid #4CAF50;
        margin-bottom: 50px;
        padding: 13px 0;
    }

    .textbox {
        width: 100%;
        overflow: hidden;
        font-size: 20px;
        padding: 8px 0px;
        margin: 8px 0;
        border-bottom: 1px solid #4CAF50;
    }

    .textbox i {
        width: 26px;
        float: left;
        text-align: center;
    }

    .textbox input {
        border: none;
        outline: none;
        background: none;
        color: #fff;
        font-size: 18px;
        width: 80%;
        float: left;
        margin: 0 10px;
    }

    #choosePayment, #chooseCategory, #paymentCategory  {
        border: none;
        outline: none;
        background: none;
        color: #fff;
        font-size: 16px;
        width: 80%;
        float: left;
        margin: 0 10px;
    }

    #choosePayment option, #chooseCategory option, #paymentCategory option {
        background: #1B1B1B;
    }

    #description {
        resize: none;
        width: 80%;
        border: none;
        outline: none;
        background: none;
        font-size: 16px;
        float: left;
        margin: 0 10px;
        height: 300px;
        color: #fff;
    }

    .btnSaveBill {
        width: 100%;
        background: none;
        border: 2px solid #4CAF50;
        color: #fff;
        padding: 5px;
        font-size: 18px;
        cursor: pointer;
        margin: 12px 0;
        transition: all 300ms;
    }

    .btnSaveBill:hover {
        background: #4CAF50;
        color: #fff;
        transition: all 300ms;
    }

</style>
<body>
    <div class="container">
        <h1>Dodaj rachunek</h1>
        <div class="textbox">
            <i class="fas fa-money-bill-wave-alt"></i>
            <select id="choosePayment" name="choosePayment">
                <option value="0" selected disabled>Wybierz wypłatę</option>
            </select>
        </div>
        <div class="textbox">
            <i class="fas fa-money-bill"></i>
            <input type="text" name="numberBill" placeholder="Podaj numer rachunku" />
        </div>
        <div class="textbox">
            <i class="fas fa-shopping-cart"></i>
            <select name="chooseCategory" id="chooseCategory">
                <option value="0" selected disabled>Wybierz kategorie zakupów</option>
                <?php foreach($categoryBill as $key) { ?>
                    <option value="<?php $key['id_kat_rachunkow']; ?>"><?php echo $key['kat_nazwa_pl']; ?></option>
                <?php }?>
            </select>
        </div>
        <div class="textbox">
            <i class="fas fa-dollar-sign"></i>
            <input type="text" name="amountBill" placeholder="Podaj kwotę rachunku" />
        </div>
        <div class="textbox">
            <i class="fas fa-calendar-day"></i>
            <input type="date" name="shoppingDate" placeholder="Podaj datę zakupów" />
        </div>
        <div class="textbox">
            <i class="fas fa-list"></i>
            <select name="paymentCategory" id="paymentCategory">
                <option value="0" selected disabled>Wybierz rodzaj płatności</option>
                <?php foreach($categoryPayment as $key) { ?>
                    <option value="<?php $key['id_typ_platnosci']; ?>"><?php echo $key['nazwa_platnosci']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="textbox">
            <textarea name="description" id="description" placeholder="Podaj opis zakupów"></textarea>
        </div>
        <br />
        <a href="#">
            <input type="submit" name="" value="Zapisz rachunek" class="btnSaveBill"/>
        </a>
    </div>
</body>