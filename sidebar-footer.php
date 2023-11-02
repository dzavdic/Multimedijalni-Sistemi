<?php
/**
 * The sidebar template part.
 *
 * @copyright  Copyright (c) 2023, Multimedijalni Sistemi
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

if ( is_active_sidebar( 'footer-sidebar' ) ) { ?>
	<ul class="footer-sidebar">
	    <?php dynamic_sidebar('footer-sidebar' ); ?>
	</ul>
<?php } 