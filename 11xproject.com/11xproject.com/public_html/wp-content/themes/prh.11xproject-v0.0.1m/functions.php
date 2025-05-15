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

add_filter('single_template', function ($template) {
    global $post;

    // Lấy post type của bài viết hiện tại
    $post_type = $post->post_type;

    // Xác định đường dẫn tới tệp mẫu trong thư mục single/{post_type}/index.php
    $custom_template = get_stylesheet_directory() . "/posts/{$post_type}/user/index.php";

    // Kiểm tra xem tệp mẫu có tồn tại không
    if (file_exists($custom_template)) {
        return $custom_template;
    }

    // Nếu không tìm thấy, trả về template mặc định
    return $template;
});

// Lấy tất cả các thư mục trong posts
$post_folders = glob(get_template_directory() . '/posts/*/manage', GLOB_ONLYDIR);

// Duyệt qua từng thư mục và include file manage.php nếu tồn tại
foreach ($post_folders as $folder) {
    $manage_file = $folder . '/manage.php';
    $function_file = $folder . '/functions.php';
    if (file_exists($manage_file)) {
        require_once $manage_file;
    }
    if (file_exists($function_file)) {
        require_once $function_file;
    }
}

?>