<?php
/**
 * The template for displaying single product.
 *
 * @copyright  Copyright (c) 2023, Multimedijalni Sistemi
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

get_header(); 
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
        $product_id = get_the_ID();
        $product = get_post( $product_id );
        // Prikazivanje informacija o trenutnom postu
        ?>
        <div class="site-content">
            <article <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header><!-- .entry-header -->
                
                <?php the_post_thumbnail( 'my-custom-image-size' ); ?>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div><!-- .entry-content -->

            </article><!-- #post-## -->
        </div><!-- .site-content -->

        <?php
    }
}
wp_reset_postdata();
get_sidebar();
get_footer();