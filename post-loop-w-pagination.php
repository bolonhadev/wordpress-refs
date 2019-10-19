<?php
/**
 *
 * EN_USA: Please help me improve this to benefit all
 * PT_BR: Por favor, me ajude a melhorar isso para benefícios todos
 * The template used in pages for loop posts (or custom posts)  w/ paginations
 * Código de referência usados em páginas para loops de posts (ou custom posts) com paginação
 *
 * EN_USA: You will need set the page format on WP Dashboard > Edit Page : Page Attributes : 
 *		   Template : My Custom Blog Page (or something you defined in Template Name below)
 * PT_BR: Você precisará configurar sua página em WP Admin > Editar Página : Atributos da Página : 
 * 	       Modelo : My Custom Blog Page (ou o nome que você usar abaixo no Template Name)
 * 
 * Template Name: My Custom Blog Page
 * 
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// EN_USA: This is my Blog query
// PT_BR: Vou chamar meus posts com a query a seguir

global $paged;
// EN_USA: $curpage = My current page (pagination-thing)
// PT_BR: $curpage = Minha página atual (usado na paginação)
$curpage = $paged ? $paged : 1; 
$args = array(
    // EN_USA: 'post_type' = You can modify this to your custom post 
    // PT_BR: 'post_type' = Você pode chamar seu custom post aqui
    'post_type' => 'post', 
    'orderby' => 'post_date',
    'posts_per_page' => 6,
    // EN_USA: 'paged' = Pagination thing 
    // PT_BR: 'paged' = Usado na paginação
    'paged' => $paged 
);
$query = new WP_Query($args); ?>

<?php get_header(); ?>

<!-- 
	// EN_USA: Calling my loop template
	// PT_BR: Chamando meu template do loop
-->
<?php require( locate_template( 'templates/loop-blog.php' ) ); ?>

<!-- 
	// EN_USA: Adding a Widget that was already registered
	// PT_BR: Adicionando um Widget, que já estava resgistrado 
-->
<div class="my-widget">
	<?php dynamic_sidebar( 'my-blog-sidebar' ); ?>
</div>

<!-- 
	// EN_USA: Don't forget to clean up the code, removing comments, but not removing Template Name
	// PT_BR: Não se esqueça de limpar o código, removendo os comentários, mas não remova o Template Name
-->
<?php get_footer(); ?>