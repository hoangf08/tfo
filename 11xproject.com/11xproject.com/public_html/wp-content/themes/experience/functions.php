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

// require_once get_template_directory() . '/manage/experience.php';

// Thêm meta box cho post type experience
function add_custom_meta_box()
{
  add_meta_box(
    'custom_meta_box',
    'Thông tin chi tiết',
    'custom_meta_box_html',
    'experience'
  );
}
add_action('add_meta_boxes', 'add_custom_meta_box');

function custom_meta_box_html($post) {
    $image_id = get_post_meta($post->ID, '_custom_image_id', true);
    $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'medium') : '';
    ?>
    <style>
    .custom-image-wrapper {
        position: relative;
        display: inline-block;
    }
    #custom-image-container {
        width: 200px;
        height: 200px;
        background: #ccc;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        border: 1px solid #ddd;
    }
    #custom-image-container.has-image {
        background: none;
    }
    #custom-image-preview {
        max-width: 100%;
        max-height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    #custom-image-preview.hide {
        display: none;
    }
    #custom-image-upload {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        z-index: 2;
    }
    #custom-image-upload.has-image {
        opacity: 0.7;
    }
    #custom-image-remove {
        position: absolute;
        right: 5px;
        top: 5px;
        z-index: 2;
    }
    #custom-image-remove.hide {
        display: none;
    }
    </style>
    <div class="custom-image-wrapper">
        <div id="custom-image-container" class="<?php echo $image_url ? 'has-image' : ''; ?>">
            <img id="custom-image-preview" src="<?php echo esc_url($image_url); ?>" class="<?php echo $image_url ? '' : 'hide'; ?>" />
            <button type="button" class="button" id="custom-image-upload" <?php echo $image_url ? 'class=\"has-image\"' : ''; ?>>Chọn ảnh</button>
            <button type="button" class="button" id="custom-image-remove" class="<?php echo $image_url ? '' : 'hide'; ?>">Xóa ảnh</button>
        </div>
        <input type="hidden" id="custom-image-id" name="custom_image_id" value="<?php echo esc_attr($image_id); ?>" />
    </div>
    <script>
    jQuery(document).ready(function($){
        var frame;
        $('#custom-image-upload').on('click', function(e){
            e.preventDefault();
            if(frame){
                frame.open();
                return;
            }
            frame = wp.media({
                title: 'Chọn ảnh',
                button: { text: 'Chọn ảnh' },
                multiple: false
            });
            frame.on('select', function(){
                var attachment = frame.state().get('selection').first().toJSON();
                $('#custom-image-id').val(attachment.id);
                $('#custom-image-preview').attr('src', attachment.url).removeClass('hide');
                $('#custom-image-remove').removeClass('hide');
                $('#custom-image-container').addClass('has-image');
                $('#custom-image-upload').addClass('has-image');
            });
            frame.open();
        });
        $('#custom-image-remove').on('click', function(){
            $('#custom-image-id').val('');
            $('#custom-image-preview').addClass('hide');
            $(this).addClass('hide');
            $('#custom-image-container').removeClass('has-image');
            $('#custom-image-upload').removeClass('has-image');
        });
    });
    </script>
    <?php
}

function save_custom_image_meta_box($post_id) {
    if (array_key_exists('custom_image_id', $_POST)) {
        update_post_meta(
            $post_id,
            '_custom_image_id',
            intval($_POST['custom_image_id'])
        );
    }
}
add_action('save_post_experience', 'save_custom_image_meta_box');

function load_wp_media_files() {
    if (is_admin()) {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'load_wp_media_files');

?>