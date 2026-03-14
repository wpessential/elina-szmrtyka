<?php

/**
 * The template for displaying single posts and pages
 */

get_header(); ?>

<main id="primary" class="site-main">
	<div class="container">
		<?php
		if (have_posts()) :
			while (have_posts()) :
				the_post();
		?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="entry-header">
						<!-- Post Title -->
						<h1 class="entry-title"><?php the_title(); ?></h1>

						<!-- Post Meta -->
						<div class="entry-meta">
							<span class="post-date">
								<?php echo esc_html(get_the_date()); ?>
							</span>
							<span class="post-author">
								by <?php echo esc_html(get_the_author()); ?>
							</span>
						</div>
					</header>

					<!-- Featured Image -->
					<?php if (has_post_thumbnail()) : ?>
						<div class="post-thumbnail">
							<?php the_post_thumbnail('large'); ?>
						</div>
					<?php endif; ?>

					<!-- Post Content -->
					<div class="entry-content">
						<?php the_content(); ?>
					</div>

				</article>

		<?php
			endwhile;
		endif;
		?>
	</div>
</main>

<?php get_footer(); ?>