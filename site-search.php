

<?php if (have_posts()) : ?>
	<section class="section maincontent results">
		<div class="wrapper small">
			<main>

				<h1>Search Results: <?php the_search_query(); ?></h1>

				<?php while (have_posts()) : the_post(); ?>
					<article>
						<?php 

						$before = array('<br>', '<br/>', '<br />');
						$after = array('', '', '');

						$title = str_replace($before, $after, get_the_title());
						echo '<h3><a href="' .get_the_permalink(). '">' . $title . '</a></h3>';
						?>
						<?php the_excerpt(); ?>
					</article>

				<?php endwhile; ?>

			</main>
		</div>
	</section>



<?php else : ?>


	<div class="section graylt">
		<div class="wrapper row">


			<div class="content flex-2">
				<h1><?php esc_html_e('Nothing Found', '_ws'); ?></h1>
				<p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', '_ws'); ?></p>

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

<?php endif; ?>





