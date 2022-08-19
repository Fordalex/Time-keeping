<!-- TODO Refactor - each chart should be it's only shared partial, the other argument passed into the partial should be the data already formatted -->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawDaysWorked);
    google.charts.setOnLoadCallback(drawDaysOfTheWeek);
    google.charts.setOnLoadCallback(drawChart);


    function drawDaysWorked() {
        // TODO This should be moved into the charthelper
        var daysWorked = <?php echo $shift_range->shift_count() ?>;
        var daysOff = <?php echo $shift_range->total_days() - $shift_range->shift_count() ?>;
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
        var data = google.visualization.arrayToDataTable(<?php echo ChartHelper::duration_worked_per_day_bar_graph($shift_range->shifts) ?>);
        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
                        { calc: "stringify",
                            sourceColumn: 1,
                            type: "string",
                            role: "annotation" },
                        2]);
        var options = {
            title: "Duration worked per day",
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
        };
        var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
        chart.draw(view, options);
    }

    function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo ChartHelper::duration_per_day_for_timeline($shift_range->shifts) ?>);

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
</div>
