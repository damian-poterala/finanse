<style>

    body {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .container {
        margin-left: 350px;
        margin-top: 25px;
    }

    .title {
        font-size: 32px;
        color: #fff;
    }

    .list {
        margin-bottom: 30px;
    }

    .listYear {
        font-size: 28px;
        color: #fff;
        font-weight: bold;
    }

    .contentTable {
        font-size: 26px;
        color: #fff;
    }

    th, td {
        color: #fff;
    }

</style>
<body>
    <div class="container">
        <span class="title">SZCZEGÓŁOWA LISTA RACHUNKÓW</span>
        <br />
        <br />
        <div class="list">
            <?php foreach($year as $keyYear) { ?>
                <span class="listYear"><?php echo $keyYear['rok']; ?></span><br /><br />
                <table>
                    <tr>
                        <th>NUMER RACHUNKU</th>
                        <th>DATA ZAKUPÓW</th>
                        <th>WYPŁATA</th>
                        <th>KATEGORIA ZAKUPÓW</th>
                        <th>KWOTA RACHUNKU</th>
                        <th>PŁATNOŚĆ</th>
                        <th>DODATKOWY OPIS</th>
                    </tr>
                <?php foreach($bill as $keyBill) { ?>
                    <?php if($keyYear['rok'] == $keyBill['rok']) { ?>
                        <tr>
                            <td><?php echo $keyBill['numer_rachunku']; ?></td>
                            <td><?php echo $keyBill['data_rachunku']; ?></td>
                            <td><?php echo $keyBill['wyplata']; ?></td>
                            <td><?php echo $keyBill['kat_nazwa_pl']; ?></td>
                            <td><?php echo $keyBill['kwota_rachunku']; ?></td>
                            <td><?php echo $keyBill['nazwa_platnosci']; ?></td>
                            <td><?php echo $keyBill['dodatkowy_opis']; ?></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
                </table>
            <?php } ?>
        </div>
    </div>
</body>