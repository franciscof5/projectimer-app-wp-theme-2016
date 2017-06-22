<?php 
$page = basename($_SERVER["REQUEST_URI"]);

$newactivation = array_key_exists("jmm-join-site", $_GET);

if($page==basename(get_bloginfo("url")) and !$newactivation) {
	if ( is_user_logged_in() )
	wp_redirect(get_bloginfo('url')."/focus");
	else
	wp_redirect(get_bloginfo('url')."/focus");
}

function get_user_subscription($user_id, $domain) {
	$user_id = (!isset($user_id)) ? get_current_user_id() : $user_id;
	$sql = "SELECT * FROM f5sites_posts WHERE post_type='subscription' AND post_author=".$user_id;
	global $wpdb;
	 echo "<pre>"; print_r($wpdb); echo "</pre>";
	
	$results = $wpdb->get_results( $sql, OBJECT );
	var_dump($results);
	die;
				
}
//get_user_subscription(2, $_SERVER['REQUEST_URI']);
get_header(); ?>

<!--div id="loading-message"><p>.</p><p class="dots">..</p></div-->
<div class="container-fluid fill" style="clear:both;">
	<div class="row">
		<?php
		
		$pages = array("focus", "calendar", "ranking", "teams", "me", "members", "tv", "csv");
		//var_dump($page);die;
			

			
			#locate_template( array( 'home-part.php' ), true );
			#locate_template( array( "activity/index.php" ), true );
			#locate_template( array( 'default.php' ), true );
			#die;
		if(in_array($page, $pages)) {
			#var_dump("adasd");die;
			//wp_enqueue_script("soundmanager");
			wp_enqueue_script("projectimer-js");
			locate_template( array( "page-".$page.".php" ), true );
			#wp_enqueue_script("/css/"$page.".css");
			#get_template_part($page);
		} else {
			#var_dump("a222dasd");die;
			locate_template( array( "default.php" ), true );
			#get_template_part("default.php");
		}

		?>
		
	</div>
	<?php get_footer() ?>
</div><!-- #content -->


