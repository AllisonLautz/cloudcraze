<?php


function defaultFields($values){

	$formHTML = '';
	if(isset($values['first_name'])){ $value = $values['first_name']; $c ='active';}else{$value = ''; $c='';}
	$formHTML .= '<div class="fieldwrap '.$c.' text first_name"><label for="first_name">First Name*</label><input type="text" name="first_name" id="first_name" value="'.$value.'" class="text" maxlength="40" /><div class="fielderror" id="error_for_first_name"></div></div>';
	if(isset($values['last_name'])){ $value = $values['last_name']; $c ='active';}else{$value = ''; $c='';}
	$formHTML .= '<div class="fieldwrap '.$c.' text last_name"><label for="last_name">Last Name*</label><input type="text" name="last_name" id="last_name" value="'.$value.'" class="text" maxlength="80" /><div class="fielderror" id="error_for_last_name"></div></div>';
	if(isset($values['email'])){ $value = $values['email']; $c ='active';}else{$value = ''; $c='';}
	$formHTML .= '<div class="fieldwrap '.$c.' text email"><label for="email">Email*</label><input type="text" name="email" id="email" value="'.$value.'" class="text" maxlength="255" /><div class="fielderror" id="error_for_email"></div></div>';
	if(isset($values['company'])){ $value = $values['company']; $c ='active';}else{$value = ''; $c='';}
	$formHTML .= '<div class="fieldwrap '.$c.' text company"><label for="company">Company*</label><input type="text" name="company" id="company" value="'.$value.'" class="text" maxlength="255" /><div class="fielderror" id="error_for_company"></div></div>';
	if(isset($values['phone'])){ $value = $values['phone']; $c ='active';}else{$value = ''; $c='';}
	$formHTML .= '<div class="fieldwrap '.$c.' text phone"><label for="phone">Phone</label><input type="text" name="phone" id="phone" value="'.$value.'" class="text" maxlength="40"/><div class="fielderror" id="error_for_phone"></div></div>';
	if(isset($values['title'])){ $value = $values['title']; $c ='active';}else{$value = ''; $c='';}
	$formHTML .= '<div class="fieldwrap '.$c.' text job_title"><label for="title">Title</label><input type="text" name="title" id="title" value="'.$value.'" class="text" maxlength="128" /><div class="fielderror" id="error_for_title"></div></div>';
	if(isset($values['description'])){ $value = $values['description']; $c ='active';}else{$value = ''; $c='';}
	$formHTML .= '<div class="fieldwrap '.$c.' textarea comments"><label for="description">Comments</label><textarea name="description" id="description"  maxlength="65535" >'.$value.'</textarea><div class="fielderror" id="error_for_description"></div></div>';

	return $formHTML;
}

