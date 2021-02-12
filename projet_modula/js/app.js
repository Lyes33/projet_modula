$('.header_nav_toggle').click(function(e){
    e.preventDefault();
    //    on ajoute ou on supprime la classe is-open
    $('.header_nav').toggleClass('is-open');

})

$(function(){
    $(".box").click(function(){
        var parent = $(this).parent();
        
        if($(this).is(':checked')){
            parent.addClass("checked");
        }else{
            parent.removeClass("checked");
        }
    });
})

$(document).ready(function(){
    $("#soumettre").click(function(e){
        e.preventDefault();

        $.post(
            'contact.php',
            {
                nom : $("#nom").val(),
                prenom: $("#prenom").val(),
                mail: $("#mail").val(),
                mess: $("#mess").val(),
                rgpd: $("#rgpd").val()
            },

            function(data){

                if(data == 'Success'){

                    $("#resultat").html("<p>Votre message à été bien pris en compte !</p>");

                }
                else{

                    $("#resultat").html("<p>Votre message ne peut etre envoyer pour le moment...</p>");
                }

            },
        );
    });
});