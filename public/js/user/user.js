$(document).ready(function() {

    $( "#gravatarEmail" ).focusout(function() {
        if ($(this).val() === ''){
            $('#titleGravatar').hide();
            $('#gravatar').html('');
        }
        else
        {
            $.post($('#getUrl').val()+"getgravatar", { mail: $(this).val()})
                .done(function(data) {
                    $('#titleGravatar').show();
                    $('#gravatar').html(data.gravatar);
                });
        }
    });
});
