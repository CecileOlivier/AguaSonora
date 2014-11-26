$(document).ready(function() {

	//$('.menu li:nth-child(3)').addClass('active');
        $('#content > div').addClass('tabs-hide'); 
        //$('#content > div:nth-child(1)').removeClass('tabs-hide');
        /*$('.menu a').parent('li').first().addClass('active');*/
        $('.menu a').click(function(event) {
	        var anchor_init = $(event.currentTarget).attr('href');
	        //console.log('anchor_init'+anchor_init);
	        //var anchor = anchor_init.substring(15);
	        //console.log('anchor'+anchor);
	        // affichage du texte
	        $('#content > div').addClass('tabs-hide'); 
	        $(anchor_init).removeClass('tabs-hide'); 
	        // affichage du after content
	        $('.menu li').removeClass('active');
	        //$(".menu a[href=index\\.php\\?menu\\=\\"+anchor+"]").parent('li').addClass('active')
	        $(".menu a[href="+anchor_init+"]").parent('li').addClass('active'); 
	        //console.log($(".menu a[href=index\\.php\\?menu\\=\\"+anchor+"]").parent('li'));
	        //console.log($(".menu a[href="+anchor_init+"]").parent('li'));
	          
	        event.defaultPrevented;

        });

});