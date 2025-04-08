<?php

function load_assets()
{
    wp_enqueue_style("font", "//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Noto+Serif+JP:wght@200..900&display=swap", array(), "1.0", "all");
    wp_enqueue_style("slide_css", get_theme_file_uri() . '/common/css/swiper-bundle.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style("experience_css", get_theme_file_uri() . '/common/css/style.css', array(), '1.0.0', 'all');

    wp_enqueue_script("jquery-script", get_theme_file_uri() . '/common/js/jquery-3.7.0.min.js', array('jquery'), '1.00', true);
    wp_enqueue_script("swiper-script", get_theme_file_uri() . '/common/js/swiper-bundle.min.js', array('jquery'), '1.00', true);
    wp_enqueue_script("main-script", get_theme_file_uri() . '/common/js/script.js', array('jquery'), '1.00', true);
}
add_action("wp_enqueue_scripts", "load_assets");

require_once get_template_directory() . '/manage/experience.php';
?>