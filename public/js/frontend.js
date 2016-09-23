$(document).ready(function () {


    data = {};
    options = {};
    backgroundColor = [];
    hoverBackgroundColor = [];

    if ($('#ajaxUrl').val())
    {
        if ($('#lootDonationTiers').length)
        {
            $.post($('#ajaxUrl').val() + 'ajaxLootDonationTiers')
                    .done(function (data) {
                        options = {
                            legend: {
                                labels: {
                                    fontColor: '#FFF',
                                    boxWidth: 20
                                },
                                position: 'right'
                            }
                        };
                        backgroundColor = ['rgba(25,52,65,0.8)', 'rgba(38,60,69,0.8)',
                            'rgba(37,70,74,0.8)', 'rgba(62,96,111,0.8)',
                            'rgba(64,98,102,0.8)', 'rgba(84,111,112,0.8)',
                            'rgba(145,170,157,0.8)', 'rgba(209,219,189,0.8)',
                            'rgba(252,255,245,0.8)'];

                        hoverBackgroundColor = ['rgba(25,52,65,1)', 'rgba(38,60,69,1)',
                            'rgba(37,70,74,1)', 'rgba(62,96,11,1)',
                            'rgba(64,98,102,1)', 'rgba(84,111,112,1)',
                            'rgba(145,170,157,1)', 'rgba(209,219,189,1)',
                            'rgba(252,255,245,1)'];
                        generateCharts(data, 'lootDonationTiers', 'pie', options, backgroundColor, hoverBackgroundColor);
                    })
                    .fail(function () {
                        generateCharts('');
                    });
        }
        if ($('#lootDonationRaid').length)
        {
            data = {
                Dez: 12,
                Spe1: 45,
                Spe2: 24
            };
            options = {
                legend: {
                    labels: {
                        fontColor: '#FFF',
                        boxWidth: 20
                    },
                    position: 'right'
                }
            };
            backgroundColor = ['rgba(209,219,189,1)',
                'rgba(25,52,65,1)',
                'rgba(62,96,111,1)'];
            hoverBackgroundColor = ['rgba(209,219,189,0.8)',
                'rgba(25,52,65,0.8)',
                'rgba(62,96,111,0.8)'];
            generateCharts(data, 'lootDonationRaid', 'pie', options, backgroundColor, hoverBackgroundColor);
        }
        if ($('#lootDonationRaid').length)
        {
            data = {
                Dez: 12,
                Spe1: 45,
                Spe2: 24
            };
            options = {
                legend: {
                    labels: {
                        fontColor: '#FFF',
                        boxWidth: 20
                    },
                    position: 'right'
                }
            };
            backgroundColor = ['rgba(209,219,189,1)',
                'rgba(25,52,65,1)',
                'rgba(62,96,111,1)'];
            hoverBackgroundColor = ['rgba(209,219,189,0.8)',
                'rgba(25,52,65,0.8)',
                'rgba(62,96,111,0.8)'];
            generateCharts(data, 'lootDonationRaid', 'pie', options, backgroundColor, hoverBackgroundColor);
        }
        if ($('#presenceRoster').length)
        {
            $.post($('#ajaxUrl').val() + 'ajaxRoster')
                    .done(function (data) {
                        options = {
                            legend: {
                                labels: {
                                    color: '#FFF'
                                },
                                display: false
                            },
                            scales: {
                                xAxes: [{
                                        gridLines: {
                                            show: true, color: 'rgba(255,255,255,0)'
                                        },
                                        ticks: {
                                            fontColor: '#FFF'
                                        }
                                    }],
                                yAxes: [{
                                        gridLines: {
                                            show: true, color: 'rgba(255,255,255,0.40)'
                                        },
                                        ticks: {
                                            display: true,
                                            beginAtZero: true,
                                            fontColor: '#FFF'
                                        }
                                    }]
                            }
                        };

                        generateCharts(data.participants, 'presenceRoster', 'bar', options, data.couleur, hoverBackgroundColor);
                    })
                    .fail(function () {
                        generateCharts('');
                    });

        }

    }

    link = '#configRoster';
    $(".boutonStats").on("click", function ()
    {
        var newLink = $(this).attr('name');
//        console.log('link :'+link);
//        console.log('newlink :'+newLink);
        if (newLink !== link) {
            $(link).toggle("drop", 500);
            $('.boutonStats').removeClass('activeStats');
            $(newLink).delay(600);
            $(newLink).toggle("drop", 500);
            $(this).addClass('activeStats');
            link = newLink;
        } else {
            $(newLink).toggle("drop", 500);
            $('.boutonStats').removeClass('activeStats');
            link = '';
        }
    });

    $('#validerRaid').on('click', function () {
        event.preventDefault();
        selected = $('#raidList').find(":selected").val();
        console.log(selected);
        $.post($('#ajaxUrl').val() + "ajaxProgress",
                {
                    value: selected
                }).done(
                function (data) {
                    options = {
                        legend: {
                            labels: {
                                color: '#FFF'
                            },
                            display: false
                        },
                        scales: {
                            xAxes: [{
                                    gridLines: {
                                        show: true, color: 'rgba(255,255,255,0)'
                                    },
                                    ticks: {
                                        fontColor: '#FFF'
                                    }
                                }],
                            yAxes: [{
                                    gridLines: {
                                        show: true, color: 'rgba(255,255,255,0.40)'
                                    },
                                    ticks: {
                                        display: true,
                                        beginAtZero: true,
                                        fontColor: '#FFF'
                                    }
                                }]
                        }
                    };
                    backgroundColor = ['rgba(255,255,255,0.60)', 'rgba(255,255,255,0.60)', 'rgba(255,255,255,0.60)'];
                    hoverBackgroundColor = ['rgba(255,255,255,1)', 'rgba(255,255,255,1)', 'rgba(255,255,255,1)'];
                    generateCharts(data, 'progressRaid', 'bar', options, backgroundColor, hoverBackgroundColor);
                }).fail(function () {
            generateCharts('');
        });

    });
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