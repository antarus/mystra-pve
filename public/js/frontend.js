$(document).ready(function () {
    $("#buttonLoginLayoutFront").fancybox();

    data = {};
    options = {};
    backgroundColor = [];
    hoverBackgroundColor = [];

    if ($('#ajaxUrl').val())
    {
        if($('#lootDonationTiers').length)
        { 
            $.post($('#ajaxUrl').val() + 'ajaxPresence')
                .done(function (data) {
                    options = {
                        legend: {
                            labels: {
                                fontColor: '#FFF'
                            },
                            position : 'right'
                        }
                    };
                    backgroundColor = ['rgba(209,219,189,1)', 'rgba(255,255,245,1)', 'rgba(25,52,65,1)', 'rgba(62,96,111,1)', 'rgba(145,170,157,1)', 'rgba(209,219,189,1)'];
                    hoverBackgroundColor = ['rgba(209,219,189,0.6)', 'rgba(255,255,245,0.6)', 'rgba(25,52,65,0.6)', 'rgba(62,96,111,0.6)', 'rgba(145,170,157,0.6)', 'rgba(209,219,189,0.6)'];
                    generateCharts(data, 'lootDonationTiers', 'doughnut', options, backgroundColor, hoverBackgroundColor);
                })
                .fail(function () {
                    generateCharts('');
                });
        }
        if($('#lootDonationRaid').length)
        { 
            data = {
                Dez: 12,
                Spe1: 45,
                Spe2:24
            };
            backgroundColor = ['rgba(209,219,189,1)', 'rgba(25,52,65,1)', 'rgba(62,96,111,1)'];
            hoverBackgroundColor = ['rgba(209,219,189,0.6)', 'rgba(25,52,65,0.6)', 'rgba(62,96,111,0.6)'];
            generateCharts(data, 'lootDonationRaid', 'doughnut', options, backgroundColor,hoverBackgroundColor);
        }
        if($('#lootRosterNoRoster').length)
        { 
            data = {
                Roster: 12,
                NonRoster: 45
            };
            backgroundColor = ['rgba(25,52,65,1)', 'rgba(209,219,189,1)'];
            hoverBackgroundColor = ['rgba(25,52,65,0.6)', 'rgba(209,219,189,0.6)'];
            generateCharts(data, 'lootRosterNoRoster', 'doughnut', options, backgroundColor, hoverBackgroundColor);
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

function generateCharts(data, divId, type, options, backgroundColor, hoverBackgroundColor)
{
    var labs = [];
    var datareceived = [];

    $.each(data, function (key, value) {
        labs.push(key);
        datareceived.push(value);
    });

    chartsData = {
        labels: labs,
        datasets: [
            {
                data: datareceived,
                backgroundColor: backgroundColor,
                hoverBackgroundColor: hoverBackgroundColor
            }]
    };
    console.log(chartsData);
    var ctx = document.getElementById(divId);
    new Chart(ctx, {
        type: type,
        data: chartsData,
        options: options
    });
}