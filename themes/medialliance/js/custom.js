jQuery(document).ready(function($){
	
	
	/* Rend la case du membre de l'équipe cliquable */
	$('.team-members .member').click(function(){
    	 window.location=$(this).find('a').attr('href'); 
     	 return false;
	});
	
	
	
	/* Dans la section équipe, centre la citation dans sa case */
	$('.team-citation .inner').each(function(){
		var citationEquipe = $('.team-citation .inner').height();
		
		var marginT = ($('.team-citation').height() - citationEquipe) / 2;
		
		$('.team-citation .inner').css('margin-top', marginT);
	});
	
	
	
	
	
	

	
	
});

jQuery(window).load(function(){
/* Ajoute l'effet parallax sur le slider des citations */
	
	jQuery('.tp-bgimg').addClass('parallax');
	
	var text_slider_transition  = 'fade';
    var text_slider_speed       = 5000;
	var slider = jQuery('.text-slide-vertical').bxSlider({
			controls: false,
			adaptiveHeight: true, 
			pager: false,		
			auto: true,
			mode: text_slider_transition,
			pause: text_slider_speed,
		});
	
		
		
	// Gère la traduction sur le slider d'entête de l'accueil (theme ne permet pas via WPML)
	// En francais, on enleve les slides qui commencent par [EN]..
	jQuery('.bx-wrapper ul').livequery('li', function(elem){
		
		if (jQuery('body.fr').length){
			if( jQuery(elem).find('.anglais').length ){
				jQuery(this).remove();	
			}
		}
		
		if (jQuery('body.en').length){ 
			if( jQuery(elem).find('.francais').length ){
				jQuery(this).remove();	
			}
		}
	
	slider.reloadSlider();
	
	});
	
	
	if(jQuery('body.home .team-citation').length){
		
		// Bloc citation A
		var numberA = 1 + Math.floor(Math.random() * 3);
    	jQuery('.num-gen').text(numberA);
		
		jQuery('body.home .citationsA .citation'+ numberA).css('display' , 'block');
		
		// Bloc citation B
		var numberB = 1 + Math.floor(Math.random() * 3);
    	jQuery('.num-gen').text(numberB);
		
		jQuery('body.home .citationsB .citation'+ numberB).css('display' , 'block');

		
	}

	if(jQuery('body.home .statistiques').length){
		
		// Bloc citation A
		var numero = 1 + Math.floor(Math.random() * 6);
    	jQuery('.num-gen').text(numero);
    	var numero2 = 1 + Math.floor(Math.random() * 6);
    	jQuery('.num-gen2').text(numero2);
    	var numero3 = 1 + Math.floor(Math.random() * 6);
    	jQuery('.num-gen2').text(numero3);

				jQuery('body.home .statistiques .stat'+ numero).css('display' , 'block');
				jQuery('body.home .statistiques .stat'+ numero2).css('display' , 'block');
				jQuery('body.home .statistiques .stat'+ numero3).css('display' , 'block');
	}

});

