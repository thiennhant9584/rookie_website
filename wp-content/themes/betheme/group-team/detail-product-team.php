<?php
/*
 Template Name: Thông tin chi tiết sản phẩm nhóm
 */
 ?>
 <?php 
	$url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');
	$explode = explode("/",$url_path);
	$team_slug = $explode[1];
	$check_product_slug = $explode[2];
	$product_slug = $explode[3];
	global $wpdb;
	$table_team = $wpdb->prefix."team";
	$data_prepare = $wpdb->prepare("SELECT * FROM $table_team WHERE slug = %s",$team_slug);
	$data_team = $wpdb->get_row($data_prepare);
	$table_products = $wpdb->prefix."products";
	$data_prepare_products = $wpdb->prepare("SELECT * FROM $table_products WHERE product_slug = %s",$product_slug);
	$data_products = $wpdb->get_row($data_prepare_products);
	$search = array("\r\n","&lt;br&gt;","\&quot;","\&amp;","\&#039;","\\\\");
	$replace = array("<br>","<br>","&quot;","&amp;","&#039","\\");
	if($data_team != null && $check_product_slug == "san-pham" && $data_products != null)
	{
?>
<?php get_header(); ?>
	<div id="Content" style="background: #e9ebee !important; padding-top: 0 !important">
		<div class="content_wrapper clearfix">
			<div class="sections_group">
				<div class="col-md-12" style="margin-bottom: 20px">
					<div class="col-md-offset-1 col-md-10">
						<div class="col-md-12" style="position: relative; padding: 0">
							<div class="col-md-12" style="background-color:#000; background-image: url('<?php echo $data_team->background; ?>'); background-position: center center; background-repeat: no-repeat; background-size: cover; overflow: hidden; height: 250px; padding: 0px">
							</div>
							<div class="col-md-2 col-xs-4 col-sm-4" style="position: absolute; background-color: #fff; left: 5%; bottom:0; height: 120px; padding:0; width:120px">
								<?php  ?>
									<img src="<?php echo $data_team->logo ?>" style="height: 120px !important; width: 120px !important">
								<?php  ?>
							</div>
							<div class="col-md-8 col-xs-6 col-sm-6" style="position: absolute; right:10%; bottom: 2%; color: #000; text-shadow: 1px 2px 0 #fff, 2px 1px 0 #fff, -1px 2px 0 #fff, -2px 1px 0 #fff, 1px -2px 0 #fff, 2px -1px 0 #fff, -1px -2px 0 #fff, -2px -1px 0 #fff">
								<h3 style="color: #000"><strong><?php echo $data_team->ten_nhom ?></strong></h3>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-12" style="padding: 0">
							<div class="col-md-5" style="margin-top: 15px">
							<div class="col-md-12" style="background: #ffffff; border-radius: 10px; border: 1px solid #F5F5F5;padding: 15px">
								<h4><span class="glyphicon glyphicon-globe" style="padding-right: 15px; color: #0CBDE3"></span><strong>Giới thiệu</strong></h4>
								<div class="col-md-12 row">
									<?php
									$trim_mo_ta = wp_trim_words( $data_team->mo_ta, 50);
									echo str_replace($search, $replace,$data_team->mo_ta);
									?>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="col-md-12" style="background: #ffffff; border-radius: 10px; border: 1px solid #F5F5F5;padding: 15px; margin-top: 15px">
								<h4><span class="glyphicon glyphicon-bullhorn" style="padding-right: 15px; color: #0CBDE3"></span><strong>Slogan</strong></h4>
								<div class="col-md-12 row">
									<?php
									echo str_replace($search, $replace, $data_team->slogan);
									?>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="col-md-12" style="background: #ffffff; border-radius: 10px; border: 1px solid #F5F5F5;padding: 15px; margin-top: 15px">
								<h4><span class="glyphicon glyphicon-pencil" style="padding-right: 15px; color: #0CBDE3"></span><strong>Bài Viết</strong></h4>
								<div class="col-md-12 row" style="margin-top: 15px">
								<?php 
									if(!empty($data_post_group)){ 
                                		foreach($data_post_group as $post_group){
                                ?>
                                <div class="col-md-4">
                                	<img src="<?php echo $post_group->post_group_feature ?>" style="width: 100px !important">
                                </div>
                                <div class="col-md-8">
                                	<a href="<?php echo home_url()."/group-team/".$team_slug."/bai-viet/".$post_group->post_group_slug; ?>"><span style="font-size: 18px"><strong><?php echo $post_group->post_group_title ?></strong></span></a>
                                	<p><?php $wptrim = wp_trim_words($post_group->post_group_content,20,"..."); echo $wptrim; ?></p>
                                	<p class="text-right"><iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php echo home_url()."/group-team/".$team_slug."/bai-viet/".$post_group->post_group_slug; ?>&layout=button_count&size=small&mobile_iframe=true&width=111&height=20&appId" width="111" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe></p>
                                </div>
                                <hr>
                                <div class="clearfix"></div>
                                <?php
                                		}
                                	}
								?>
								</div>
							</div>
							</div>
							<div class="col-md-7 row" style="margin-top: 15px">
								<div class="col-md-12 row" style="background: #ffffff; border-radius: 10px; border: 1px solid #F5F5F5;padding: 15px; margin-left: 10px;">
									<h2><strong>Sản Phẩm : <?php echo $data_products->product_name; ?></strong></h2>
									<div class="col-md-12 row">
										<iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php echo home_url()."/group-team/".$team_slug."/bai-viet/".$data_detail_post_group->post_group_slug; ?>&layout=button_count&size=small&mobile_iframe=true&width=111&height=20&appId" width="111" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
									</div>
									<div class="col-md-12 row">
										<?php echo str_replace($search, $replace,$data_detail_post_group->post_group_content); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
<style>
	#Subheader{ display: none; }
	.gallery li{ float: left; margin-left: 15px }
	.quantity { display: inline-block !important; width: 60px !important; font-size: inherit !important;}
</style>
<?php  get_footer(); ?>
<?php 
	} 
	else
	{
		global $wp_query;
		$wp_query->set_404();
		status_header( 404 );
		get_template_part( 404 );
	}
?>