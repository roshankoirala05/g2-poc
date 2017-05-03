/*
 *  Ajax function for Graph
 */


$(function () {
    $.ajax({

        url: '../chart_data.php',
        type: 'GET',
        success: function (data) {
            chartData = data;
            var chartProperties = {
                "caption": "Visitor From States",
                "xAxisName": "State",
                "yAxisName": "Number of Visitor",
                "rotatevalues": "1",
                "theme": "ocean"
            };

            apiChart = new FusionCharts({
                type: 'column2d',
                renderAt: 'chart-container',
                width: '1000',
                height: '600',
                dataFormat: 'json',
                dataSource: {
                    "chart": chartProperties,
                    "data": chartData
                }
            });
            apiChart.render();
        }
    });
});
