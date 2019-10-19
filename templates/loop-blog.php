<!-- 
	// EN_USA: Main loop using our query  
	// PT_BR: O loop, usando nossa query
 -->
<?php if($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

<?php 

	// EN_USA: This is my custom layout, please EDIT this;  
		//also see the WP Ref: https://developer.wordpress.org/themes/basics/the-loop/

	// PT_BR: Esse é o meu layout personalizado, EDITE isso para ficar do seu agrado
		// Veja também essas referências: https://developer.wordpress.org/themes/basics/the-loop/
	/*

		<a href="link">
		_________________
		|								|
		|								|
		|	   img				|
		|								|
		|_______________|
		|								|
		|	   h2					|
		|	   p					|
		|	   date				|
		|_______________|

		</a>

	*/

?>
<div id="post-<?php the_ID(); ?>" class="blog-posts-class">
	<?php // Adding link to all post loop || adicionando link para o loop todo do post ?>		
	<a href="<?php the_permalink(); ?>" >
	<?php // Does the post have feature image? || A postagem tem imagem de destaque? ?>
	<?php $has_img = (!empty(get_the_post_thumbnail(get_the_ID()))) ? true : false ; ?>
		<?php	if ( $has_img ) : 
			echo get_the_post_thumbnail( $post->ID, '', array( 'class' => 'my_class-img' ) ); 
		else : // Has-img? If doesn't echo... || Se não tiver usar isso... ?>
			<img src="<?php echo get_template_directory_uri() ?>/assets/images/no-img-blog-post.jpg" class="blog-img img-no-img"/>
		<?php endif; ?>
		<div class="mypost-contents">
			<?php the_title('<h2>','</h2>'); // <-- The Title || O Título ?>
			<p>
				<?php echo get_excerpt(100); // function.php(get_excerpt(100)) || Get Excerpt || Pegar resumo ?>
			</p>
			<time datetime="<?php echo get_the_date('d-m-Y'); ?>" itemprop="datePublished">
				<?php echo get_the_date('d/m/Y'); // Post date ?>
			</time>
		</div>
	</a>
</div>
<?php endwhile; ?>
<div class="nnbp-paginator">
	<?php 
		// EN_USA & PT_BR: https://codex.wordpress.org/Function_Reference/paginate_links
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