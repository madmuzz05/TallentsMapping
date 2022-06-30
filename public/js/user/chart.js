google.charts.load('current', {
    'packages': ['corechart']
})
google.charts.setOnLoadCallback(drawBasic)

function drawBasic() {
    if ($('#potensi-kekuatan').length > 0) {
        $.ajax({
            type: "GET",
            url: '/simulasi/show',
            dataType: 'json',
            success: function (res) {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Tema bakat');
                data.addColumn('number', 'Nilai');
                $.each(res.kekuatan, function (key, item) {
                    // console.log(item.nama_tema);
                    data.addRows([[item.nama_tema, item.nilai]]);
                })
                var options = {
                    width: '100%',
                    tooltip: { trigger: 'selection',text: 'percentage' },

                };
                var chart1 = new google.visualization.PieChart(document.getElementById('potensi-kekuatan'));
                chart1.draw(data, options);
            }
        })
    }
    if ($('#potensi-kelemahan').length > 0) {
        $.ajax({
            type: "GET",
            url: '/simulasi/show',
            dataType: 'json',
            success: function (res) {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Tema bakat');
                data.addColumn('number', 'Nilai');
                $.each(res.kelemahan, function (key, item) {
                    // console.log(item.nama_tema);
                    // if (item.nilai = '0') {
                    //     data.addRows([[item.nama_tema, 0.1]]);
                    // } else {
                        data.addRows([[item.nama_tema, item.nilai]]);
                    // }
                })
                var options = {
                    width: '100%',
                    tooltip: { trigger: 'selection',text: 'percentage' },

                };
                var chart1 = new google.visualization.PieChart(document.getElementById('potensi-kelemahan'));
                chart1.draw(data, options);
            }
        })
    }

    if ($('#hasil-rekomendasi').length > 0) {
        $.ajax({
            type: "GET",
            url: '/simulasi/show',
            dataType: 'json',
            success: function (res) {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Job Family');
                data.addColumn('number', 'Nilai');
                console.log(res.data);
                $.each(res.data, function (key, item) {
                        data.addRows([[item.job_family.job_family, item.nilai]]);
                })
                var options = {
                    width: '100%',
                    tooltip: { trigger: 'selection',text: 'percentage' },
                    sliceVisibilityThreshold: 0

                };
                var chart3 = new google.visualization.PieChart(document.getElementById('hasil-rekomendasi'));
                chart3.draw(data, options);
            }
        })
    }



}
