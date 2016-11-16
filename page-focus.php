
	<!--div id="loading-message"><p>.</p><p class="dots">..</p></div-->

	<div class="col-xs-2" id="default_sidebar">
		<?php the_widget("BP_Core_Members_Widget", "Team's Members"); ?>
	</div>

	<div class="col-xs-5" id="content_column">
		<?php do_action("projectimer_show_clock_simplist"); ?>
		<?php do_action("projectimer_display_task_tabs"); ?>
	</div>

	<div class="col-xs-5" id="activity_sidebar">
		<?php do_action("projectimer_display_recent_activities"); ?>
	</div>