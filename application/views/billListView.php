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

</style>
<body>
    <div class="container">
        <span class="title">LISTA RACHUNKÓW</span>
        <br />
        <br />
        <div class="list">
            <?php foreach($year as $keyYear) { ?>
                <span class="listYear"><?php echo $keyYear['rok']; ?></span><br /><br />
                <?php foreach($bill as $keyBill) { ?>
                    <?php if($keyYear['rok'] == $keyBill['rok']) { ?>
                        <table>
                            <tr>
                                <th>
                                    <span class="contentTable"><?php echo $keyBill['data_rachunku']; ?></span><br />
                                </th>
                                <td>
                                    <span class="contentTable"><?php echo $keyBill['kwota_rachunku']; ?></span>
                                </td>
                            </tr>
                        </table>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</body>