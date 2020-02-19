<?php
/**
 * @package WordPress
 * @subpackage CloudCraze
 */

update_option('current_page_template','404');
include ("includes/page.header.php");
?>

<!-- Begin Template: 404.php  -->

<div class="section graylt page-404">
	<div class="wrapper small row">


		<div class="content flex-2">
			<h1>The requested page could not be found</h1>
			<p>Please return to the <a href="<?php echo get_option('home'); ?>">home page</a> or use the search tool to look for the missing page.</p>

			<h3>Popular Pages</h3>
			<?php wp_nav_menu( array( 'theme_location' => "fourhunderedfour" ) ); ?>

		</div> 
		<div class="sidebar flex-1">
			<div class="full searchtool">
				<h2>Search Website:</h2>
				<form class="search" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
					<div class="fieldwrap input"><input type="text" value="" name="s" id="s" placeholder="Search for..." /><?=svg('#search',1,0,'search')?></div>
					<div class="fieldwrap submit"><input type="submit" value="search"></div>
				</form>
			</div>  
		</div> 

	</div>  

</div>  

<!-- End Template: 404.php  -->

<?php include ("includes/page.footer.php") ?>
