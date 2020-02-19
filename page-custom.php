<?php
/**
 * @package WordPress
 * @subpackage CloudCraze
 * Template Name:Template Custom
 */
update_option('current_page_template','page-custom');
?>

<?php include ("includes/page.header.php") ?>

<?php
$template = get_template_directory().'/templates/'.$meta['tmp_custom_options_type'][0];
if(is_file($template)) include ($template);
?>
<?php
if($meta['tmp_custom_options_html'][0]) echo htmlspecialchars_decode($meta['tmp_custom_options_html'][0]);
?>


<?php include ("includes/page.footer.php") ?>