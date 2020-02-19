<?php
/**
 * @package WordPress
 * @subpackage CloudCraze
 */
?>

<!-- Begin Template: searchform.php  -->
<form class="searchform" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<input type="text" value="" name="s" id="s" placeholder="Search site for..." />
	<div class="submitbttn"><?=svg('#arrow-right',1,'submit','Search Site')?></div>
</form>
<script>
	jQuery('.submitbttn svg').click(function(event) {
		jQuery('form.searchform').submit();
	});
</script>
<!-- End Template: searchform.php  -->