google.charts.load('current', {
    'packages': ['corechart']
})
google.charts.load('current', {
    'packages': ['line']
});
google.charts.setOnLoadCallback(drawBasic)

function drawBasic() {
        $.ajax({
            type: "GET",
            url: '/admin/index',
            dataType: 'json',
            success: function (res) {
                
                var data1 = new google.visualization.DataTable();
                data1.addColumn('string', 'Job Family');
                data1.addColumn('number', 'Total');
                    $.each(res.rekomendasi, function (key, item) {
                        data1.addRow([item.nama, parseFloat(item.total)]);
                    })
                var options1 = {
                    width: '100%',
                    tooltip: { trigger: 'selection',text: 'value' },

                };
                var chart1 = new google.visualization.PieChart(document.getElementById('potensi-kekuatan'));
                chart1.draw(data1, options1);
                
                const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];

    const d = new Date();
                var data2 = new google.visualization.DataTable();
                data2.addColumn('string',  month[d.getMonth()]);
                data2.addColumn('number', 'Total');
                console.log(res.assesmen);
                $.each(res.assesmen, function (key, item) {
                        data2.addRows([[item.bulan, parseFloat(item.total)]]);
                })
                var options2 = {
                    'width': '100%',
                    'curveType': "function",
                    'chartArea': {
                        'width': '98%'
                    },
                };

                var chart2 = new google.visualization.LineChart(document.getElementById('potensi-kelemahan'));

                chart2.draw(data2, options2);
                
            }
    })


}
