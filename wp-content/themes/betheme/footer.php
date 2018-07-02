<?php
/**
 * The template for displaying the footer.
 *
 * @package Betheme
 * @author Muffin group
 * @link http://muffingroup.com
 */


$back_to_top_class = mfn_opts_get('back-top-top');

if( $back_to_top_class == 'hide' ){
	$back_to_top_position = false;
} elseif( strpos( $back_to_top_class, 'sticky' ) !== false ){
	$back_to_top_position = 'body';
} elseif( mfn_opts_get('footer-hide') == 1 ){
	$back_to_top_position = 'footer';
} else {
	$back_to_top_position = 'copyright';
}

?>

<?php do_action( 'mfn_hook_content_after' ); ?>

<!-- #Footer -->		
<footer id="Footer" class="clearfix">
	
	<?php if ( $footer_call_to_action = mfn_opts_get('footer-call-to-action') ): ?>
	<div class="footer_action">
		<div class="container">
			<div class="column one column_column">
				<?php echo do_shortcode( $footer_call_to_action ); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	<?php 
		$sidebars_count = 0;
		for( $i = 1; $i <= 5; $i++ ){
			if ( is_active_sidebar( 'footer-area-'. $i ) ) $sidebars_count++;
		}
		
		if( $sidebars_count > 0 ){
			
			$footer_style = '';
				
			if( mfn_opts_get( 'footer-padding' ) ){
				$footer_style .= 'padding:'. mfn_opts_get( 'footer-padding' ) .';';
			}
			
			echo '<div class="widgets_wrapper" style="'. $footer_style .'">';
				echo '<div class="container">';
						
					if( $footer_layout = mfn_opts_get( 'footer-layout' ) ){
						// Theme Options

						$footer_layout 	= explode( ';', $footer_layout );
						$footer_cols 	= $footer_layout[0];
		
						for( $i = 1; $i <= $footer_cols; $i++ ){
							if ( is_active_sidebar( 'footer-area-'. $i ) ){
								echo '<div class="column '. $footer_layout[$i] .'">';
									dynamic_sidebar( 'footer-area-'. $i );
								echo '</div>';
							}
						}						
						
					} else {
						// Default - Equal Width
						
						$sidebar_class = '';
						switch( $sidebars_count ){
							case 2: $sidebar_class = 'one-second'; break;
							case 3: $sidebar_class = 'one-third'; break;
							case 4: $sidebar_class = 'one-fourth'; break;
							case 5: $sidebar_class = 'one-fifth'; break;
							default: $sidebar_class = 'one';
						}
						
						for( $i = 1; $i <= 5; $i++ ){
							if ( is_active_sidebar( 'footer-area-'. $i ) ){
								echo '<div class="column '. $sidebar_class .'">';
									dynamic_sidebar( 'footer-area-'. $i );
								echo '</div>';
							}
						}
						
					}
				
				echo '</div>';
			echo '</div>';
		}
	?>


	<?php if( mfn_opts_get('footer-hide') != 1 ): ?>
	
		<div class="footer_copy">
			<div class="container">
				<div class="column one">

					<?php 
						if( $back_to_top_position == 'copyright' ){
							echo '<a id="back_to_top" class="button button_js" href=""><i class="icon-up-open-big"></i></a>';
						}
					?>
					
					<!-- Copyrights -->
					<div class="copyright">
						<?php 
							if( mfn_opts_get('footer-copy') ){
								echo do_shortcode( mfn_opts_get('footer-copy') );
							} else {
								echo '&copy; '. date( 'Y' ) .' '. get_bloginfo( 'name' ) .'. All Rights Reserved. <a target="_blank" rel="nofollow" href="http://muffingroup.com">Muffin group</a>';
							}
						?>
					</div>
					
					<?php 
						if( has_nav_menu( 'social-menu-bottom' ) ){
							mfn_wp_social_menu_bottom();
						} else {
							get_template_part( 'includes/include', 'social' );
						}
					?>
							
				</div>
			</div>
		</div>
	
	<?php endif; ?>
	
	
	<?php 
		if( $back_to_top_position == 'footer' ){
			echo '<a id="back_to_top" class="button button_js in_footer" href=""><i class="icon-up-open-big"></i></a>';
		}
	?>

	
</footer>

</div><!-- #Wrapper -->

<?php 
	// Responsive | Side Slide
	if( mfn_opts_get( 'responsive-mobile-menu' ) ){
		get_template_part( 'includes/header', 'side-slide' );
	}
?>

<?php
	if( $back_to_top_position == 'body' ){
		echo '<a id="back_to_top" class="button button_js '. $back_to_top_class .'" href=""><i class="icon-up-open-big"></i></a>';
	}
?>

<?php if( mfn_opts_get('popup-contact-form') ): ?>
	<div id="popup_contact">
		<a class="button button_js" href="#"><i class="<?php mfn_opts_show( 'popup-contact-form-icon', 'icon-mail-line' ); ?>"></i></a>
		<div class="popup_contact_wrapper">
			<?php echo do_shortcode( mfn_opts_get('popup-contact-form') ); ?>
			<span class="arrow"></span>
		</div>
	</div>
<?php endif; ?>

<?php do_action( 'mfn_hook_bottom' ); ?>
	
<!-- wp_footer() -->
<?php wp_footer(); ?>
<script src="<?php bloginfo('template_directory') ?>/js/custom_js_nhan.js"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=1954704611475793";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div id="cfacebook">
    <a href="javascript:;" class="chat_fb hidden-xs" onclick="return:false;"><i class="fa fa-facebook-square"></i> Hỗ trợ trực tuyến</a>
    <div class="fchat">
        <div class="fb-page" data-href="https://www.facebook.com/rookie.marketing2018/" data-height="300" data-width="250" data-tabs="messages" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">Tranh Canvas</div>
    </div>
</div>
<script>
    jQuery(".chat_fb").click(function() {
        jQuery('.fchat').toggle('slow');
    });
    jQuery(function($){
        $("#menu-main-menu").append('<li id="menu-item-100" class="menu-item menu-item-type-post_type menu-item-object-post last"><a href="/gio-hang/"><i style="font-size: 22px" class="fa fa-shopping-cart"></i><span id="number-cart" class="text"><?php if ($_SESSION['products']) echo $value = array_sum(array_column($_SESSION['products'],'qty'));?>' +
            '</a></li>');
    });

</script>
</div>
</body>
</html>