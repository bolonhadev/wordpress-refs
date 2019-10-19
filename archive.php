<?php
/**
 * ARCHIVES TEMPLATE
 * Search result page
 * This will print the tags posts, category posts
 * And search results
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
// Handling with the URL Search Term to get posts GET-METHOD
// Tratando a URL para chamada dos posts GET-METHOD
global $wp;

$split_url = parse_url(home_url( $wp->request ));
$split_url = explode('/', $split_url['path']);

$get_term_search = $split_url[2];
$get_base_search = $split_url[1];

$get_base_search = ($get_base_search=='tag') ? 'tag' : 'category_name';

  // Search query
  // Parâmetros para a busca
	global $paged;
	$curpage = $paged ? $paged : 1;
	$args = array(
	    'post_type' => 'post',
	    'orderby' => 'post_date',
	    'posts_per_page' => 6,
	    'paged' => $paged,
	    $get_base_search => $get_term_search // tag ? category ?
	);
	$query = new WP_Query($args);
?>

<?php get_header(); ?>

<section id="blog-section">
	<div class="blog-post-content">
		<div class="blog-content">
      <?php // Calling a search box || Chamando caixa de busca ?>
			<?php require( locate_template( 'templates/blog-search-box.php' ) ); ?>
			<div class="blog-posts-grid">
        <?php // Here's the posts loop || Aqui está o loop de posts ?>
				<?php if($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
          <?php // Calling the loop template || Chamando o template do loop ?>
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