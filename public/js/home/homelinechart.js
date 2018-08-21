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
                    label: "Example dataset",
                    fillColor: "rgba(220,220,220,0.5)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
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
        var myNewChart = new Chart(ctx).Line(lineData, lineOptions);
    }});
}

setImmediate(lineChartData);
setInterval(lineChartData,60000);
