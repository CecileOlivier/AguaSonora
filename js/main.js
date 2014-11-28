$(document).ready(function() {

		if (window.matchMedia("(min-width: 768px)").matches) { 
          /* La largeur minimum de l'affichage est 600 px inclus */
          $('#mobile').addClass('display');
          $('#content > div').addClass('tabs-hide'); 
          $('.menu a').click(function(event) {
	        var anchor_init = $(event.currentTarget).attr('href');
	        // affichage du texte
	        $('#content > div').addClass('tabs-hide'); 
	        $(anchor_init).removeClass('tabs-hide'); 
	        // affichage lien actif
	        $('.menu li').removeClass('active');
	        $(".menu a[href="+anchor_init+"]").parent('li').addClass('active'); 
	        event.defaultPrevented;
            });
        } else {
          /* L'affichage est inférieur à 600px de large */
          $('#mobile').removeClass('display');
          $('.logo').addClass('display');
          $(".hide").hide(); 
          $(".lienvisible").click(function(event) {
          	$(".lienvisible").hide();
          	$(event.currentTarget).show();
            var val_link = $(event.currentTarget).attr('href'); // on récupère le href --> OK
            console.log(val_link);
            $('.hide').hide();
           	$(val_link).show();
        	});
        }

});