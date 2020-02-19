<?php

// ------------------------------------------------------
// Global Theme Options
// ------------------------------------------------------


add_action( 'admin_menu', 'scripts_menu' );
function scripts_menu() {
	add_options_page( 'Tracking &amp; Scripts', 'Tracking &amp; Scripts', 'manage_options', 'script_options', 'script_options_page' );
}

add_action( 'admin_init', 'script_init' );
function script_init() {
	register_setting( 'script_options', 'script_settings', 'validate_setting');
	add_settings_section( 'tracking_options', 'Google Anayltics', 'tracking_options_callback', 'script_options' );
    // add_settings_section( 'event_options', 'Event Tracking', 'events_options_callback', 'script_options' );
	add_settings_section( 'scripts_options', 'Other Scripts', 'scripts_options_callback', 'script_options' );
}

function tracking_options_callback() {
	echo '<p>configuration for google anayltics codes and other third party tracking & scripts</p>';
	$tracking_options = array(
		array( 'googleanayltics', 'Google Anayltics Id', 'settingsText', 'script_options', 'tracking_options' ),
		array( 'remarkting', 'Remarkting Tag', 'settingsCheck', 'script_options', 'tracking_options', 'includes the remarkting code in the google analytics function'),
		array( 'rmrkscrpt', 'Remarkting Id', 'settingsText', 'script_options', 'tracking_options', 'adds remarkting code to footer of every page'),
	);

	settingFields($tracking_options,'script_settings');
}

function events_options_callback() {
	echo '<p>Enable and configure Google Analytics Event Tracking</p>';
	$event_options = array(
		array( 'downloads', 'Track Downloads', 'settingsCheck', 'script_options', 'event_options', 'add google anlytic events for tracking all pdf files' ),
		array( 'externals', 'Track External Links', 'settingsCheck', 'script_options', 'event_options', 'add google anlytic events for external links'),
		array( 'ctas', 'Track CTA Events', 'settingsCheck', 'script_options', 'event_options', 'add google anlytic events to track cta clicks' ),
	);

	settingFields($event_options,'script_settings');
}

function scripts_options_callback() {
	echo '<p>Fields to insert custom scripts such as third party trackers or advanced scripts</p>';
	$script_options = array(
		array( 'headerscripts', 'Additional Scripts - Head', 'settingsArea', 'script_options', 'scripts_options', 'Inserts scripts in the head of the html document'),
		array( 'footerscripts', 'Additional Scripts - Body', 'settingsArea', 'script_options', 'scripts_options', 'Inserts scripts in the body of the html document'),
	);

	settingFields($script_options,'script_settings');
}


function script_options_page() {
	?>
	<div class="wrap">
		<h2>Tacking &amp; Scripts Options</h2>
		<form action="options.php" method="POST">
			<?php settings_fields( 'script_options' ); ?>
			<?php do_settings_sections( 'script_options' ); ?>
			<input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />


			<script>
				jQuery(document).ready(function($) {
					$('.imagebutton').click(function() {
						$(this).parent('td').addClass("active");
						tb_show("Upload a logo", "media-upload.php?referer=wptuts-settings&type=image&TB_iframe=true&post_id=0", false);
						return false;
					});

					window.send_to_editor = function(html) {
						$(".active .imagepreview").html(html);
						var img = $(".active .imagepreview img").attr("src");
						$(".active input.imageinput").val(img);
						$('td.active').removeClass(".active");
						tb_remove();
					}
				});
			</script>
		</form>
	</div>
	<?php
}