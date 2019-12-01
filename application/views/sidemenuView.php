<style>

    body {
        font-family: sans-serif;
        margin: 0;
        padding: 0;
        background-size: cover;
        background: url('https://i.pinimg.com/originals/ea/3f/d3/ea3fd3102ccf575e3c33954f73eab78d.jpg') no-repeat;
        box-sizing: border-box;
    }

    .sideNav {
        height: 100%;
        width: 300px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        overflow-x: hidden;
        padding-top: 20px;
        background: #1B1B1B;
    }

    .sideNav {
        padding: 6px 6px 6px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #fff;
        display: block;
    }

    .option {
        width: 100%;
        overflow: hidden;
        font-size: 20px;
        padding: 8px 0;
        margin: 8px 0; 
    }

    .option a {
        text-decoration: none;
        color: #fff;
    }

    .btn {
        width: 90%;
        background: none;
        border: 2px solid #4CAF50;
        color: #fff;
        font-size: 18px;
        cursor: pointer;
        transition: all 300ms;
        height: 50px;
    }

    .btn:hover {
        background: #4CAF50;
        color: #fff;
        transition: all 300ms;
        height: 50px;
    }

</style>
<body>
    <div class="sideNav">
        <div class="option">
            <a href="<?php echo base_url().'mainView'; ?>">
                <input type="submit" value="Strona główna" class="btn">
            </a>
        </div>
        <div class="option">
            <a href="<?php echo base_url().'addPayment'; ?>">
                <input type="submit" value="Dodaj wypłatę" class="btn">
            </a>
        </div>
        <div class="option">
            <a href="<?php echo base_url().'addBill'; ?>">
                <input type="submit" value="Dodaj rachunek" class="btn">
            </a>
        </div>
        <div class="option">
            <a href="<?php echo base_url().'billList'; ?>">
                <input type="submit" value="Lista rachunków" class="btn">
            </a>
        </div>
        <div class="option">
            <a href="<?php echo base_url().'listReports'; ?>">
                <input type="submit" value="Lista raportów" class="btn">
            </a>
        </div>
        <div class="option">
            <a href="#">
                <input type="submit" value="Profil" class="btn">
            </a>
        </div>
        <div class="option">
            <a href="<?php echo base_url().'logout'; ?>">
                <input type="submit" value="Wyloguj" class="btn">
            </a>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/55ab1bb525.js" crossorigin="anonymous"></script>
</body>