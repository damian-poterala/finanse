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

    .position {
        font-size: 20px;
        color: #fff;
    }

</style>
<body>
    <div class="container">
        <span class="title">ILOŚĆ DODANYCH RACHUNKÓW</span>
        <div class="numberOfBillsAdded">
            <?php foreach($list as $key) { ?>
                <p class="position"><?php echo $key['miesiac'].' : '.$key['ILOSC']; ?></p>
            <?php } ?>
        </div>
    </div>
</body>