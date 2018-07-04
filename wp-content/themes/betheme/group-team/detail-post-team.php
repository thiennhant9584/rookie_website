<?php
/*
 Template Name: Trang chi tiết bài viết nhóm
 */
 ?>
 <?php 
	$url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');
	$explode = explode("/",$url_path);
	$team_slug = $explode[1];
	$check_post_slug = $explode[2];
	$post_slug = $explode[3];
	global $wpdb;
	$table_team = $wpdb->prefix."team";
	$data_prepare = $wpdb->prepare("SELECT * FROM $table_team WHERE slug = %s",$team_slug);
	$data_team = $wpdb->get_row($data_prepare);
	$table_post_group = $wpdb->prefix."post_group";
	$data_prepare_detail_post_group = $wpdb->prepare("SELECT * FROM $table_post_group WHERE post_group_slug = %s",$post_slug);
	$data_detail_post_group = $wpdb->get_row($data_prepare_detail_post_group);
	$search = array('\r\n','&lt;br&gt;','\&quot;','\&amp;','\&#039;','\"');
	$replace = array('<br>','<br>','&quot;','&amp;','&#039','"');
	$table_post_group = $wpdb->prefix."post_group";
    $table_team_post = $wpdb->prefix."team_post";
    $query_prepare_post_group = $wpdb->prepare("SELECT * FROM $table_post_group INNER JOIN $table_team_post ON $table_post_group.id = $table_team_post.id_post WHERE id_team = %d ORDER BY $table_team_post.id DESC LIMIT 3",$data_team->id);
    $data_post_group = $wpdb->get_results($query_prepare_post_group);
	if($data_team != null && $check_post_slug == "bai-viet" && $data_post_group != null)
	{
?>
<?php get_header(); ?>
	<div id="Content" style="background: #e9ebee !important; padding-top: 0 !important">
		<div class="content_wrapper clearfix">
			<div class="sections_group">
				<div class="col-md-12" style="margin-bottom: 20px">
					<div class="col-md-offset-2 col-md-8">
						<div class="col-md-12" style="position: relative; padding: 0">
							<div class="col-md-12" style="background-color:#000; background-image: url('<?php echo $data_team->background; ?>'); background-position: center center; background-repeat: no-repeat; background-size: cover; overflow: hidden; height: 250px; padding: 0px">
							</div>
							<div class="col-md-2 col-xs-4 col-sm-4" style="position: absolute; background-color: #fff; left: 5%; bottom:0; height: 120px; padding:0; width:120px">
								<?php  ?>
									<img src="<?php echo $data_team->logo ?>" style="height: 120px !important; width: 120px !important">
								<?php  ?>
							</div>
							<div class="col-md-8 col-xs-6 col-sm-6" style="position: absolute; right:5%; bottom: 2%; color: #000; text-shadow: 1px 2px 0 #fff, 2px 1px 0 #fff, -1px 2px 0 #fff, -2px 1px 0 #fff, 1px -2px 0 #fff, 2px -1px 0 #fff, -1px -2px 0 #fff, -2px -1px 0 #fff">
								<h3 style="color: #000"><strong><?php echo $data_team->ten_nhom ?></strong></h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 row" style="margin-top: 15px; margin-bottom: 20px">
					<div class="col-md-offset-2 col-md-8">
						<div class="col-md-4" style="background: #ffffff; border-radius: 10px; border: 1px solid #F5F5F5;padding: 15px">
							<h4><span class="glyphicon glyphicon-globe" style="padding-right: 15px; color: #0CBDE3"></span><strong>Giới thiệu</strong></h4>
							<div class="col-md-12 row">
								<?php
								echo str_replace($search, $replace,$data_team->mo_ta);
								?>
							</div>
						</div>
						<div class="col-md-8 row" style="background: #ffffff; border-radius: 10px; border: 1px solid #F5F5F5;padding: 15px; margin-left: 10px;">
							<h2><strong><?php echo $data_detail_post_group->post_group_title; ?></strong></h2>
							<div class="col-md-12 row">
								<iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php echo home_url()."/group-team/".$team_slug."/bai-viet/".$data_detail_post_group->post_group_slug; ?>&layout=button_count&size=small&mobile_iframe=true&width=111&height=20&appId" width="111" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
							</div>
							<div class="col-md-12 row">
								<?php echo str_replace($search, $replace,$data_detail_post_group->post_group_content); ?>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-4" style="background: #ffffff; border-radius: 10px; border: 1px solid #F5F5F5;padding: 15px; margin-top: 15px">
							<h4><span class="glyphicon glyphicon-bullhorn" style="padding-right: 15px; color: #0CBDE3"></span><strong>Slogan</strong></h4>
							<div class="col-md-12 row">
								<?php
								echo str_replace($search, $replace, $data_team->slogan);
								?>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-4" style="background: #ffffff; border-radius: 10px; border: 1px solid #F5F5F5;padding: 15px; margin-top: 15px">
							<h4><span class="glyphicon glyphicon-pencil" style="padding-right: 15px; color: #0CBDE3"></span><strong>Bài Viết</strong></h4>
							<div class="col-md-12 row" style="margin-top: 15px">
								<?php 
									if(!empty($data_post_group)){ 
                                		foreach($data_post_group as $post_group){
                                ?>
                                <div class="col-md-5">
                                	<img src="<?php echo $post_group->post_group_feature ?>" style="width: 100px !important">
                                </div>
                                <div class="col-md-7">
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