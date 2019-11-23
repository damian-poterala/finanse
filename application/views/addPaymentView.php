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
        padding: 8px 0;
        margin: 8px 0;
        border-bottom: 1px solid #4CAF50;
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

    .textbox i {
        width: 26px;
        float: left;
        text-align: center;
    }

    #chooseYear, #chooseMonth {
        border: none;
        outline: none;
        background: none;
        color: #fff;
        font-size: 16px;
        width: 80%;
        float: left;
        margin: 0 10px;
    }

    #chooseYear option, #chooseMonth option {
        background: #1B1B1B;
    }

    .btnSavePayment {
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

    .btnSavePayment:hover {
        background: #4CAF50;
        color: #fff;
        transition: all 300ms;
    }

</style>
<body>
    <div class="container">
        <h1>Dodaj wynagrodzenie</h1>
        <?php echo validation_errors(); ?>
        <?php echo form_open('Finanse/../addPayment'); ?>
        <div class="textbox">
            <i class="fas fa-calendar-week"></i>
            <select name="chooseYear" id="chooseYear">
                <option value="0" selected disabled>Wybierz rok</option>
                <?php foreach($year as $key) {?>
                    <option value="<?php echo $key['id_roku']; ?>"><?php echo $key['rok']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="textbox">
            <i class="fas fa-calendar-day"></i>
            <select name="chooseMonth" id="chooseMonth">
                <option value="0" selected disabled>Wybierz miesiąc</option>
                <?php foreach($month as $key) { ?>
                    <option value="<?php echo $key['id_miesiaca']; ?>"><?php echo $key['miesiac']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="textbox">
            <i class="fas fa-dollar-sign"></i>
            <input type="text" name="payment" placeholder="Podaj kwotę wypłaty">
        </div>
        <br />
        <input type="submit" name="add" value="Zapisz wypłatę" class="btnSavePayment">
        <?php echo form_close(); ?>
    </div>
</body>