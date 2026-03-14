<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php echo esc_attr(get_bloginfo('charset')); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header class="site-header">
		<div class="container header-inner">
			<div class="site-logo">
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<?php echo esc_html(get_bloginfo('name')); ?>
				</a>
			</div>
			<nav class="main-navigation">
				<?php wp_nav_menu([
					'theme_location' => 'primary',
					'menu_class' => 'nav-menu',
					'container' => false,
					'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				]); ?>
			</nav>
		</div>
	</header>