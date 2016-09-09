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
        
        var data = {
            labels: [
                "Red",
                "Blue",
                "Yellow"
            ],
            datasets: [
                {
                    data: [300, 50, 100],
                    backgroundColor: [
                        "#FF6384",
                        "#36A2EB",
                        "#FFCE56"
                    ],
                    hoverBackgroundColor: [
                        "#FF6384",
                        "#36A2EB",
                        "#FFCE56"
                    ]
                }]
        };
        
        if($('#lootDonationTiers').length)
        {
            var ctx = document.getElementById("lootDonationTiers");
            var myDoughnutChart = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: {},
            });
        }
        if($('#lootDonationRaid').length)
        { 
            var chart = new google.visualization.ColumnChart(document.getElementById('lootDonationRaid'));
            chart.draw(dataDonationRaid, optionsDonationRaid);
        }
        if($('#lootRosterNoRoster').length)
        { 
            var chart = new google.visualization.PieChart(document.getElementById('lootRosterNoRoster'));
            chart.draw(dataLootRosterNoRoster, options);
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

