<?php

get_header();
setup_postdata($post);
?>

	<section class="contact">

		<div class="copy site_width">

			<?php get_sidebar('social'); ?>

			<div class="content_section_site site_width">
				<h1><?php the_title(); ?></h1>
				<h3><?php the_excerpt(); ?></h3>

				<?php the_content(); ?>
				<br />

			</div>

		</div>

	</section>

<?php get_footer(); ?>