<?php

get_header();

global $global_theme_options;

get_template_part('sections/menu_section');

if ( have_posts() ) {

    the_post();

?>
    
 <div class="fiche-membre clearfix">
 	<div class="inner clearfix">
    	<div class="top">
        	<div class="nom"><?php  echo get_post_meta($post->ID,'wpcf-team-name', true); ?></div>
            <span class="border"></span>
            <div class="description"><?php  echo get_post_meta($post->ID,'wpcf-team-description', true); ?></div>
        </div>
    	<div class="left">
        	<div class="image"><img src="<?php  echo get_post_meta($post->ID,'wpcf-team-photo', true); ?>" /></div>
        </div>
        
        
        <div class="right">
        	
        	<div class="content">
            	<span class="title"><?php  echo get_post_meta($post->ID,'wpcf-team-titre-contenu-de-droite', true); ?></span>
				<?php  echo get_post_meta($post->ID,'wpcf-team-contenu-de-droite', true); ?>
            </div>
            
            
              <?php if(get_post_meta($post->ID,'wpcf-team-courriel', true)){ ?>
					 <div class="email"><a href="mailto:<?php echo get_post_meta($post->ID,'wpcf-team-courriel', true) ?>">
					 <?php if(ICL_LANGUAGE_CODE == 'fr'){ ?>
					 Contacter
					 <?php }else{ ?>
					 Contact
					 <?php } ?>
					 </a> </div>
				<?php } ?>
            
           
            <div class="social">
            	<?php if(get_post_meta($post->ID,'wpcf-team-facebook', true)){ ?>
					<div class="facebook"><a class="fa-facebook" href="<?php echo get_post_meta($post->ID,'wpcf-team-facebook', true) ?>">&nbsp;</a></div>
				<?php } ?>
                <?php if(get_post_meta($post->ID,'wpcf-team-linkedin', true)){ ?>
					<div class="linkedin"><a class="fa-linkedin" href="<?php echo get_post_meta($post->ID,'wpcf-team-linkedin', true) ?>">&nbsp;</a></div>
				<?php } ?>
                 <?php if(get_post_meta($post->ID,'wpcf-team-twitter', true)){ ?>
					<div class="twitter"><a class="fa-twitter" href="<?php echo get_post_meta($post->ID,'wpcf-team-twitter', true) ?>">&nbsp;</a></div>
				<?php } ?>
                 <?php if(get_post_meta($post->ID,'wpcf-team-google', true)){ ?>
					<div class="google"><a class="fa-google-plus" href="<?php echo get_post_meta($post->ID,'wpcf-team-google', true) ?>">&nbsp;</a></div>
				<?php } ?>
            </div>
        </div>
        
        <div class="bottom">
        
        	<div class="content">
            	<span class="title"><?php  echo get_post_meta($post->ID,'wpcf-team-titre-contenu-du-bas', true); ?></span>
				<?php  echo get_post_meta($post->ID,'wpcf-team-contenu-du-bas', true); ?>
            </div>
            
            <div class="back-btn">
            	<a class="fa-chevron-left" onClick="history.go(-1);return true;">Retour</a>
            </div>
        </div>
        
        
    </div>
 </div>
    
    
    
<?php

} // if have posts
	
wp_reset_query();

get_footer();

?>