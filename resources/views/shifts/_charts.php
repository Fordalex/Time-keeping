<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawDaysWorked);
    google.charts.setOnLoadCallback(drawDaysOfTheWeek);
    google.charts.setOnLoadCallback(drawChart);


    function drawDaysWorked() {
        var daysWorked = <?php echo count($shifts) ?>;
        var daysOff = <?php echo $from_date->diffInDays($to_date) - count($shifts) ?>;
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Days Worked', daysWorked],
            ['Days Off', daysOff],
        ]);
        var options = {
            title: 'Activity'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }

    function drawDaysOfTheWeek() {
        var data = google.visualization.arrayToDataTable(<?php echo ChartHelper::popular_days_worked_for_bar_graph($shifts) ?>);
        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
                        { calc: "stringify",
                            sourceColumn: 1,
                            type: "string",
                            role: "annotation" },
                        2]);
        var options = {
            title: "Worked days of the week",
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
        };
        var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
        chart.draw(view, options);
    }

    function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo ChartHelper::duration_per_day_for_timeline($shifts) ?>);

        var options = {
            title: 'Company Performance',
            curveType: 'function',
            legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
    }

</script>
    <div class="py-4 flex justify-center">
    <div id="piechart" style="width: 330px; height: 200px;"></div>
    <div id="barchart_values" style="width: 330px; height: 200px;"></div>
    <div id="curve_chart" style="width: 330px; height: 200px"></div>
    <!-- Add a timeline chart based on a date range and display the hours worked for each day. -->
</div>
