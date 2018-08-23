var myNewChart;

function lineChartData(){
    var dateIni = datePHP('Y-m-d',Math.round((new Date()).getTime() / 1000) - 1296000);
    var dateFin = datePHP('Y-m-d',Math.round((new Date()).getTime() / 1000));
    $.ajax({
    type: 'GET',
    url: `https://api.coindesk.com/v1/bpi/historical/close.json?start=${dateIni}&end=${dateFin}`,
    dataType: 'json',
    success: function(json){

        var labels = [], data = [];
        var index = 0;

        for(var date in json.bpi){
            labels.push(date);
            data.push(json.bpi[date]);
            index++;
        }

        var lineData = {
            labels: labels,
            datasets: [
                {
                    label: "Precios",
                    backgroundColor: '#f59c1a',
                    borderColor: '#F3BF73',
                    fillColor: "rgba(200,140,0,0.5)",
                    strokeColor: "#f59c1a",
                    pointColor: "#f59c1a",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(200,140,0,1)",
                    data: data
                }
            ]
        };
        
        var lineOptions = {
            scaleShowGridLines: true,
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleGridLineWidth: 1,
            bezierCurve: true,
            bezierCurveTension: 0.4,
            pointDot: true,
            pointDotRadius: 4,
            pointDotStrokeWidth: 1,
            pointHitDetectionRadius: 20,
            datasetStroke: true,
            datasetStrokeWidth: 2,
            datasetFill: true,
            responsive: true,
            animationSteps: 15
        };
        
        
        var ctx = document.getElementById("line-chart").getContext("2d");
        myNewChart = new Chart(ctx,{type:'line', data: lineData, options: lineOptions});
    }});
}

function updateChart(){
    $.ajax({
        type: 'GET',
        url: 'https://api.coindesk.com/v1/bpi/currentprice.json',
        dataType: 'json',
        success: function(json){
            
            myNewChart.data.datasets[0].data[14] = json.bpi.USD.rate_float;
            myNewChart.update();
        }
    })
}

setImmediate(lineChartData);
setInterval(updateChart,600000);
