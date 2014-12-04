$(document).ready(function() {

		if (window.matchMedia("(min-width: 768px)").matches) { 

          /* La largeur minimum de l'affichage est de 768px */
          $('#mobile').addClass('display');
           /* Valeur du hash */
          /*var hash = window.location.hash;
          var bloc = '#images-sons';
          if(hash == bloc){
            $('#images-sons').removeClass('tabs-hide');
            console.log('le hash est '+hash);
          }
          else {
            console.log('pas de hash');
          }*/
          // état de base : les blocs sont cachés
          $('#content > div').addClass('tabs-hide'); 
          // au clic sur un élément du menu,
          $('.menu a').click(function(event) {
              // variable contenant la valeur du lien
    	        var anchor_init = $(event.currentTarget).attr('href');
              // variable contenant l'ancre
              var anchor = anchor_init.substring(15);
    	        // on cache tous les blocs
    	        $('#content > div').addClass('tabs-hide'); 
              // on affiche le bloc lié au menu
    	        $(anchor).removeClass('tabs-hide'); 
    	        // gestion de la classe active sur le menu
    	        $('.menu li').removeClass('active');
    	        $(".menu a[href=index\\.php\\?menu\\=\\"+anchor+"]").parent('li').addClass('active'); 
    	        event.defaultPrevented;
          });
          $(window).load(function(){
              $("#who").mCustomScrollbar();
              $("#calendrier").mCustomScrollbar();
          });
    } 

    else {
          /* L'affichage est inférieur à 768px de large */
          $('#mobile').removeClass('display');
          $('.logo').addClass('display');
          $(".hide").hide(); 
          $(".lienvisible").click(function(event) {
            	$(".lienvisible").hide();
            	$(event.currentTarget).show();
              // on récupère le href
              var val_link = $(event.currentTarget).attr('href'); 
              console.log(val_link);
              $('.hide').hide();
             	$(val_link).show();
        	});
    }

});