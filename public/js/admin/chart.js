google.charts.load('current', {
    'packages': ['corechart']
})
google.charts.setOnLoadCallback(drawBasic)

function drawBasic() {
    if ($('#potensi-kekuatan').length > 0) {
        $.ajax({
            type: "GET",
            url: '/admin/index',
            dataType: 'json',
            success: function (res) {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Job Family');
                data.addColumn('number', 'Total');
                    $.each(res.rekomendasi, function (key, item) {
                        data.addRows([[item.nama, item.total]]);
                    })
                var options = {
                    width: '100%',
                    tooltip: { trigger: 'selection',text: 'value' },

                };
                var chart1 = new google.visualization.PieChart(document.getElementById('potensi-kekuatan'));
                chart1.draw(data, options);
            }
        })
    }
}

google.charts.load('current', {
    'packages': ['line']
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    $.ajax({
        type: "GET",
        url: '/admin/index',
        dataType: 'json',
        success: function (res) {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Hari');
            data.addColumn('number', 'Total');
            console.log(res.assesmen);
            $.each(res.assesmen, function (key, item) {
                    data.addRows([[item.bulan, item.total]]);
            })
            var options = {
                'width': '100%',
                'curveType': "function",
                'chartArea': {
                    'width': '98%'
                },
            };

            var chart = new google.charts.Line(document.getElementById('potensi-kelemahan'));

            chart.draw(data, google.charts.Line.convertOptions(options));
            $(window).resize(function () {
                chart.draw(data, options);
            });
        }
    })
}
