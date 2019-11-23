<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
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

    .chart {
        margin-left: 350px;
        color: #fff;
        margin-right: 20px;
        margin-top: 30px;
    }

    .chartBillAdded {
        background: #fff;
    }

    .chartValueBillAdded {
        background: #fff;
    }

    .chartAddedPayment {
        background: #fff;
    }

</style>
</head>
<body>
    <div class="chart">
        <h2>ILOŚĆ DODANYCH RACHUNKÓW</h2>
        <div class="chartBillAdded">
            <canvas id="chartCountBillAdded" width="100" height="15"></canvas>
        </div>
        <br />
        <h2>WARTOŚĆ DODANYCH RACHUNKÓW</h2>
        <div class="chartValueBillAdded">
            <canvas id="chartValueBillAdded" width="100" height="15"></canvas>
        </div>
        <br />
        <h2>DODANE WYPŁATY</h2>
        <div class="chartAddedPayment">
            <canvas id="chartAddedPayment" width="100" height="15"></canvas>
        </div>
    </div>

    <script type="text/javascript">

        // start create chart bill added

        var countBill = <?php echo $countBill; ?>;

        var arrMonth     = [];
        var arrCountBill = [];

        for(i = 0; i < countBill.length; i++)
        {
            arrMonth.push(countBill[i]['miesiac']);
            arrCountBill.push(countBill[i]['ILOSC']);
        }

        var canvas = document.querySelector('#chartCountBillAdded'); 

        var data = 
        {
            labels: arrMonth,
            datasets: 
            [
                {
                    label: "Ilość dodanych rachunków w 2019",
                    backgroundColor: "rgba(76, 175, 80, .3)",
                    borderColor: "rgba(rgba(76, 175, 80, 1))",
                    borderWidth: 2,
                    data: arrCountBill,
                }
            ]
        };

        var option = 
        {
            animation: 
            {
                duration: 5000
            }
        }

        var myBarChart = Chart.Bar(canvas, 
        {
            data: data,
            options: option
        });

        // end create bill added
        // start create value bill added

        var valueBill = <?php echo $valueBill; ?>;

        var arrMonth      = [];
        var arrValueBills = [];

        for(i = 0; i < valueBill.length; i++)
        {
            arrMonth.push(valueBill[i]['miesiac']);
            arrValueBills.push(valueBill[i]['WARTOSC']);
        }

        var canvas = document.querySelector("#chartValueBillAdded");

        var data = 
        {
            labels: arrMonth,
            datasets: 
            [
                {
                    label: "Wartość dodanych rachunków w 2019",
                    backgroundColor: "rgba(76, 175, 80, .3)",
                    borderColor: "rgba(rgba(76, 175, 80, 1))",
                    borderWidth: 2,
                    data: arrValueBills,
                }
            ]
        };

        var option = 
        {
            animation: 
            {
                duration: 5000
            }
        }

        var myBarChartValue = Chart.Bar(canvas, 
        {
            data: data,
            options: option
        });

        // end create value bill added
        // start added payment
        var paymentList = <?php echo $paymentList; ?>;

        var arrMonth   = [];
        var arrPayment = [];

        for(i = 0; i < paymentList.length; i++)
        {
            arrMonth.push(paymentList[i]['miesiac']);
            arrPayment.push(paymentList[i]['WYPLATA']);
        }

        var canvas = document.querySelector("#chartAddedPayment");

        var data = 
        {
            labels: arrMonth,
            datasets: 
            [
                {
                    label: "Dodane wypłaty w 2019",
                    backgroundColor: "rgba(76, 175, 80, .3)",
                    borderColor: "rgba(rgba(76, 175, 80, 1))",
                    borderWidth: 2,
                    data: arrPayment,
                }
            ]
        };

        var option = 
        {
            animation: 
            {
                duration: 5000
            }
        }

        var myBarChartValue = Chart.Bar(canvas, 
        {
            data: data,
            options: option
        });

        // end added payment

    </script>
</body>