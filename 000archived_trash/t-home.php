<?php
/*Template Name: Pomo - Home*/

/*Language files are loaded on header*/
?>

<?php 
/*if (is_user_logged_in()) {
	wp_redirect( home_url()."/focus" ); exit;
}*/
 ?>

<?php get_header() ?>

<?php 
//It was used for an old incorrect way to develop
/*if ( current_user_can( 'manage_options' ) ) { ?>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/pomodoro/pomodoro-functions-admin.js" type="text/javascript"></script>
<?php } else { ?>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/pomodoro/pomodoro-functions.js" type="text/javascript"></script>
<?php } */?>



		<!--Template-->
		<?php /*get_sidebar(); ?>
	
		<?php //locate_template( array( 's-pomodoros.php' ), true ); ?>
		<div class="content_pomodoro">
			<?php locate_template( array( 'pomodoro/pomodoros-painel.php' ), true ); ?>
		</div><!-- #content -->
	<? } else { */?>
	<?php 
	/*
	ESSE EH RESPOSIVO
	if (function_exists('layerslider')) {
		layerslider(1);
	}*/ 
	/*
	NIVO NAO RESPONSIVO
	if (function_exists('nivoslider4wp_show')) { nivoslider4wp_show(); } 
	*/
	?>
	<?php

/*$post_types = get_post_types( 'blog_post' ); 
var_dump($post_types);die;
foreach ( $post_types as $post_type ) {

   echo '<p>' . $post_type . '</p>';
}
*/
//query_posts( 'post_type=blog_post');

?>


	<hr />
		<div id="content_inicio">
			<div class="circulo" id="">
				<h3><?php echo bloginfo('title');?></h3>
				<img />
				<p><?php echo bloginfo('description');?></p>
			</div>
			<div class="circulo" id="">
				<h3>2 Colegas</h3>
				<img />
				<p>ver colegas...</p>
			</div>
			<div class="circulo" id="">
				<h3>20 Projetos</h3>
				<img />
				<p>Pomodoros...</p>
			</div>
			<div class="circulo" id="">
				<h3>Ultimas do blog</h3>
				<?php
				//$type = 'blog_post';
				$args=array(
				  //'post_type' => $type,
				  'post_status' => 'publish',
				  'posts_per_page' => 3,
				  'caller_get_posts'=> 1
				);

				//$my_query = null;
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) {
					while ($my_query->have_posts()) : $my_query->the_post(); ?>
						<p><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
						<?php the_title(); ?>
						<?php the_post_thumbnail(array(50,50)); ?></a></p>
						<?php
					endwhile;
				}
				wp_reset_query();  // Restore global post data stomped by the_post().
				?>
			</div>
			<div class="circulo" id="">
				<h3>258 horas de projetos</h3>
				<p>12 focalizador</p>
			</div>
			<div class="circulo" id="">
				<h3>Ranking</h3>
				
			</div>
			<div class="circulo" id="">
				<h3>Premio</h3>
				
			</div>
			<div class="circulo" id="">
				<h3>Produtividade</h3>
				<p>Tecnologia nacional, desenvolvida por empresa brasileira.</p>
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/brasil.jpg" height="40px" alt="Bandeira do Brasil" />
			</div>
			<!--div class="clear"></div->
			<div class="push"></div-->
			<?php
				/*
				$my_id = 3096;
				
				$post_id = get_post($my_id); 
				$title = $post_id->post_title;
				$content = $post_id->post_content;
				_e("<h1>".$title."</h1>");
				_e($content);
				echo '<h2>Teste</h2>';
				*/
			?> 
			<?php  ?>
		</div><!-- #content -->
	<? //} ?>
	<?php /*locate_template( array( 'sidebar.php' ), true ) */?>
	
	
	<?php /*locate_template( array( 'sidebar.php' ), true ) */?>
<?php get_footer() ?>
