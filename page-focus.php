
	<!--div id="loading-message"><p>.</p><p class="dots">..</p></div-->
	<?php
	/*$members_args = array(
		'user_id'         => 0,
		'type'            => $type,
		'per_page'        => $max_members,
		'max'             => $max_members,
		'populate_extras' => true,
		'search_terms'    => false,
	);
	echo $user_id = bp_displayed_user_id();
	echo $member_type = bp_get_current_member_type();
	var_dump(bp_has_members(  ) );die;*/?>
	<div class="col-xs-2 sidebar_inverted" id="default_sidebar">
		<?php the_widget("BP_Core_Members_Widget", "Team's Members"); ?>
	</div>

	<div class="col-xs-5" id="content_column">
		<?php do_action("projectimer_show_clock_simplist"); ?>
		<?php do_action("projectimer_display_task_tabs"); ?>
	</div>

	<div class="col-xs-5" id="activity_sidebar">
		<?php do_action("projectimer_display_recent_activities"); ?>
	</div>
