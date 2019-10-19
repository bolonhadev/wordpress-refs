<?php
/**
 *
 * Template Name: My Custom Blog Page
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

global $paged;

$curpage = $paged ? $paged : 1; 
$args = array(
    'post_type' => 'post', 
    'orderby' => 'post_date',
    'posts_per_page' => 6,
    'paged' => $paged 
);
$query = new WP_Query($args); ?>

<?php get_header(); ?>

<?php require( locate_template( 'templates/loop-blog.php' ) ); ?>

<div class="my-widget">
	<?php dynamic_sidebar( 'my-blog-sidebar' ); ?>
</div>

<?php get_footer(); ?>