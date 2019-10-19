<?php
/**
 * Template used for pages, specific Custom Blog Page.
 *
 * 
 * 
 * Template Name: Blog Page
 */

// Do not allow directly accessing this file.
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
	$query = new WP_Query($args);
	$nap_post_without_img = Avada()->settings->get( 'napit_blog_no_img' ); 
?>
<?php get_header(); ?>

<section id="blog-section">
	<div class="blog-post-content">
		<div class="blog-content">

			<?php require( locate_template( 'templates/blog-search-box.php' ) ); ?>

			<div class="blog-posts-grid">

				<?php if($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
					<?php require( locate_template( 'templates/loop-blog.php' ) ); ?>
				<?php endwhile; ?>

				<div class="paginator">

				<?php 

				$big = 999999999; 

					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					 	'add_args'  => true,
						'format' => '/page/%#%',
						'current' => max( 1, $curpage ),
						'total' => $query->max_num_pages,
						'prev_next'          => true,
						'prev_text'          => __('Previous'),
						'next_text'          => __('Next')
					) );
				    wp_reset_postdata();
			    ?>

				</div>

			<?php endif; ?>

			</div>		

		</div>
		<div class="blog-widget">
			<?php dynamic_sidebar( 'blog-sidebar' ); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>