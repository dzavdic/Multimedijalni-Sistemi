<?php
/**
 * The header template part.
 *
 * @copyright  Copyright (c) 2023, Multimedijalni Sistemi
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php wp_head(); ?>
	</head>
  <header class="site-header">
	<div class="site-header-logo">
  <?php
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
	<img src="<?php echo $image[0]; ?>" alt="Logo" width="100" height="100">
	</a>
    <p class="site-title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php bloginfo( 'name' ); ?>
      </a>
    </p>
    <p class="site-description"><?php bloginfo( 'description' ); ?></p>
	</div>
	<?php
	wp_nav_menu( array(
    	'theme_location' => 'menu-1',
	) );
	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </header><!-- .site-header -->
