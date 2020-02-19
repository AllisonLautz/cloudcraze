<?php

// ------------------------------------------------------
// Global Theme Functions
// ------------------------------------------------------

function settingFields($data,$option){
	foreach ($data as $setting) {
		$setting['option'] = $option;
		add_settings_field($setting[0],$setting[1],$setting[2],$setting[3],$setting[4]);
	}
}

function settingsCheck($args) {
	$id = $args[0];
	if(get_option($args['option'])[$id] == 'true') $checked ='checked="checked"';
	$result = '<input type="checkbox" name="'.$args['option'].'['.$id.']" value="true" '.$checked.'/>';
	if($args[5]) $result .= "<div class='hint check'>".$args[5]."</span>";
	echo $result;
}

// function settingsWysiwyg($args) {
// 	$id = $args[0];
// 	$value = get_option($args['option']);
// 	$value = $value[$id];
// 	$content = get_post_meta( $post->ID, $field['id'], true );
// 	$result = wp_editor( $content, $field['id'], $field['settings']);
// 	if($args[5]) $result .= "<div class='hint'>".$args[5]."</span>";
// 	echo $result;
// }

function settingsText($args) {
	$id = $args[0];
	$value = get_option($args['option']);
	$value = $value[$id];
	$result = "<input type='text' name='".$args['option']."[".$id."]' value='".$value."' size='50'/>";
	if($args[5]) $result .= "<div class='hint'>".$args[5]."</span>";
	echo $result;
}
function settingsSVG($args) {
	$id = $args[0];
	$value = get_option($args['option']);
	$value = $value[$id];
	$result = "<input type='text' name='".$args['option']."[".$id."]' value='".$value."' size='50'/>";
	if(!empty($value)) $result .='<div class="imagepreview">'.svg($value,1,0,0).'</div>';
	if($args[5]) $result .= "<div class='hint'>".$args[5]."</span>";
	echo $result;
}

function settingsArea($args) {
	$id = $args[0];
	$value = get_option($args['option']);
	$value = $value[$id];
	$result = "<textarea name='".$args['option']."[".$id."]' rows='5' cols='49'>".$value."</textarea>";
	if($args[5]) $result .= "<div class='hint'>".$args[5]."</span>";
	echo $result;
}

function settingsImage($args){
	$id = $args[0];
	$value = get_option($args['option']);
	$value = $value[$id];
	$result = '<input type="text" class="imageinput" id="'.$id.'" name="'.$args['option'].'['.$id.']" value="'.$value.'" size="50"/><input type="button" id="'.$id.'-button" class="button imagebutton" value="Select Image" /><div class="imagepreview"><img src="'.$value.'" alt="'.$value.'" ></div>';
	if($args[5]) $result .= "<div class='hint'>".$args[5]."</span>";
	echo $result;
}

function validate_setting($plugin_options) {return $plugin_options;}
