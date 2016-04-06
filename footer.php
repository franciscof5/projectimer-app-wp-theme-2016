		
		<!--div class="push"></div-->
		<!--/div> <!-- #wrapper #2D2D2D-->

		<?php do_action( 'bp_after_container' ) ?>

		<?php do_action( 'bp_before_footer' ) ?>

		<div id="footer">
			<div id="footer-content">
				<?php if (is_user_logged_in()) { ?><?php } ?>
				
				<div class="links">
					<div class="link-group">
						<h3><?php _e("Pages", "sistema-pomodoros"); ?></h3>
						<ul>
							<li><a href="<?php bloginfo('url'); ?>/focus"><?php _e("Focus", "sistema-pomodoros"); ?></a></li>
							<?php if ( is_user_logged_in() ) { ?> 
								<li><a href="<?php bloginfo('url'); ?>/coworkers/<?php $current_user = wp_get_current_user(); echo $current_user->display_name  ?>"><?php _e("Productivity", "sistema-pomodoros"); ?></a></li>
							<?php } ?>
							<li><a href="<?php bloginfo('url'); ?>/coworkers"><?php _e("Coworkers", "sistema-pomodoros"); ?></a></li>
							<!--li><a href="<?php bloginfo('url'); ?>/mural">Mural</a></li-->
							<li><a href="<?php bloginfo('url'); ?>/ranking"><?php _e("Ranking", "sistema-pomodoros"); ?></a></li>
							<li><a href="<?php bloginfo('url'); ?>/calendar"><?php _e("Calendar", "sistema-pomodoros"); ?></a></li>
						</ul>
						<?php //wp_list_pages("title_li=&include=8,3096,381,4814"); ?>
					</div>
					<!--div class="link-group">
						<h3>Blog</h3>
						<?php  ?>
					</div-->
					<ul class="link-group">
						<h3><?php _e("Recent activity", "sistema-pomodoros"); ?></h3>
						<?php $recent_posts = wp_get_recent_posts("numberposts=5&post_status=publish");
						foreach( $recent_posts as $recent ){
							//echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
							echo '<li><a href="" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a></li>';
							echo get_post_meta($recent["ID"], "post_ip", true);
							echo " cel | tab | pc";
						} ?>
					</ul>
					<!--div class="link-group">
						<h3>Telefones</h3>
						<ul>
							<li>Vendas</li>
							<li>+55 15 33333527.77777267</li>
							<li>Suporte</li>
							<li>+55 15 33333527.77777267</li>
						</ul>
					</div-->
				</div>
				<div id="footer-contact-form">
					<h3><?php _e("Contact us", "sistema-pomodoros"); ?></h3>
					<?php echo do_shortcode( '[contact-form-7 id="60" title="footer"]' ); ?>
				</div>
				<div style="clear:both; width:100%">
					<p style="float:left;"><?php _e("Developed by", "sistema-pomodoros"); ?> <a href="<?php bloginfo('url'); ?>/coworkers/francisco/">Francisco Matelli</a> | F5 Sites | <a href="http://www.f5sites.com">www.f5sites.com</a></p>
					<p style="float:right;"><a href="<?php bloginfo('url'); ?>/projeto/pomodoros-2"><?php _e("Follow pomodoros project", "sistema-pomodoros"); ?></a></p>
				</div>
				<!--div id="footer-info">
				    <p id="assinatura">Desenvolvido por F5 Sites <br /> <a href="http://www.f5sites.com">www.f5sites.com</a></p>
				    <?php /*<p><?php printf( __( '%s is proudly powered by <a href="http://mu.wordpress.org">WordPress MU</a>, <a href="http://buddypress.org">BuddyPress</a>', 'buddypress' ), bloginfo('name') ); ?> and <a href="http://www.avenueb2.com">Avenue B2</a></p>*/ ?>
				</div-->
				<?php do_action( 'bp_footer' ) ?>
			</div>
		</div>

		<?php do_action( 'bp_after_footer' ) ?>

		<?php wp_footer(); ?>

	</body>

</html>