<?php if($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
	<div id="post-<?php the_ID(); ?>" class="blog-posts-class">				
		<a href="<?php the_permalink(); ?>" >
			<?php echo get_the_post_thumbnail( $post->ID, '', array( 'class' => 'my_class-img' ) ); ?>
			<div class="mypost-contents">
				<h2><?php the_title(); ?></h2>
				<p>
					<?php echo get_excerpt(100); ?>
				</p>
				<time datetime="<?php echo get_the_date('d-m-Y'); ?>" itemprop="datePublished">
					<?php echo get_the_date('d/m/Y'); ?>
				</time>
			</div>
		</a>
	</div>
	<?php endwhile; ?>
	<div class="nnbp-paginator">
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