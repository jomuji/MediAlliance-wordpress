<?php

get_header();

get_template_part('sections/menu_section');

if( !function_exists('get_featured_image_metadata') ){

    function get_featured_image_metadata( $image_id ){

        $image_metadata             = array();
        $attachment_image_title     = __("Image Title", THEME_LANGUAGE_DOMAIN);
        $attachment_image_caption   = "";
        $attachment_image_desc      = __("Image Description", THEME_LANGUAGE_DOMAIN);
        $attachment_image           = get_post( $image_id );

        if( $attachment_image ){

            $attachment_image_title     = $attachment_image->post_title;
            $attachment_image_desc      = $attachment_image->post_content;
            $attachment_image_caption   = $attachment_image->post_excerpt;
        }

        $image_metadata['title']    = $attachment_image_title;
        $image_metadata['desc']     = $attachment_image_desc;
        $image_metadata['caption']  = $attachment_image_caption;

        return $image_metadata;
    }

}

if( has_post_thumbnail() ){

    $full_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );

    $image_info = get_featured_image_metadata( get_post_thumbnail_id($post->ID) );
    ?>

    <!-- Project Fullscreen Slider -->
    <a href="#" id="arrow_left"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow_left.png" alt="<?php _e('Slide Left', THEME_LANGUAGE_DOMAIN); ?>" /></a>
    <a href="#" id="arrow_right"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow_right.png" alt="<?php _e('Slide Right', THEME_LANGUAGE_DOMAIN); ?>" /></a>

<div id="holder">
    <div id="maximage-external">

        <div>
            <img src="<?php echo $full_image[0]; ?>" alt="" />
            <div class="in-slide-content">
           		<!--
                <div class="info-slide">
                    <h2><?php //echo $image_info['title']; ?></h2>
                    <p><?php //echo $image_info['caption']; ?></p>
                </div>
                <div class="description-slide">
                    <p><?php //echo $image_info['desc']; ?></p>
                </div>
                -->
            </div>
            
        </div>

        <?php
        $i = 2;
        $images_no = 5;
        if( function_exists( 'get_portfolio_featured_images_no' ) ){
            $images_no = get_portfolio_featured_images_no();
        }
        while( $i <= $images_no ) {

            $image_url = "";
            if (class_exists('MultiPostThumbnails')) {

                $image_url = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'featured-image-'.$i);
            }

            $image_id = "";
            if (class_exists('MultiPostThumbnails')) {

                $image_id = MultiPostThumbnails::get_post_thumbnail_id( get_post_type(), 'featured-image-'.$i, $post->ID );

            }

            $i++;

            if( $image_url != "" ) {

                $image_info = get_featured_image_metadata( $image_id );
                ?>

                <div>
                    <img src="<?php echo $image_url; ?>" alt="" />
                    <div class="in-slide-content">
                       <!--
                        <div class="info-slide">
                            <h2><?php //echo $image_info['title']; ?></h2>
                            <p><?php //echo $image_info['caption']; ?></p>
                        </div>
                        <?php if( !empty( $image_info['desc'] ) ){ ?></p>
                        <div class="description-slide">
                            <p><?php //echo $image_info['desc']; ?></p>
                        </div>
                        <?php } ?></p>
                         -->
                    </div>
                   
                </div>

            <?php
            }
        }
        ?>

    </div>
</div>
    <!--/Project Fullscreen Slider -->

<?php }?>

<div class="the-content clearfix">
	<div class="left">
        <div class="top">
            <div class="titre"><?php the_title(); ?></div>
            <span class="border"></span>
            <div class="cat-client"><?php echo get_post_meta($post->ID, 'wpcf-projet-categorie-client', true); ?> </div>
        </div>
        <div class="description"> 
			<?php the_content(); ?>    
    	</div>
    </div>
    <div class="right">
    	<div class="client">
        	<div class="logo"><img src="<?php echo get_post_meta($post->ID, 'wpcf-projet-logoclient', true); ?>" /> </div>
			<div class="nom-client"><?php echo get_post_meta($post->ID, 'wpcf-projet-client', true); ?> </div>
        </div>
        <div class="agence"><?php echo get_post_meta($post->ID, 'wpcf-projet-agence', true); ?> </div>
        <div class="campagne"> <?php echo get_post_meta($post->ID, 'wpcf-projet-campagne', true); ?></div>
        
		<div class="vid">
        
		<?php 
		
		
		//echo $lesVideos[0];
		/*
		foreach ( $lesVideos as $videos ){
			echo get_post_meta($post->ID, 'wpcf-projet-video', true);
		}
		*/
		?> 
        
       <?php 
	   $leTableau = get_post_meta($post->ID, 'wpcf-projet-video');
	  	$compteur = count(get_post_meta($post->ID, 'wpcf-projet-video'));
	   for( $i=0; $i<= $compteur; $i++){
		
		  echo  $leTableau[$i];
	   }
	   ?> 
        </div>
		
			
    </div>	
</div>

<?php get_footer(); ?>