function demoFields($values){

	$formHTML = '';
	if(isset($values['first_name'])){ $value = $values['first_name']; $c ='active';}else{$value = ''; $c='';}
	$formHTML .= '<div class="fieldwrap '.$c.' text first_name"><label for="first_name">First Name*</label><input type="text" name="first_name" id="first_name" value="'.$value.'" class="text" maxlength="40" /><div class="fielderror" id="error_for_first_name"></div></div>';
	if(isset($values['last_name'])){ $value = $values['last_name']; $c ='active';}else{$value = ''; $c='';}
	$formHTML .= '<div class="fieldwrap '.$c.' text last_name"><label for="last_name">Last Name*</label><input type="text" name="last_name" id="last_name" value="'.$value.'" class="text" maxlength="80" /><div class="fielderror" id="error_for_last_name"></div></div>';
	if(isset($values['email'])){ $value = $values['email']; $c ='active';}else{$value = ''; $c='';}
	$formHTML .= '<div class="fieldwrap '.$c.' text email"><label for="email">Email*</label><input type="text" name="email" id="email" value="'.$value.'" class="text" maxlength="255" /><div class="fielderror" id="error_for_email"></div></div>';
	if(isset($values['company'])){ $value = $values['company']; $c ='active';}else{$value = ''; $c='';}
	$formHTML .= '<div class="fieldwrap '.$c.' text company"><label for="company">Company*</label><input type="text" name="company" id="company" value="'.$value.'" class="text" maxlength="255" /><div class="fielderror" id="error_for_company"></div></div>';
	if(isset($values['phone'])){ $value = $values['phone']; $c ='active';}else{$value = ''; $c='';}
	$formHTML .= '<div class="fieldwrap '.$c.' text phone"><label for="phone">Phone</label><input type="text" name="phone" id="phone" value="'.$value.'" class="text" maxlength="40"/><div class="fielderror" id="error_for_phone"></div></div>';
	if(isset($values['title'])){ $value = $values['title']; $c ='active';}else{$value = ''; $c='';}
	$formHTML .= '<div class="fieldwrap '.$c.' text job_title"><label for="title">Title</label><input type="text" name="title" id="title" value="'.$value.'" class="text" maxlength="128" /><div class="fielderror" id="error_for_title"></div></div>';
	if(isset($values['description'])){ $value = $values['description']; $c ='active';}else{$value = ''; $c='';}
	$formHTML .= '<div class="fieldwrap '.$c.' textarea comments"><label for="description">Comments</label><textarea name="description" id="description"  maxlength="65535" >'.$value.'</textarea><div class="fielderror" id="error_for_description"></div></div>';

	return $formHTML;
}
function contactFields($values){

	$formHTML = '';
	if(isset($values['first_name'])){ $value = $values['first_name']; $c ='active';}else{$value = ''; $c='';}
	$formHTML .= '<div class="fieldwrap '.$c.' text first_name"><label for="first_name">First Name*</label><input type="text" name="first_name" id="first_name" value="'.$value.'" class="text" maxlength="40" /><div class="fielderror" id="error_for_first_name"></div></div>';
	if(isset($values['last_name'])){ $value = $values['last_name']; $c ='active';}else{$value = ''; $c='';}
	$formHTML .= '<div class="fieldwrap '.$c.' text last_name"><label for="last_name">Last Name*</label><input type="text" name="last_name" id="last_name" value="'.$value.'" class="text" maxlength="80" /><div class="fielderror" id="error_for_last_name"></div></div>';
	if(isset($values['email'])){ $value = $values['email']; $c ='active';}else{$value = ''; $c='';}
	$formHTML .= '<div class="fieldwrap '.$c.' text email"><label for="email">Email*</label><input type="text" name="email" id="email" value="'.$value.'" class="text" maxlength="255" /><div class="fielderror" id="error_for_email"></div></div>';
	if(isset($values['company'])){ $value = $values['company']; $c ='active';}else{$value = ''; $c='';}
	$formHTML .= '<div class="fieldwrap '.$c.' text company"><label for="company">Company*</label><input type="text" name="company" id="company" value="'.$value.'" class="text" maxlength="255" /><div class="fielderror" id="error_for_company"></div></div>';
	if(isset($values['phone'])){ $value = $values['phone']; $c ='active';}else{$value = ''; $c='';}
	$formHTML .= '<div class="fieldwrap '.$c.' text phone"><label for="phone">Phone</label><input type="text" name="phone" id="phone" value="'.$value.'" class="text" maxlength="40"/><div class="fielderror" id="error_for_phone"></div></div>';
	if(isset($values['description'])){ $value = $values['description']; $c ='active';}else{$value = ''; $c='';}
	$formHTML .= '<div class="fieldwrap '.$c.' textarea comments"><label for="description">Comments</label><textarea name="description" id="description"  maxlength="65535" >'.$value.'</textarea><div class="fielderror" id="error_for_description"></div></div>';

	return $formHTML;
}
function resourceFields($values){

	$formHTML = '';
	if(isset($values['first_name'])){ $value = $values['first_name']; $c ='active';}else{$value = ''; $c='';}
	$formHTML .= '<div class="fieldwrap '.$c.' text first_name"><label for="first_name">First Name*</label><input type="text" name="first_name" id="first_name" value="'.$value.'" class="text" maxlength="40" /><div class="fielderror" id="error_for_first_name"></div></div>';
	if(isset($values['last_name'])){ $value = $values['last_name']; $c ='active';}else{$value = ''; $c='';}
	$formHTML .= '<div class="fieldwrap '.$c.' text last_name"><label for="last_name">Last Name*</label><input type="text" name="last_name" id="last_name" value="'.$value.'" class="text" maxlength="80" /><div class="fielderror" id="error_for_last_name"></div></div>';
	if(isset($values['email'])){ $value = $values['email']; $c ='active';}else{$value = ''; $c='';}
	$formHTML .= '<div class="fieldwrap '.$c.' text email"><label for="email">Email*</label><input type="text" name="email" id="email" value="'.$value.'" class="text" maxlength="255" /><div class="fielderror" id="error_for_email"></div></div>';
	if(isset($values['company'])){ $value = $values['company']; $c ='active';}else{$value = ''; $c='';}
	$formHTML .= '<div class="fieldwrap '.$c.' text company"><label for="company">Company*</label><input type="text" name="company" id="company" value="'.$value.'" class="text" maxlength="255" /><div class="fielderror" id="error_for_company"></div></div>';
	if(isset($values['phone'])){ $value = $values['phone']; $c ='active';}else{$value = ''; $c='';}
	$formHTML .= '<div class="fieldwrap '.$c.' text phone"><label for="phone">Phone</label><input type="text" name="phone" id="phone" value="'.$value.'" class="text" maxlength="40"/><div class="fielderror" id="error_for_phone"></div></div>';

	return $formHTML;
}

