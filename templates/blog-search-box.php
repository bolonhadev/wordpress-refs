<div id="blog-search">
		<select id="blog-select">
			<option value="" selected>Categorias</option>
			<?php
			$categories = get_categories( array(
			    'orderby' => 'name',
			    'order'   => 'ASC'
			) );
			 
			foreach( $categories as $category ) {
			    $category_link = sprintf( 
			        '<option value="%1$s">%2$s</a>',
			        esc_url( get_category_link( $category->term_id ) ),
			        esc_html( $category->name )
			    );
			    echo sprintf( esc_html__( '%s', 'textdomain' ), $category_link );
			} 
			?>
		</select>

	<form action="/" method="get">
	    <label for="search">Busca: </label>
	    <input type="search" name="s" id="search" class="search-input" aria-required="true" aria-label="Buscar..." placeholder="Buscar..." value="<?php the_search_query(); ?>" />
	    <input type="submit" alt="Search" value="&#8250;" />
	</form>
</div>