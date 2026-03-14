<?php get_header(); ?>

<div class="page-content">

<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
?>

<!-- <h2><?php the_title(); ?></h2> -->

<?php the_content(); ?>
</div>

<?php
    endwhile;
endif;
?>

</div>

<?php get_footer();