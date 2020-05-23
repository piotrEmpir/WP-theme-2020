<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<div class="oh">

<header class="header">
	<div class="container">
	<a href="<?php echo home_url(); ?>">Home</a>


	<?php
		wp_nav_menu( array(
		    'container'         => 'nav',
		    'theme_location'    => 'primary'
		) );
	?>


	<button class="menu-toggle">
		<span class="label">Menu</span>
		<span class="ico"><i></i></span>
	</button>

	</div>
</header>