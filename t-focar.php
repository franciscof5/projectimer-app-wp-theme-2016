<?php
/* Template Name: Pomo - Focar */
?>
<?php get_header() ?>

<?php 

//get_sidebar(); 
//wp_enqueue_script('jquery'); queued before settings every time
wp_enqueue_script('projectimer-js');
//wp_enqueue_script('soundmanager');
//wp_enqueue_style('clockcss');

//projectimer_check_activity();
?>

<?php //locate_template( array( 's-pomodoros.php' ), true ); ?>
<div id="loading-message"><p>.</p><p class="dots">..</p></div>

<div id="content" class="">
  <?php do_action("projectimer_show_clock_simplist"); ?>
  <?php do_action("projectimer_show_task_form"); ?>
</div><!-- #content -->
	
<?php get_footer() ?>