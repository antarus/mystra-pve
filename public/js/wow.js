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
                $("body").addClass("loading");
            },
            complete: function (html) { // Je récupère la réponse du fichier PHP
                $("body").removeClass("loading");
                $("#msg").removeClass('alert-success');
                $("#msg").removeClass('alert-danger');
                if (html.responseJSON.error) {
                    $("#msg").addClass('alert-danger').text(html.responseJSON.error.msg);
                } else {
                    $("#msg").addClass('alert-success').text(html.responseJSON.success.msg);
                }
            }
        });
    });


}