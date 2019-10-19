<?php
/**
 * Template used for single posts and other single post-types
 * that don't have a specific template.
 *
 * @package Avada
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>

<?php get_header(); ?>

<section id="blog-section">
	<article id="post-<?php the_ID(); ?>" class="blog-post-content clearfix">
				
				<?php while ( have_posts() ) : the_post(); ?>

				<?php 	
					$categories = get_the_category($post->ID); 
					$post_categories = get_post_primary_category($post->ID, 'category');
					$primary_category = $post_categories['primary_category']; 
				?>                                   

				<div class="blog-single-cat">
					<?php echo '<a href="/blog/'.$primary_category->slug.'">'.$primary_category->name.'</a> '; ?>

			
					<?php foreach ($categories as $catvalue): ?>
						<?php if ($catvalue->term_id!=$primary_category->term_id): ?>
							<?php echo '| <a href="/blog/'.$catvalue->slug.'">'.$catvalue->name.'</a>'; ?>
						<?php endif ?>
					<?php endforeach ?>
				</div>
				<h1 class="blog-single-title"><?php the_title(); ?></h1>
				
		<div class="blog-content">
			<div class="blog-posts-grid">
				<?php require( locate_template( 'templates/blog-search-box.php' ) ); ?>
				<div class="subheader">
					<p class="the_tags">
						<?php $post_tags = get_the_tags();
							if ( $post_tags ) {
							    foreach( $post_tags as $tag ) {
							    echo '<a href="/tag/'. $tag->slug . '">'. $tag->name . '</a> '; 
						    }
						} ?>
					</p>
				</div>

				<?php $has_img = (!empty(get_the_post_thumbnail($post->ID))) ? true : false ; ?>
    		  <?php	if ( $has_img ) : ?>
					<div class="blog-single-image">
						<?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>
					</div>
				<?php endif; ?>

				<div class="post-content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
				<?php endwhile; ?>
		<div class="blog-widget">
			<?php dynamic_sidebar( 'blog-sidebar' ); ?>
		</div>
	</article>
</section>

<?php get_footer(); ?>