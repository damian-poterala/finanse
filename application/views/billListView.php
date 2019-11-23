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

    .collapsible {
        background: #4CAF50;
        color: #fff;
        cursor: pointer;
        padding: 18px;
        width: 98%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        margin-right: 30px;
    }

    .active, .collapsible:hover {
        background: #46a14a;
    }

    .collapsible:after {
        content: '\002B';
        color: #fff;
        font-weight: bold;
        float: right;
        margin-left: 5px;
    }

    .active:after {
        content: '\2212';
    }

    .content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
        background: #f1f1f1;
        width: 98%;
    }

    .contentTable {
        font-size: 26px;
        color: #fff;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
    }

    th, td {
        color: #fff;
        text-align: center;
        color: #000;
        border: 1px solid #000;
    }

</style>
<body>
    <div class="container">
        <span class="title">SZCZEGÓŁOWA LISTA RACHUNKÓW</span>
        <br />
        <br />
        <div class="list">
            <?php foreach($year as $keyYear) { ?>
                <button class="collapsible"><?php echo $keyYear['rok']; ?></button>
                <div class="content">
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
                                <td><?php echo $keyBill['kwota_rachunku']; ?> zł</td>
                                <td><?php echo $keyBill['nazwa_platnosci']; ?></td>
                                <td><?php echo $keyBill['dodatkowy_opis']; ?></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>
    <script>

        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) 
        {
            coll[i].addEventListener("click", function() 
            {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight)
                {
                    content.style.maxHeight = null;
                } 
                else 
                {
                    content.style.maxHeight = content.scrollHeight + "px";
                } 
            });
        }

    </script>
</body>