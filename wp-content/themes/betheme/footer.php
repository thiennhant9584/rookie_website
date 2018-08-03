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
<section class="vc_section tai-tro wpb_animate_when_almost_visible wpb_fadeInDown fadeInDown wpb_start_animation animated">
    <div class="vc_row wpb_row vc_row-fluid">
        <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner ">
                <div class="wpb_wrapper">
                    <div class="wpb_text_column wpb_content_element" style="margin-bottom: 15px !important">
                        <div class="wpb_wrapper" style="padding-top: 15px">
                            <?php echo do_shortcode('[shortcode_logo_partner]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .image-tai-tro{
        width: 50% !important;
    }
    .slick-arrow { display: none !important; }
    @media only screen and (max-width: 390px){
    	.img-logo { width: 140px !important; height: 120px !important; }
    }
</style>
<script>
jQuery(document).ready(function($) {
	function createSlick(){
		jQuery(".autoplay").not('.slick-initialized').slick({
			autoplay: true,
			arrows: true,
			slidesToShow: 7,
			slidesToScroll: 1,
			responsive: [
			{
				breakpoint: 1500,
				settings: {
				slidesToShow: 6,
				slidesToScroll: 1
				}
			},
			{
				breakpoint: 1200,
				settings: {
				slidesToShow: 5,
				slidesToScroll: 1
				}
			},
			{
				breakpoint: 992,
				settings: {
				slidesToShow: 3,
				slidesToScroll: 1
				}
			},
			{
				breakpoint: 481,
				settings: {
				slidesToShow: 2,
				slidesToScroll: 1
				}
			}
			]
		});
	}
	createSlick();
	$(window).on( 'resize', createSlick);
});
</script>
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
<script src="<?php bloginfo('template_directory') ?>/js/bootstrap-notify.js"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=1954704611475793";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div id="cfacebook">
    <a href="javascript:void(0);" class="chat_fb hidden-xs"><i class="fa fa-facebook-square"></i> Hỗ trợ trực tuyến</a>
    <div class="fchat">
        <div class="fb-page" data-href="https://www.facebook.com/rookie.marketing2018/" data-height="300" data-width="250" data-tabs="messages" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">Rookie Marketing</div>
    </div>
</div>
<script>
    jQuery(".chat_fb").click(function() {
        jQuery('.fchat').toggle('slow');
    });
    jQuery(function($){
        $("#menu-main-menu").append('<li id="menu-item-101" class="menu-item menu-item-type-post_type menu-item-object-post last menu-register"><a href="/dang-ky-thanh-vien/"><span>ĐĂNG KÝ</span></a></li>');
        $("#menu-main-menu").append('<li id="menu-item-103" class="menu-item menu-item-type-post_type menu-item-object-post last menu-login"><a href="/dang-nhap/"><span>ĐĂNG NHẬP</span></a></li>');
        $("#menu-main-menu").append('<li id="menu-item-103" class="menu-item menu-item-type-post_type menu-item-object-post last"><a href="/gio-hang/"><span style="font-size:30px" class="glyphicon glyphicon-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge">'+ <?php if(isset($_SESSION['products'])) echo $value = array_sum(array_column($_SESSION['products'],'qty')); else echo '0'  ?>+'</span></span></a></li>');
    });
<?php if(isset($_SESSION["branch_id"])){
        $table_team = $wpdb->prefix."team";
        $data_prepare = $wpdb->prepare("SELECT * FROM $table_team WHERE id = %d",$_SESSION["branch_id"]);
        $data_team = $wpdb->get_row($data_prepare);
	?>
	 jQuery(function($){
		$("#login-account").css({"display":"none"});
		$("#register").css({"display":"none"});
	});
    jQuery(function($){
        $(".social").append('<a class="register" id="register" href="/manage-group/<?php echo $data_team->slug ?>"><i class="fa fa-user"></i>&nbsp; Mypage</a>');
    });
	<?php
} ?>
</script>
</div>
</body>
</html>