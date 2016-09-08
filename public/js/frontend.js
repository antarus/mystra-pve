$(document).ready(function() {
    $("#buttonLoginLayoutFront").fancybox();
    
    $.chartsVar = new Object();
    
    if($('#ajaxUrl').val())
    {
        $.post($('#ajaxUrl').val() + 'ajaxPresence')
            .done(function( data ) {
                $.chartsVar.Dez  = data.Dez;
                $.chartsVar.Bank = data.Bank;
                $.chartsVar.spe1 = data.spe1;
                $.chartsVar.spe2 = data.spe2;
                $.chartsVar.spe3 = data.spe3;
                $.chartsVar.spe4 = data.spe4;
            })
            .fail(function() {
                $.chartsVar.Dez  = 0;
                $.chartsVar.Bank = 0;
                $.chartsVar.spe1 = 0;
                $.chartsVar.spe2 = 0;
                $.chartsVar.spe3 = 0;
                $.chartsVar.spe4 = 0;
        });

        
    
    // charts
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['loot', '%'],
          ['Dez',     $.chartsVar.Dez],
          ['Bank',    $.chartsVar.Bank],
          ['Spe 1',   $.chartsVar.spe1],
          ['Spe 2',   $.chartsVar.spe2],
          ['Spe 3',   $.chartsVar.spe3],
          ['Spe 4',   $.chartsVar.spe4],
        ]);

        var options = {
          backgroundColor: { fill:'transparent' },
          chartArea:{left:4,top:4,width:'100%',height:'100%'},
          pieHole: 0.4,
        };
        if($('#lootDonationTiers'))
        {
            var chart = new google.visualization.PieChart(document.getElementById('lootDonationTiers'));
            chart.draw(data, options);
        }
        
      }
    }
});

// gestion du loading ajax global
$(document).ajaxStart(function () {
    $("container").addClass("loading");
});
$(document).ajaxStop(function () {
    $("container").removeClass("loading");
});

