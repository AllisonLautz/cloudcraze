<?php
/**
 * @package WordPress
 * @subpackage CloudCraze
 */
update_option('current_page_template','search');
?>

<?php include ("includes/page.header.php") ?>






<?php
$search_refer = $_GET["site_section"];
if ($search_refer == 'post-search') { 
	load_template(get_template_directory() . '/post-search.php'); 
	
}
else { 
	load_template(get_template_directory() . '/site-search.php'); 
}; 
?>




<?php include ("includes/page.footer.php") ?>
