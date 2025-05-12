<?php
// Thêm meta box cho Experience
function experience_add_meta_boxes() {
    add_meta_box(
        'experience_details',
        'Chi tiết Experience',
        'experience_render_meta_box',
        'experience',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'experience_add_meta_boxes');

function experience_render_meta_box($post) {
    // Lấy dữ liệu cũ nếu có
    $fields = [
        'show_date', 'hide_date', 'hashtag', 'slide_image', 'main_image', 'left_image', 'right_image',
        'pc_title', 'sp_title', 'content', 'active_url_date', 'deactive_url_link',
        'before_active_url_title', 'before_active_url_link',
        'during_active_url_title', 'during_active_url_link',
        'after_active_url_title', 'after_active_url_link'
    ];
    foreach ($fields as $field) {
        $$field = get_post_meta($post->ID, $field, true);
    }
    $hashtag_options = ['ステータス', 'スライダー', '春', '夏', '秋', '冬', '通年', 'おすすめ'];
    ?>
    <label>Show Experience Date: <input type="date" name="show_date" value="<?php echo esc_attr($show_date); ?>"></label><br>
    <label>Hide Experience Date: <input type="date" name="hide_date" value="<?php echo esc_attr($hide_date); ?>"></label><br>
    <label>Hashtag:</label><br>
    <?php foreach ($hashtag_options as $tag): ?>
        <label>
            <input type="checkbox" name="hashtag[]" value="<?php echo $tag; ?>" <?php if(is_array($hashtag) && in_array($tag, $hashtag)) echo 'checked'; ?>>
            <?php echo $tag; ?>
        </label>
    <?php endforeach; ?>
    <br>
    <label>Slide Image: <input type="text" name="slide_image" value="<?php echo esc_attr($slide_image); ?>"></label><br>
    <label>Main Image: <input type="text" name="main_image" value="<?php echo esc_attr($main_image); ?>"></label><br>
    <label>Left Image: <input type="text" name="left_image" value="<?php echo esc_attr($left_image); ?>"></label><br>
    <label>Right Image: <input type="text" name="right_image" value="<?php echo esc_attr($right_image); ?>"></label><br>
    <label>PC Title: <input type="text" name="pc_title" value="<?php echo esc_attr($pc_title); ?>"></label><br>
    <label>SP Title: <input type="text" name="sp_title" value="<?php echo esc_attr($sp_title); ?>"></label><br>
    <label>Content: <textarea name="content"><?php echo esc_textarea($content); ?></textarea></label><br>
    <label>Active URL Date: <input type="date" name="active_url_date" value="<?php echo esc_attr($active_url_date); ?>"></label><br>
    <label>Deactive URL Link: <input type="text" name="deactive_url_link" value="<?php echo esc_attr($deactive_url_link); ?>"></label><br>
    <label>Before Active URL Title: <input type="text" name="before_active_url_title" value="<?php echo esc_attr($before_active_url_title); ?>"></label><br>
    <label>Before Active URL Link: <input type="text" name="before_active_url_link" value="<?php echo esc_attr($before_active_url_link); ?>"></label><br>
    <label>During Active URL Title: <input type="text" name="during_active_url_title" value="<?php echo esc_attr($during_active_url_title); ?>"></label><br>
    <label>During Active URL Link: <input type="text" name="during_active_url_link" value="<?php echo esc_attr($during_active_url_link); ?>"></label><br>
    <label>After Active URL Title: <input type="text" name="after_active_url_title" value="<?php echo esc_attr($after_active_url_title); ?>"></label><br>
    <label>After Active URL Link: <input type="text" name="after_active_url_link" value="<?php echo esc_attr($after_active_url_link); ?>"></label><br>
    <?php 
}

// Lưu dữ liệu meta box
function experience_save_meta_box($post_id) {
    $fields = [
        'show_date', 'hide_date', 'slide_image', 'main_image', 'left_image', 'right_image',
        'pc_title', 'sp_title', 'content', 'active_url_date', 'deactive_url_link',
        'before_active_url_title', 'before_active_url_link',
        'during_active_url_title', 'during_active_url_link',
        'after_active_url_title', 'after_active_url_link'
    ];
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
    // Hashtag là mảng
    if (isset($_POST['hashtag'])) {
        update_post_meta($post_id, 'hashtag', $_POST['hashtag']);
    } else {
        update_post_meta($post_id, 'hashtag', []);
    }
}
add_action('save_post_experience', 'experience_save_meta_box');

// Thêm meta box cho Spot
function spot_add_meta_boxes() {
    add_meta_box(
        'spot_details',
        'Chi tiết Spot',
        'spot_render_meta_box',
        'spot',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'spot_add_meta_boxes');

function spot_render_meta_box($post) {
    $fields = [
        'show_date', 'hide_date', 'hashtag', 'spot_image', 'spot_title', 'spot_intro',
        'spot_url_title', 'spot_url_link'
    ];
    foreach ($fields as $field) {
        $$field = get_post_meta($post->ID, $field, true);
    }
    $hashtag_options = ['ステータス'];
    ?>
    <label>Show Spot Date: <input type="date" name="show_date" value="<?php echo esc_attr($show_date); ?>"></label><br>
    <label>Hide Spot Date: <input type="date" name="hide_date" value="<?php echo esc_attr($hide_date); ?>"></label><br>
    <label>Hashtag:</label><br>
    <?php foreach ($hashtag_options as $tag): ?>
        <label>
            <input type="checkbox" name="hashtag[]" value="<?php echo $tag; ?>" <?php if(is_array($hashtag) && in_array($tag, $hashtag)) echo 'checked'; ?>>
            <?php echo $tag; ?>
        </label>
    <?php endforeach; ?>
    <br>
    <label>Spot Image: <input type="text" name="spot_image" value="<?php echo esc_attr($spot_image); ?>"></label><br>
    <label>Spot Title: <input type="text" name="spot_title" value="<?php echo esc_attr($spot_title); ?>"></label><br>
    <label>Spot Intro: <textarea name="spot_intro"><?php echo esc_textarea($spot_intro); ?></textarea></label><br>
    <label>Spot URL Title: <input type="text" name="spot_url_title" value="<?php echo esc_attr($spot_url_title); ?>"></label><br>
    <label>Spot URL Link: <input type="text" name="spot_url_link" value="<?php echo esc_attr($spot_url_link); ?>"></label><br>
    <?php
}

function spot_save_meta_box($post_id) {
    $fields = [
        'show_date', 'hide_date', 'spot_image', 'spot_title', 'spot_intro',
        'spot_url_title', 'spot_url_link'
    ];
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
    if (isset($_POST['hashtag'])) {
        update_post_meta($post_id, 'hashtag', $_POST['hashtag']);
    } else {
        update_post_meta($post_id, 'hashtag', []);
    }
}
add_action('save_post_spot', 'spot_save_meta_box');

