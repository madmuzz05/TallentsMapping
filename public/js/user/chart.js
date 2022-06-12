google.charts.load('current', {
    'packages': ['corechart']
})
google.charts.setOnLoadCallback(drawBasic)

function drawBasic() {
    if ($('#potensi-kekuatan').length > 0) {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Work', 5],
            ['Eat', 10],
            ['Commute', 15],
            ['Watch TV', 20],
            ['Sleep', 25]
        ]);
        var options = {
            width: '100%',
            
        };
        var chart1 = new google.visualization.PieChart(document.getElementById('potensi-kekuatan'));
        chart1.draw(data, options);
    }
    if ($('#potensi-kelemahan').length > 0) {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Mushrooms', 3],
          ['Onions', 1],
          ['Olives', 1],
          ['Zucchini', 1],
          ['Pepperoni', 2]
        ]);
        var options = {
            width: '100%',
            
        };
        var chart2 = new google.visualization.PieChart(document.getElementById('potensi-kelemahan'));
        chart2.draw(data, options);
    }
    
    if ($('#chart-user3').length > 0) {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Work', 5],
            ['Eat', 10],
            ['Commute', 15],
            ['Watch TV', 10],
            ['Sleep', 50]
        ]);
        var options = {
            width: '100%',
            
        };
        var chart3 = new google.visualization.PieChart(document.getElementById('chart-user3'));
    chart3.draw(data, options);
    }
    
    
    
}
