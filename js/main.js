$(document).ready(function() {

		if (window.matchMedia("(min-width: 768px)").matches) { 

          /* La largeur minimum de l'affichage est de 768px */
          $('#mobile').addClass('display');
          // Les blocs sont masqués par défaut
          $('#content > div').addClass('tabs-hide'); 
          
          // Fonction au clic sur le menu
          $('.menu a').click(function(event) {
              // Récupération de la valeur du lien
    	        var anchor_init = $(event.currentTarget).attr('href');
              // Affichage du bloc lié au menu
    	        $(anchor_init).removeClass('tabs-hide'); 
    	        // Ajout de la classe active sur le menu
    	        $('.menu li').removeClass('active');
    	        $(".menu a[href=\\"+anchor_init+"]").parent('li').addClass('active'); 
    	        event.defaultPrevented;
          });

          // Personnalisation de la scrollbar
          $(window).load(function(){
              $("#who").mCustomScrollbar();
              $("#calendrier").mCustomScrollbar();
          });
          
          // Test si un hash est présent, et simulation du clic sur le lien correspondant
          var hash = window.location.hash;
          if(hash) {
            var lien = $('[href="'+hash+'"]')
            lien.click();
          }
    } 

    else {
          /* L'affichage est inférieur à 768px de large */
          $('#mobile').removeClass('display');
          $('.logo').addClass('display');
          // Les textes sont masqués par défaut
          $(".hide").hide(); 
            $(".lienvisible").click(function(event) {
                $(event.currentTarget).show();
                // Récupération du lien
                var val_link = $(event.currentTarget).attr('href'); 
                // Affichage du lien
                $(val_link).show();
            });
    }

});