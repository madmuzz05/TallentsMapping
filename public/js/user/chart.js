google.charts.load('current', {
    'packages': ['corechart']
})
google.charts.setOnLoadCallback(drawBasic)

function drawBasic() {
        $.ajax({
            type: "GET",
            url: '/simulasi/show',
            dataType: 'json',
            success: function (res) {
                var data1 = new google.visualization.DataTable();
                data1.addColumn('string', 'Tema bakat');
                data1.addColumn('number', 'Nilai');
                $.each(res.kekuatan, function (key, item) {
                    // console.log(item.nama_tema);
                    data1.addRow([item.nama_tema, parseFloat(item.nilai)]);
                })
                var options1 = {
                    width: '100%',
                    tooltip: { trigger: 'selection',text: 'percentage' },

                };
                var chart1 = new google.visualization.PieChart(document.getElementById('hasil1'));
                chart1.draw(data1, options1);

                var data2 = new google.visualization.DataTable();
                data2.addColumn('string', 'Tema bakat');
                data2.addColumn('number', 'Nilai');
                $.each(res.kelemahan, function (key, item) {
                    // console.log(item.nama_tema);
                    // if (item.nilai = '0') {
                    //     data.addRows([[item.nama_tema, 0.1]]);
                    // } else {
                        data2.addRow([item.nama_tema, parseFloat(item.nilai)]);
                    // }
                })
                var options2 = {
                    width: '100%',
                    tooltip: { trigger: 'selection',text: 'percentage' },

                };
                var chart2 = new google.visualization.PieChart(document.getElementById('hasil2'));
                chart2.draw(data2, options2);

                var data3 = new google.visualization.DataTable();
                data3.addColumn('string', 'Job Family');
                data3.addColumn('number', 'Nilai');
                console.log(res.data);
                $.each(res.data, function (key, item) {
                        data3.addRows([[item.job_family, parseFloat(item.nilai)]]);
                })
                var options3 = {
                    width: '100%',
                    tooltip: { trigger: 'selection',text: 'percentage' },
                    sliceVisibilityThreshold: 0

                };
                var chart3 = new google.visualization.PieChart(document.getElementById('hasil-rekomendasi'));
                chart3.draw(data3, options3);
            }
        })
    }
