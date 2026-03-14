<?php get_header(); ?>

<div class="projects-archive-page">
	<div class="container">
		<h1><?php esc_html_e('Projects', 'custom-wp'); ?></h1>

		<?php if (have_posts()) : ?>

			<div class="projects-list">

				<?php while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php if (has_post_thumbnail()) : ?>
							<div class="project-thumbnail">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('medium'); ?>
								</a>
							</div>
						<?php endif; ?>

						<div class="project-card-body">

							<h2>
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h2>

							<div class="project-meta">
								<?php echo esc_html(get_the_date()); ?>
							</div>

							<div class="project-excerpt">
								<?php the_excerpt(); ?>
							</div>

							<a class="project-read-more" href="<?php the_permalink(); ?>">
								<?php esc_html_e('View Project', 'custom-wp'); ?>
							</a>

						</div>

					</article>

				<?php endwhile; ?>

			</div>

			<div class="pagination-wrap">
				<?php
				the_posts_pagination(array(
					'mid_size'  => 2,
					'prev_text' => esc_html__('« Prev', 'custom-wp'),
					'next_text' => esc_html__('Next »', 'custom-wp'),
				));
				?>
			</div>

		<?php else : ?>

			<p><?php esc_html_e('No projects found.', 'custom-wp'); ?></p>

		<?php endif; ?>

	</div>
</div>

<?php get_footer(); ?>