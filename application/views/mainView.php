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
    }

    .chartBillAdded {
        background: #fff;
    }

</style>
</head>
<body>
    <div class="chart">
        <h2>ILOŚĆ DODANYCH RACHUNKÓW</h2>
        <div class="chartBillAdded">
            <canvas id="myChart" width="100" height="25"></canvas>
        </div>
    </div>

    <script type="text/javascript">

        var countBill = <?php echo $list; ?>;

        var arrMonth     = [];
        var arrCountBill = [];

        for(i = 0; i < countBill.length; i++)
        {
            arrMonth.push(countBill[i]['miesiac']);
            arrCountBill.push(countBill[i]['ILOSC']);
        }

        var canvas = document.querySelector('#myChart'); 

        var data = 
        {
            labels: arrMonth,
            datasets: 
            [
                {
                    label: "Ilość dodanych rachunków",
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

    </script>
</body>