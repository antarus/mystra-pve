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
                    backgroundColor = ['black', 'green', 'pink', 'blue', 'white', 'purple'];
                    hoverBackgroundColor = ['blue', 'pink', 'green', 'black', 'purple', 'white'];
                    generateCharts(data, 'lootDonationTiers', 'doughnut', options, backgroundColor, hoverBackgroundColor);
                })
                .fail(function () {
                    generateCharts('');
                });
        }
        if($('#lootDonationRaid').length)
        { 
            
        }
        if($('#lootRosterNoRoster').length)
        { 
            
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

    var ctx = document.getElementById(divId);
    new Chart(ctx, {
        type: type,
        data: chartsData,
        options: options
    });
}