// form functions

function getFormList(){
	return array(
		'none'=> ' -- Select Form -- ',
		'generic'=>"Default Form",
		'contact' => "Contact Us Form",
		'resource' => "Resource Download Form"
	);
}

function getForm($form,$args){
	$value = array();
	if($_GET) $values = $_GET;
	// var_dump($_GET);
	$function = $form.'Fields';
	if(!function_exists($function)) $function = 'defaultFields';

	if(!$args['lead_source']) $args['lead_source'] = "$_SERVER[REQUEST_URI]";
	$redirect = get_permalink($args['redirect']);

	/* custom submit text */ if(!$args['submit']) $args['submit'] = "Submit Request";

	$forms = '';
	$forms .= '<script type="text/javascript" src="http://form-cdn.pardot.com/js/piUtils.js?ver=20130530"></script>';
	$forms .= "<script type='text/javascript'>piAId = '67552';piCId = '1402';if(!window['pi']) { window['pi'] = {}; } pi = window['pi']; if(!pi['tracker']) { pi['tracker'] = {}; } pi.tracker.pi_form = true;(function() {function async_load(){var s = document.createElement('script'); s.type = 'text/javascript';s.src = ('https:' == document.location.protocol ? 'https://pi' : 'http://cdn') + '.pardot.com/pd.js';var c = document.getElementsByTagName('script')[0]; c.parentNode.insertBefore(s, c);}if(window.attachEvent) { window.attachEvent('onload', async_load); }else { window.addEventListener('load', async_load, false); }})();</script>";
	$forms .= '<form accept-charset="UTF-8" method="post" action="http://go.pardot.com/l/66552/2015-01-06/25p" class="form webform" id="pardot-form">';

	$forms .= '<div class="message">';
	if(isset($_GET['errorMessage'])) $forms .= '<p class="errors">'.$_GET['errorMessage'].'</p>';
	$forms .= '</div>';

	$forms .= '<input name="oid" type="hidden" value="00Di0000000HSoO" />';
	$forms .= '<input name="retURL" type="hidden" value="'.$redirect.'?rid='.get_the_ID().'" />';
	$forms .= '<input name="00N40000002Aaa1" type="hidden" value="CloudCraze" />';
	$forms .= '<input name="lead_source" type="hidden" value="'.$args['lead_source'].'" />';
	$forms .= $function($values);
	$forms .= '<div class="fieldwrap '.$c.' submit "><div class="subwrap"><input type="submit" accesskey="s" value="'.$args['submit'].'" /></div></div>';
	$forms .= '</form>';

	return $forms;
}