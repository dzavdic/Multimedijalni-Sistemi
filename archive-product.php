<?php
/**
 * The template for displaying Archive Product.
 *
 * @copyright  Copyright (c) 2023, Multimedijalni Sistemi
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

get_header();
?>
<div class="site-content">
	  <header class="page-header">
		  <?php
		  the_archive_title( '<h1 class="page-title">', '</h1>' );
		  the_archive_description( '<div class="archive-description">', '</div>' );
		  ?>
	  </header><!-- .page-header -->
    <?php
$args = array(
    'post_type' => 'product',
    'posts_per_page' => 10,
);
$query = new WP_Query( $args );
if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
        // Prikazivanje informacija o trenutnom postu
        ?>
        <article <?php post_class(); ?>>

        <?php the_post_thumbnail( 'my-custom-image-size' ); ?>

        <header class="entry-header">
            <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php the_content( esc_html__( 'Continue reading &rarr;', 'multimedijalni-sistemi' ) ); ?>
        </div><!-- .entry-content -->

        </article><!-- #post-## -->

        <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;

    }
}
the_posts_navigation();
?>
	</div><!-- .site-content -->
<?php
wp_reset_postdata();
get_sidebar();
get_footer();