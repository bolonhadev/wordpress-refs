<?php
/**
 *  Template used for pages, specific Custom Blog Page.
 * 
 *  EN_USA: Please help me improve this to benefit all
 *  PT_BR:  Por favor, me ajude a melhorar isso para benefícios todos
 * 
 *  EN_USA: The template used in pages for loop posts (or custom posts)  w/ paginations
 *  PT_BR:  Código de referência usados em páginas para loops de posts (ou custom posts) com paginação
 * 
 *  EN_USA: You will need set the page format on WP Dashboard > Edit Page : Page Attributes : 
 *		      Template : Blog Page (or something you defined in Template Name below)
 *  PT_BR:  Você precisará configurar sua página em WP Admin > Editar Página : Atributos da Página : 
 * 	        Modelo   : Blog Page (ou o nome que você usar abaixo no Template Name)
 * 
 * Template Name: Blog Page
 * 
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
  // Search query
  // Parâmetros para a busca
	global $paged;
	$curpage = $paged ? $paged : 1;
	$args = array(
      // EN_USA: 'post_type' = You can modify this to your custom post 
      // PT_BR : 'post_type' = Você pode chamar seu custom post aqui
	    'post_type' => 'post',
	    'orderby' => 'post_date',
      'posts_per_page' => 6,
      // EN_USA: 'paged' = Pagination thing 
      // PT_BR : 'paged' = Usado na paginação
	    'paged' => $paged
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
          <!-- 
            // EN_USA: Calling my loop template
            // PT_BR: Chamando meu template do loop
          -->
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
    <!-- 
      // EN_USA: Adding a Widget that was already registered
      // PT_BR: Adicionando um Widget, que já estava resgistrado 
    -->
		<div class="blog-widget">
			<?php dynamic_sidebar( 'blog-sidebar' ); ?>
		</div>
	</div>
</section>

<!-- 
	// EN_USA: Don't forget to clean up the code, removing comments, but not removing Template Name
	// PT_BR: Não se esqueça de limpar o código, removendo os comentários, mas não remova o Template Name
-->
<?php get_footer(); ?>