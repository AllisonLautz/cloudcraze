<?php

// ------------------------------------------------------
// Global Theme Options
// ------------------------------------------------------

add_action( 'admin_menu', 'theme_menu' );
function theme_menu() {
    add_options_page( 'Theme Options', 'Theme Options', 'manage_options', 'theme_options', 'theme_options_page' );
}

add_action( 'admin_init', 'theme_init' );
function theme_init() {
    register_setting( 'theme_options', 'theme_settings', 'validate_setting');
   // add_settings_section( 'contact_options', 'Contact Options', 'contact_options_callback', 'theme_options' );
    add_settings_section( 'logo_options', 'Logo Options', 'logo_options_callback', 'theme_options' );
    add_settings_section( 'social_options', 'Social Integration', 'social_options_callback', 'theme_options' );
    add_settings_section( 'footer_options', 'Footer Options', 'footer_options_callback', 'theme_options' );
}

function logo_options_callback() {
	echo '<p>Setting below control the theme header content.</p>';
	// echo '<style></style>';
	$logo_options = array(
		array( 'main', 'Main Logo Url', 'settingsImage', 'theme_options', 'logo_options' ),
		array( 'main_svg', 'Main Logo SVG Id', 'settingsSVG', 'theme_options', 'logo_options' ),
		array( 'main_alt', 'Main Logo Alt Text', 'settingsText', 'theme_options', 'logo_options' ),
		array( 'alt', 'Altenative Logo Url', 'settingsImage', 'theme_options', 'logo_options' ),
		array( 'alt_svg', 'Altenative Logo SVG Id', 'settingsSVG', 'theme_options', 'logo_options' ),
		array( 'alt_alt', 'Altenative Logo Alt Text', 'settingsText', 'theme_options', 'logo_options' ),
		array( 'enable_svg', 'Enable SVGs', 'settingsCheck', 'theme_options', 'logo_options', 'use SVGs by defualt'),
	);

    settingFields($logo_options,'theme_settings');
}
function footer_options_callback() {
	echo '<p>add footer copyright text below. use shortcode [[year]] to indicate year position</p>';
	$footer__options = array(
		array( 'copyright', 'Copyright Text', 'settingsText', 'theme_options', 'footer_options' ),
	);

    settingFields($footer__options,'theme_settings');
}

function social_options_callback() {
    echo '<p>Add you comapny url to the field below to enable the icons in social widgets</p>';
    $socialOpts = themeSettings('socialOpts');
    $svgIcons = "";
    $svgIconsAlt = "";
    foreach ($socialOpts as $svg) {
    	$svgIcons .= svg('#'.$svg,1,0,0);
    	$svgIconsAlt .= svg('#'.$svg."_alt",1,0,0);
    }
    // echo '<style></style>';
    echo '<p><b>Primary SVG Icons:</b> </p><div class="socialicons">'.$svgIcons.'</div>';
    echo '<p><b>Altenative SVG Icons:</b> </p><div class="socialicons">'.$svgIconsAlt.'</div>';
    $social_options = array();
    foreach ($socialOpts as $social) {
    	$social_options[] = array(cleanString($social),$social,'settingsText','theme_options','social_options');
    }
    // print_r($social_options);
    settingFields($social_options,'theme_settings');
}

function load_admin_things() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');
}

add_action( 'admin_enqueue_scripts', 'load_admin_things' );

function theme_options_page() {
    ?>
    <div class="wrap">
        <h2>Theme Options</h2>
        <form action="options.php" method="POST">
            <?php settings_fields( 'theme_options' ); ?>
            <?php do_settings_sections( 'theme_options' ); ?>
             <input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />


			<script>
				jQuery(document).ready(function($) {
					$('.imagebutton').click(function() {
						$(this).parent('td').addClass("active");
						tb_show("Upload a logo", "media-upload.php?referer=theme_options&type=image&TB_iframe=true&post_id=0", false);
						return false;
					});

					window.send_to_editor = function(html) {
						$(".active .imagepreview").html(html);
						var img = $(".active .imagepreview img").attr("src");
						$(".active input.imageinput").val(img);
						$('td.active').removeClass("active");
						tb_remove();
					}
				});
			</script>
        </form>
    </div>
    <?php
}