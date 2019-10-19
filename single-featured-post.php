<?php
/**
 * Template used for single posts and other post-types
 * that don't have a specific template.
 *
 *
 * Template Name: Post Destaque
 * Template Post Type: post
*/

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>

<?php get_header(); ?>

<!-- Post Container -->
<section id="feature-post-container">
	<?php while ( have_posts() ) : ?>

		<?php the_post(); ?>

		  <?php $has_img = (!empty(get_the_post_thumbnail(get_the_ID()))) ? true : false ; ?>
		  <?php	if ( $has_img ) : ?>
			<!-- Hero -->
			<div class="hero" style="background: url(<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>);">
			</div>
		<?php endif; ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
			<div class="post-content">
				<!-- The Title -->
				
        <?php the_title(); ?> ?>
				
				<?php 	// The date
						$post_date = get_the_date( 'F, Y' ); 
						echo '<p class="feature-post-date">'.$post_date.' / ';
						// Categories loop
						$categories = get_the_category();
						$categories = array_reverse($categories);
						$separator = ' / ';
						$output = '';
						if ( ! empty( $categories ) ) {
						foreach( $categories as $category ) {
						$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="nap-categories-feature-posts-links" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
						}
							echo trim( $output, $separator ); // echo categories loop
						}	
						?>
					</p>
				
				<hr />
				<!-- The Content -->
        <div class="the-content">
				  <?php the_content(); ?>
        </div>
			</div>
		</article>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
</section>
<?php get_footer(); ?>