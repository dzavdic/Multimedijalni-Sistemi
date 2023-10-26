<?php
/**
 * The template for displaying footer.
 *
 * @copyright  Copyright (c) 2023, Multimedijalni Sistemi
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */
?>
	<footer id="footer" class="site-footer">
      <?php
      $custom_logo_id = get_theme_mod( 'custom_logo' );
      $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
      ?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
      <img src="<?php echo $image[0]; ?>" alt="Logo" width="100" height="100">
      </a>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php bloginfo( 'name' ); ?>
      </a>
      WordPress tema.
  </footer><!-- #footer -->
	<?php
		wp_footer(); ?>
	</body>
</html>

