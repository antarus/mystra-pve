// gestion du loading ajax global
$(document).ajaxStart(function () {
    $("body").addClass("loading");
});
$(document).ajaxStop(function () {
    $("body").removeClass("loading");
});

/**
 * Gestion d'un formulaire en ajax
 * @returns null
 */
function gestionImportAjax()
{
    // Lorsque je soumets le formulaire
    $('#frmAjax').on('submit', function (e) {
        e.preventDefault(); // J'empêche le comportement par défaut du navigateur, c-à-d de soumettre le formulaire

        var $this = $(this); // L'objet jQuery du formulaire

        // Envoi de la requête HTTP en mode asynchrone
        $.ajax({
            url: $this.attr('action'), // Le nom du fichier indiqué dans le formulaire
            type: $this.attr('method'), // La méthode indiquée dans le formulaire (get ou post)
            data: $this.serialize(), // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
            dataType: 'json',
            beforeSend: function (html) { // Je récupère la réponse du fichier PHP
                //  $("body").addClass("loading");
            },
            complete: function (html) { // Je récupère la réponse du fichier PHP
                // $("body").removeClass("loading");
                $("#msg").removeClass('alert-success');
                $("#msg").removeClass('alert-danger');
                if (html.responseJSON.error) {
                    if (html.responseJSON.error.msg) {
                        $("#msg").addClass('alert-danger').text(html.responseJSON.error.msg);
                    } else {
                        $("#msg").addClass('alert-danger').text(html.responseJSON.error.type);
                    }
                } else if (html.responseJSON.trace) {
                    $("#msg").addClass('alert-danger').text(html.responseJSON.title);
                } else {
                    $("#msg").addClass('alert-success').text(html.responseJSON.success.msg);
                }
            }
        });
    });
}



/**
 * Gestion d'un formulaire en ajax
 * @returns null
 */
function gestionAjoutPersonnageRoster()
{
    $('#frmAjoutPersonnage').on('submit', function (e) {
        e.preventDefault(); // J'empêche le comportement par défaut du navigateur, c-à-d de soumettre le formulaire

        var $this = $(this); // L'objet jQuery du formulaire

// Envoi de la requête HTTP en mode asynchrone
        $.ajax({
            url: $this.attr('action'), // Le nom du fichier indiqué dans le formulaire
            type: $this.attr('method'), // La méthode indiquée dans le formulaire (get ou post)
            data: $this.serialize(), // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
            dataType: 'json',
            beforeSend: function (html) { // Je récupère la réponse du fichier PHP

            },
            complete: function (html) { // Je récupère la réponse du fichier PHP

                $("#msgAjoutPersonnage").removeClass('alert-success');
                $("#msgAjoutPersonnage").removeClass('alert-danger');
                if (html.responseJSON.error) {
                    $("#msg").addClass('alert-danger').text(html.responseJSON.error.msg);
                } else if (html.responseJSON.status == 500) {
                    $("#msg").addClass('alert-danger').text(html.responseJSON.title);
                } else {
                    $("#msgAjoutPersonnage").addClass('alert-success').text(html.responseJSON.success.msg);
                    if (!vContinue) {
                        $("#popupGlobal").dialog("close");
                        majListe();
                        $("#msg").addClass('alert-success').text(html.responseJSON.success.msg);
                    }
                }
            }
        });
    });
}

/**
 * Autcomplete pour le nom d'un personnage
 * @returns {undefined}
 */
function autocompleteNomPersonnage($uri) {
    $("input[name=nomPersonnage]").autocomplete({
        delay: 500,
        minLength: 3,
        source: function (request, response) {
            $.getJSON($uri, {
// do not copy the api key; get your own at developer.rottentomatoes.com
                rech: request.term,
                page_limit: 10
            }, function (data) {
// data is an array of objects and must be transformed for autocomplete to use
                var array = data.error ? [] : $.map(data.personnages, function (m) {
                    return {
                        id: m.idPersonnage,
                        nom: m.nom,
                        serveur: m.royaume,
                        guilde: m.guilde,
                        couleur: m.couleur
                    };
                });
                response(array);
            });
        },
        focus: function (event, ui) {
// prevent autocomplete from updating the textbox
            event.preventDefault();
        },
        select: function (event, ui) {
// prevent autocomplete from updating the textbox
            event.preventDefault();
            $("input[name=nomPersonnage]").val(ui.item.nom);
            $("input[name=idPersonnage]").val(ui.item.id);

        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var $a = $("<a></a>");
        if (item.guilde) {
            $("<span class='m-guilde'></span>").text(item.guilde).appendTo($a);
        }
        $("<span class='m-nom'></span>").css('color', item.couleur).text(item.nom).appendTo($a);
        $("<span class='m-separ'></span>").text(" - ").appendTo($a);
        $("<span class='m-serveur'></span>").text(item.serveur).appendTo($a);

        return $("<li></li>").append($a).appendTo(ul);
    };
}

/**
 * Transforme la reponse pour la page roster.
 * @returns {undefined}
 */
function transformeAutoCompletePourRoster($data) {
    var array = $data.error ? [] : $.map($data.rosters, function (m) {
        return {
            id: m.idRoster,
            nom: m.nom,
        };
    });
    return array;

}

/**
 * Transforme la reponse pour la page roster.
 * @returns {undefined}
 */
function transformeAutoCompletePourZone($data) {
    var array = $data.error ? [] : $.map($data.zones, function (m) {
        return {
            id: m.idZone,
            nom: m.nom,
        };
    });
    return array;

}
/**
 * Transforme la reponse pour la page roster.
 * @returns {undefined}
 */
function transformeAutoCompletePourMode($data) {
    var array = $data.error ? [] : $.map($data.modes, function (m) {
        return {
            id: m.idMode,
            nom: m.nom,
        };
    });
    return array;

}
/**
 * Autcomplete de base.
 * @returns {undefined}
 */
function autocompleteBase($input, $inputId, $uri, $type) {
    $($input).autocomplete({
        delay: 500,
        minLength: 3,
        source: function (request, response) {
            $.getJSON($uri, {
// do not copy the api key; get your own at developer.rottentomatoes.com
                rech: request.term,
                page_limit: 10
            }, function (data) {
// data is an array of objects and must be transformed for autocomplete to use
                switch ($type) {
                    case 'roster':
                        response(transformeAutoCompletePourRoster(data));
                        break;
                    case 'zone':
                        response(transformeAutoCompletePourZone(data));
                        break;
                    case 'mode':
                        response(transformeAutoCompletePourMode(data));
                        break;
                    default:
                        response(transformeAutoCompletePourRoster(data));
                }

            });
        },
        focus: function (event, ui) {
// prevent autocomplete from updating the textbox
            event.preventDefault();
        },
        select: function (event, ui) {
// prevent autocomplete from updating the textbox
            event.preventDefault();
            $($input).val(ui.item.nom);
            $($inputId).val(ui.item.id);

        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var $a = $("<a></a>");

        $("<span class='m-nom'></span>").text(item.nom).appendTo($a);

        return $("<li></li>").append($a).appendTo(ul);
    };
}

/**
 * initialise le code pour la popup d'ajout de personnage
 * @param {type} $titre de la poopup
 * @returns {undefined}
 */
function initDialogAddPersonnage($titre) {

    $("#addPersonnage").click(function () {
        $("#popupGlobal").dialog({
            draggable: false,
            modal: true,
            autoOpen: false,
            height: 350,
            width: 400,
            resizable: true,
            title: $titre,
            //position: {of: windows}
        });
        $("#popupGlobal").load($(this).attr('href'));
        $("#popupGlobal").dialog("open");
        return false;
    });
}