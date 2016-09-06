$(document).ready(function() {
    $("#buttonLoginLayoutFront").fancybox();
    
    // charts
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Presence', '%'],
          ['Ok',     90],
          ['Abs',      10],
        ]);

        var options = {
          backgroundColor: { fill:'transparent' },
          chartArea:{left:2,top:2,width:'100%',height:'100%'},
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutpresencechart'));
        chart.draw(data, options);
        
      }
});

// gestion du loading ajax global
$(document).ajaxStart(function () {
    $("container").addClass("loading");
});
$(document).ajaxStop(function () {
    $("container").removeClass("loading");
});

