<?php

// Treating the initial words of the post (excerpt), it will be used like this get_excerpt(100)
// Tratando as palavras iniciais do post (excerpt), será usado assim get_excerpt(100)
function get_excerpt($limit, $source = null){

    $excerpt = $source == "content" ? get_the_content() : get_the_excerpt();
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    $excerpt = $excerpt.'...';
    return $excerpt;
}

// EN_USA: If you want to run a function only in that specific Page Templage
// PT_BR: Se você quiser fazer uma para rodar apenas em um Template de Página específico

// function feature_posts_enqueue_js()
// {
//     if (is_page_template('post-loop-w-pagination.php')){
//       	// do something
//     }
// }
