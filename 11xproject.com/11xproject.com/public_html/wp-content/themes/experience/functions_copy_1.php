<?php 

function load_assets(){
    wp_enqueue_style("font","//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Noto+Serif+JP:wght@200..900&display=swap", array(), "1.0", "all");
    wp_enqueue_style( "slide_css", get_theme_file_uri() . '/common/css/swiper-bundle.min.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( "experience_css", get_theme_file_uri() . '/common/css/style.css', array(), '1.0.0', 'all' );

    wp_enqueue_script( "jquery-script", get_theme_file_uri() . '/common/js/jquery-3.7.0.min.js', array('jquery'), '1.00', true );
    wp_enqueue_script( "swiper-script", get_theme_file_uri() . '/common/js/swiper-bundle.min.js', array('jquery'), '1.00', true );
    wp_enqueue_script( "main-script", get_theme_file_uri() . '/common/js/script.js', array('jquery'), '1.00', true );
}
add_action("wp_enqueue_scripts","load_assets");

// Thêm meta box cho post type experience
function add_custom_meta_box() {
    add_meta_box(
        'custom_meta_box',
        'Thông tin chi tiết',
        'custom_meta_box_html',
        'experience'
    );
}
add_action('add_meta_boxes', 'add_custom_meta_box');

// HTML cho meta box
function custom_meta_box_html($post) {
    $fields = array(
        'meta_description' => get_post_meta($post->ID, '_meta_description', true),
        'meta_keywords' => get_post_meta($post->ID, '_meta_keywords', true),
        'meta_title' => get_post_meta($post->ID, '_meta_title', true),
        'meta_name' => get_post_meta($post->ID, '_meta_name', true),
        'top_name' => get_post_meta($post->ID, '_top_name', true),
        'top_feature' => get_post_meta($post->ID, '_top_feature', true),
        'top_text' => get_post_meta($post->ID, '_top_text', true),
        'link_name' => get_post_meta($post->ID, '_link_name', true)
    );

    // Lấy dữ liệu experience groups
    $experience_groups = get_post_meta($post->ID, '_experience_groups', true);
    if (!is_array($experience_groups)) {
        $experience_groups = array();
    }

    // Lấy dữ liệu area groups 
    $area_groups = get_post_meta($post->ID, '_area_groups', true);
    if (!is_array($area_groups)) {
        $area_groups = array();
    }
    ?>
    <div class="custom-meta-box">
        <!-- SEO Section -->
         <div style="margin-bottom: 20px; background: #f9f9f9; padding: 10px; border-radius: 5px;">
        <h3>SEO</h3>
        <p>
            <label for="meta_description">ディスクリプション:</label>
            <input type="text" id="meta_description" name="meta_description" value="<?php echo esc_attr($fields['meta_description']); ?>" style="width: 100%">
            </p>
            <p>
                <label for="meta_keywords">キーワード:</label>
                <input type="text" id="meta_keywords" name="meta_keywords" value="<?php echo esc_attr($fields['meta_keywords']); ?>" style="width: 100%">
            </p>
            <p>
                <label for="meta_title">タイトル:</label>
                <input type="text" id="meta_title" name="meta_title" value="<?php echo esc_attr($fields['meta_title']); ?>" style="width: 100%">
            </p>
            <p>
                <label for="meta_name">ホテル名:</label>
                <input type="text" id="meta_name" name="meta_name" value="<?php echo esc_attr($fields['meta_name']); ?>" style="width: 100%">
            </p>
        </div>
        
        <!-- Top Information Section -->
         <div style="margin-bottom: 20px; background: #f9f9f9; padding: 10px; border-radius: 5px;">
            <h3>一般情報</h3>
            <p>
                <label for="top_name">ホテル名:</label>
                <textarea type="text" id="top_name" name="top_name" value="<?php echo esc_attr($fields['top_name']); ?>" style="width: 100%"><?php echo esc_textarea($fields['top_name']); ?></textarea>
            </p>
            <p>
                <label for="top_feature">特徴:</label>
                <textarea type="text" id="top_feature" name="top_feature" value="<?php echo esc_attr($fields['top_feature']); ?>" style="width: 100%"><?php echo esc_textarea($fields['top_feature']); ?></textarea>
            </p>
            <p>
                <label for="top_text">紹介文:</label>
                <textarea id="top_text" name="top_text" rows="4" style="width: 100%"><?php echo esc_textarea($fields['top_text']); ?></textarea>
            </p>
            <p>
                <label for="link_name">リンク化:</label>
                <input type="text" id="link_name" name="link_name" value="<?php echo esc_attr($fields['link_name']); ?>" style="width: 100%">
            </p>
        </div>

        <!-- Experience Groups Section -->
        <div style="margin-bottom: 20px; background: #f9f9f9; padding: 10px; border-radius: 5px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                <h3 style="margin: 0;">体験グループ</h3>
                <button type="button" id="add_experience_group" class="button button-primary">体験グループを追加</button>
            </div>
            
            <!-- Main Layout Container -->
            <div style="display: flex; gap: 20px;">
                <!-- Left Column - Seasonal Recommendations -->
                <div style="flex: 0 0 250px;">
                    <h4 style="margin-top: 0;">おすすめ体験一覧</h4>

                    <?php 
                    // ********************
                    //     MARK:春のおすすめ Slide
                    // ********************
                    ?>
                    
                    <!-- Spring Recommendations -->
                    <div class="seasonal-slide-container" style="margin-bottom: 15px; border: 1px solid #eee; padding: 10px; border-radius: 5px;">
                        <h5 style="margin-top: 0; background: #ffb7c5; color: white; padding: 5px 10px; border-radius: 3px;">春のおすすめ</h5>
                        <div class="seasonal-slides" style="display: flex; flex-direction: column; gap: 10px; padding: 5px 0;">
                            <?php 
                            foreach ($experience_groups as $index => $group): 
                                if(isset($group['display']) && $group['display'] == 1 && isset($group['spring']) && $group['spring'] == 1):
                            ?>
                            <div class="seasonal-slide-item" data-index="<?php echo $index; ?>" style="cursor: pointer; position: relative; transition: all 0.3s ease; display: flex; align-items: center; gap: 10px;">
                                <?php if(!empty($group['slide_image'])): ?>
                                    <img src="<?php echo esc_url($group['slide_image']); ?>" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                                <?php else: ?>
                                    <div style="width: 60px; height: 60px; background: #eee; border-radius: 5px; display: flex; justify-content: center; align-items: center; font-size: 10px;">画像なし</div>
                                <?php endif; ?>
                                <div style="font-size: 12px; font-weight: bold; flex: 1; overflow: hidden; text-overflow: ellipsis;">
                                    <?php echo isset($group['pc_title']) ? esc_attr($group['pc_title']) : ''; ?>
                                </div>
                            </div>
                            <?php 
                                endif;
                            endforeach; 
                            ?>
                        </div>
                    </div>
                    
                    <?php 
                    // ********************
                    //     MARK:夏のおすすめ Slide
                    // ********************
                    ?>

                    <!-- Summer Recommendations -->
                    <div class="seasonal-slide-container" style="margin-bottom: 15px; border: 1px solid #eee; padding: 10px; border-radius: 5px;">
                        <h5 style="margin-top: 0; background: #4dabff; color: white; padding: 5px 10px; border-radius: 3px;">夏のおすすめ</h5>
                        <div class="seasonal-slides" style="display: flex; flex-direction: column; gap: 10px; padding: 5px 0;">
                            <?php 
                            foreach ($experience_groups as $index => $group): 
                                if(isset($group['display']) && $group['display'] == 1 && isset($group['summer']) && $group['summer'] == 1):
                            ?>
                            <div class="seasonal-slide-item" data-index="<?php echo $index; ?>" style="cursor: pointer; position: relative; transition: all 0.3s ease; display: flex; align-items: center; gap: 10px;">
                                <?php if(!empty($group['slide_image'])): ?>
                                    <img src="<?php echo esc_url($group['slide_image']); ?>" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                                <?php else: ?>
                                    <div style="width: 60px; height: 60px; background: #eee; border-radius: 5px; display: flex; justify-content: center; align-items: center; font-size: 10px;">画像なし</div>
                                <?php endif; ?>
                                <div style="font-size: 12px; font-weight: bold; flex: 1; overflow: hidden; text-overflow: ellipsis;">
                                    <?php echo isset($group['pc_title']) ? esc_attr($group['pc_title']) : ''; ?>
                                </div>
                            </div>
                            <?php 
                                endif;
                            endforeach; 
                            ?>
                        </div>
                    </div>
                    
                    <?php 
                    // ********************
                    //     MARK:秋のおすすめ Slide
                    // ********************
                    ?>

                    <!-- Autumn Recommendations -->
                    <div class="seasonal-slide-container" style="margin-bottom: 15px; border: 1px solid #eee; padding: 10px; border-radius: 5px;">
                        <h5 style="margin-top: 0; background: #ff7e45; color: white; padding: 5px 10px; border-radius: 3px;">秋のおすすめ</h5>
                        <div class="seasonal-slides" style="display: flex; flex-direction: column; gap: 10px; padding: 5px 0;">
                            <?php 
                            foreach ($experience_groups as $index => $group): 
                                if(isset($group['display']) && $group['display'] == 1 && isset($group['autumn']) && $group['autumn'] == 1):
                            ?>
                            <div class="seasonal-slide-item" data-index="<?php echo $index; ?>" style="cursor: pointer; position: relative; transition: all 0.3s ease; display: flex; align-items: center; gap: 10px;">
                                <?php if(!empty($group['slide_image'])): ?>
                                    <img src="<?php echo esc_url($group['slide_image']); ?>" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                                <?php else: ?>
                                    <div style="width: 60px; height: 60px; background: #eee; border-radius: 5px; display: flex; justify-content: center; align-items: center; font-size: 10px;">画像なし</div>
                                <?php endif; ?>
                                <div style="font-size: 12px; font-weight: bold; flex: 1; overflow: hidden; text-overflow: ellipsis;">
                                    <?php echo isset($group['pc_title']) ? esc_attr($group['pc_title']) : ''; ?>
                                </div>
                            </div>
                            <?php 
                                endif;
                            endforeach; 
                            ?>
                        </div>
                    </div>
                    
                    <?php 
                    // ********************
                    //     MARK:冬のおすすめ Slide
                    // ********************
                    ?>

                    <!-- Winter Recommendations -->
                    <div class="seasonal-slide-container" style="margin-bottom: 15px; border: 1px solid #eee; padding: 10px; border-radius: 5px;">
                        <h5 style="margin-top: 0; background: #a0d8ef; color: white; padding: 5px 10px; border-radius: 3px;">冬のおすすめ</h5>
                        <div class="seasonal-slides" style="display: flex; flex-direction: column; gap: 10px; padding: 5px 0;">
                            <?php 
                            foreach ($experience_groups as $index => $group): 
                                if(isset($group['display']) && $group['display'] == 1 && isset($group['winter']) && $group['winter'] == 1):
                            ?>
                            <div class="seasonal-slide-item" data-index="<?php echo $index; ?>" style="cursor: pointer; position: relative; transition: all 0.3s ease; display: flex; align-items: center; gap: 10px;">
                                <?php if(!empty($group['slide_image'])): ?>
                                    <img src="<?php echo esc_url($group['slide_image']); ?>" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                                <?php else: ?>
                                    <div style="width: 60px; height: 60px; background: #eee; border-radius: 5px; display: flex; justify-content: center; align-items: center; font-size: 10px;">画像なし</div>
                                <?php endif; ?>
                                <div style="font-size: 12px; font-weight: bold; flex: 1; overflow: hidden; text-overflow: ellipsis;">
                                    <?php echo isset($group['pc_title']) ? esc_attr($group['pc_title']) : ''; ?>
                                </div>
                            </div>
                            <?php 
                                endif;
                            endforeach; 
                            ?>
                        </div>
                    </div>
                    
                    <?php 
                    // ********************
                    //     MARK:共通のおすすめ Slide
                    // ********************
                    ?>

                    <!-- Common Recommendations -->
                    <div class="seasonal-slide-container" style="margin-bottom: 15px; border: 1px solid #eee; padding: 10px; border-radius: 5px;">
                        <h5 style="margin-top: 0; background: #8bc34a; color: white; padding: 5px 10px; border-radius: 3px;">共通のおすすめ</h5>
                        <div class="seasonal-slides" style="display: flex; flex-direction: column; gap: 10px; padding: 5px 0;">
                            <?php 
                            foreach ($experience_groups as $index => $group): 
                                if(isset($group['display']) && $group['display'] == 1 && isset($group['common']) && $group['common'] == 1):
                            ?>
                            <div class="seasonal-slide-item" data-index="<?php echo $index; ?>" style="cursor: pointer; position: relative; transition: all 0.3s ease; display: flex; align-items: center; gap: 10px;">
                                <?php if(!empty($group['slide_image'])): ?>
                                    <img src="<?php echo esc_url($group['slide_image']); ?>" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                                <?php else: ?>
                                    <div style="width: 60px; height: 60px; background: #eee; border-radius: 5px; display: flex; justify-content: center; align-items: center; font-size: 10px;">画像なし</div>
                                <?php endif; ?>
                                <div style="font-size: 12px; font-weight: bold; flex: 1; overflow: hidden; text-overflow: ellipsis;">
                                    <?php echo isset($group['pc_title']) ? esc_attr($group['pc_title']) : ''; ?>
                                </div>
                            </div>
                            <?php 
                                endif;
                            endforeach; 
                            ?>
                        </div>
                    </div>
                    
                    <?php 
                    // ********************
                    //     MARK:おすすめ宿泊 Slide
                    // ********************
                    ?>

                    <!-- Plan Recommendations -->
                    <div class="seasonal-slide-container" style="margin-bottom: 15px; border: 1px solid #eee; padding: 10px; border-radius: 5px;">
                        <h5 style="margin-top: 0; background: #9c27b0; color: white; padding: 5px 10px; border-radius: 3px;">おすすめ宿泊プラン</h5>
                        <div class="seasonal-slides" style="display: flex; flex-direction: column; gap: 10px; padding: 5px 0;">
                            <?php 
                            foreach ($experience_groups as $index => $group): 
                                if(isset($group['display']) && $group['display'] == 1 && isset($group['plan']) && $group['plan'] == 1):
                            ?>
                            <div class="seasonal-slide-item" data-index="<?php echo $index; ?>" style="cursor: pointer; position: relative; transition: all 0.3s ease; display: flex; align-items: center; gap: 10px;">
                                <?php if(!empty($group['slide_image'])): ?>
                                    <img src="<?php echo esc_url($group['slide_image']); ?>" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                                <?php else: ?>
                                    <div style="width: 60px; height: 60px; background: #eee; border-radius: 5px; display: flex; justify-content: center; align-items: center; font-size: 10px;">画像なし</div>
                                <?php endif; ?>
                                <div style="font-size: 12px; font-weight: bold; flex: 1; overflow: hidden; text-overflow: ellipsis;">
                                    <?php echo isset($group['pc_title']) ? esc_attr($group['pc_title']) : ''; ?>
                                </div>
                            </div>
                            <?php 
                                endif;
                            endforeach; 
                            ?>
                        </div>
                    </div>
                </div>
                
                <?php 
                    // ********************
                    //     MARK: Summary Slide
                    // ********************
                    ?>
                <!-- Right Column - All Slides and Input Ranges -->
                <div style="flex: 1;">
                    <!-- All Slides Preview -->
                    <div style="margin-bottom: 20px;">
                        <h4 style="margin-top: 0;">全体プレビュー</h4>
                        <div class="experience-slide-preview" style="border: 1px solid #ddd; padding: 15px; background: #f9f9f9; border-radius: 5px;">
                            <div class="experience-slides" style="display: flex; flex-wrap: nowrap; overflow-x: auto; gap: 15px; padding: 10px 0;">
                                <?php foreach ($experience_groups as $index => $group): ?>
                                <div class="experience-slide-item" data-index="<?php echo $index; ?>" style="flex: 0 0 200px; cursor: pointer; position: relative; transition: all 0.3s ease; opacity: <?php echo $index === 0 ? '1' : '0.5'; ?>">
                                    <div style="position: relative;">
                                        <?php if(!empty($group['slide_image'])): ?>
                                            <img src="<?php echo esc_url($group['slide_image']); ?>" style="width: 100%; height: 120px; object-fit: cover; border-radius: 5px;">
                                        <?php else: ?>
                                            <div style="width: 100%; height: 120px; background: #eee; border-radius: 5px; display: flex; justify-content: center; align-items: center;">画像なし</div>
                                        <?php endif; ?>
                                        <div class="slide-badges" style="position: absolute; top: 5px; right: 5px; display: flex; flex-direction: column; gap: 3px;">
                                            <?php if(isset($group['spring']) && $group['spring'] == 1): ?>
                                                <span style="background: #ffb7c5; color: #fff; font-size: 10px; padding: 2px 5px; border-radius: 3px;">春</span>
                                            <?php endif; ?>
                                            <?php if(isset($group['summer']) && $group['summer'] == 1): ?>
                                                <span style="background: #4dabff; color: #fff; font-size: 10px; padding: 2px 5px; border-radius: 3px;">夏</span>
                                            <?php endif; ?>
                                            <?php if(isset($group['autumn']) && $group['autumn'] == 1): ?>
                                                <span style="background: #ff7e45; color: #fff; font-size: 10px; padding: 2px 5px; border-radius: 3px;">秋</span>
                                            <?php endif; ?>
                                            <?php if(isset($group['winter']) && $group['winter'] == 1): ?>
                                                <span style="background: #a0d8ef; color: #fff; font-size: 10px; padding: 2px 5px; border-radius: 3px;">冬</span>
                                            <?php endif; ?>
                                            <?php if(isset($group['common']) && $group['common'] == 1): ?>
                                                <span style="background: #8bc34a; color: #fff; font-size: 10px; padding: 2px 5px; border-radius: 3px;">共通</span>
                                            <?php endif; ?>
                                            <?php if(isset($group['plan']) && $group['plan'] == 1): ?>
                                                <span style="background: #9c27b0; color: #fff; font-size: 10px; padding: 2px 5px; border-radius: 3px;">宿泊</span>
                                            <?php endif; ?>
                                        </div>
                                        <?php if(isset($group['show_in_slide']) && $group['show_in_slide'] == 1): ?>
                                            <div style="position: absolute; top: 5px; left: 5px; background: #4CAF50; color: white; border-radius: 50%; width: 25px; height: 25px; display: flex; justify-content: center; align-items: center; font-size: 14px;">✓</div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="slide-title" style="padding: 8px 0; text-align: center; font-weight: bold; font-size: 13px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        <?php echo isset($group['pc_title']) ? esc_attr($group['pc_title']) : ''; ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php 
                    // ********************
                    //     MARK:EXP Input Range
                    // ********************
                    ?>
                    <!-- Input Ranges -->
                    <div id="experience_groups">
                        <?php foreach ($experience_groups as $index => $group): ?>
                        <div class="experience-group" style="border: 1px solid #ccc; padding: 10px; margin: 10px 0; display: <?php echo $index === 0 ? 'block' : 'none'; ?>;" data-index="<?php echo $index; ?>">
                            
                            <!-- Checkbox Show/Hide -->
                            <div style="margin-bottom: 20px; background: #f9f9f9; padding: 10px; border-radius: 5px;">
                                <label style="font-weight: bold; margin-bottom: 10px; display: block;">表示/非表示:</label>
                                <div style="display: flex; flex-wrap: wrap; gap: 15px;">
                                    <label style="margin-right: 15px;">
                                        <input type="checkbox" name="experience_groups[<?php echo $index; ?>][display]" value="1" <?php checked(isset($group['display']) && $group['display'] == 1); ?>>
                                        表示
                                    </label>
                                    <label style="margin-right: 15px;">
                                        <input type="checkbox" name="experience_groups[<?php echo $index; ?>][show_in_slide]" value="1" <?php checked(isset($group['show_in_slide']) && $group['show_in_slide'] == 1); ?>>
                                        スライドーに表示
                                    </label>
                                </div>
                            </div>

                            <!-- Checkbox Options -->
                            <div style="margin-bottom: 20px; background: #f9f9f9; padding: 10px; border-radius: 5px;">
                                <label style="font-weight: bold; margin-bottom: 10px; display: block;">おすすめ設定:</label>
                                <div style="display: flex; flex-wrap: wrap; gap: 15px;">
                                    <label style="margin-right: 15px;">
                                        <input type="radio" name="experience_groups[<?php echo $index; ?>][season]" value="spring" <?php checked(isset($group['spring']) && $group['spring'] == 1); ?>>
                                        春のおすすめ
                                    </label>
                                    <label style="margin-right: 15px;">
                                        <input type="radio" name="experience_groups[<?php echo $index; ?>][season]" value="summer" <?php checked(isset($group['summer']) && $group['summer'] == 1); ?>>
                                        夏のおすすめ
                                    </label>
                                    <label style="margin-right: 15px;">
                                        <input type="radio" name="experience_groups[<?php echo $index; ?>][season]" value="autumn" <?php checked(isset($group['autumn']) && $group['autumn'] == 1); ?>>
                                        秋のおすすめ
                                    </label>
                                    <label style="margin-right: 15px;">
                                        <input type="radio" name="experience_groups[<?php echo $index; ?>][season]" value="winter" <?php checked(isset($group['winter']) && $group['winter'] == 1); ?>>
                                        冬のおすすめ
                                    </label>
                                    <label style="margin-right: 15px;">
                                        <input type="radio" name="experience_groups[<?php echo $index; ?>][season]" value="common" <?php checked(isset($group['common']) && $group['common'] == 1); ?>>
                                        共通のおすすめ
                                    </label>
                                    <label>
                                        <input type="radio" name="experience_groups[<?php echo $index; ?>][season]" value="plan" <?php checked(isset($group['plan']) && $group['plan'] == 1); ?>>
                                        おすすめ宿泊プラン
                                    </label>
                                </div>
                            </div>
                            
                            <!-- Slide Image -->
                            <div style="margin: 20px 0; background: #f9f9f9; padding: 10px; border-radius: 5px;">
                                <label style="font-weight: bold; margin-bottom: 10px; display: block;">スライド画像 (1000x570):</label>
                                <input type="hidden" name="experience_groups[<?php echo $index; ?>][slide_image]" value="<?php echo esc_attr($group['slide_image']); ?>" class="experience-slide-image">
                                <div class="image-preview upload-image-container" style="margin: 10px auto; cursor: pointer; max-width: 400px; position: relative;">
                                    <?php if(!empty($group['slide_image'])): ?>
                                        <img src="<?php echo esc_url($group['slide_image']); ?>" style="width: 100%; height: auto;">
                                        <button type="button" class="remove-image button" style="position: absolute; top: 5px; right: 5px; background: #f44336; color: white; border: none; border-radius: 50%; width: 25px; height: 25px; line-height: 1; padding: 0; cursor: pointer;">×</button>
                                    <?php else: ?>
                                        <div class="upload-placeholder" style="width: 100%; height: 220px; background: #f0f0f0; border: 1px dashed #ccc; display: flex; justify-content: center; align-items: center;">
                                            <span>画像をアップロード</span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <!-- PC Title & SP Title -->
                            <div style="display: flex; gap: 20px; margin-bottom: 20px; background: #f9f9f9; padding: 10px; border-radius: 5px;">
                                <div style="flex: 1;">
                                    <label style="font-weight: bold; margin-bottom: 10px; display: block;">PCタイトル:</label>
                                    <textarea type="text" name="experience_groups[<?php echo $index; ?>][pc_title]" style="width: 100%"><?php echo esc_attr($group['pc_title']); ?></textarea>
                                </div>
                                <div style="flex: 1;">
                                    <label style="font-weight: bold; margin-bottom: 10px; display: block;">SPタイトル:</label>
                                    <textarea type="text" name="experience_groups[<?php echo $index; ?>][sp_title]" style="width: 100%"><?php echo esc_attr($group['sp_title']); ?></textarea>
                                </div>
                            </div>
                            
                            <!-- Additional Images -->
                            <div style="margin-bottom: 20px; background: #f9f9f9; padding: 10px; border-radius: 5px;">
                                <label style="font-weight: bold; margin-bottom: 10px; display: block;">コンテンツ画像 (1000x570):</label><br>
                                
                                <!-- Additional Image 1 -->
                                <div style="text-align: center; margin: 15px 0;">
                                    <input type="hidden" name="experience_groups[<?php echo $index; ?>][additional_images][]" value="<?php echo isset($group['additional_images'][0]) ? esc_attr($group['additional_images'][0]) : ''; ?>" class="experience-additional-image">
                                    <div class="image-preview upload-image-container" style="margin: 0 auto; cursor: pointer; max-width: 400px; position: relative;">
                                        <?php if(isset($group['additional_images'][0]) && !empty($group['additional_images'][0])): ?>
                                            <img src="<?php echo esc_url($group['additional_images'][0]); ?>" style="width: 100%; height: auto;">
                                            <button type="button" class="remove-image button" style="position: absolute; top: 5px; right: 5px; background: #f44336; color: white; border: none; border-radius: 50%; width: 25px; height: 25px; line-height: 1; padding: 0; cursor: pointer;">×</button>
                                        <?php else: ?>
                                            <div class="upload-placeholder" style="width: 100%; height: 220px; background: #f0f0f0; border: 1px dashed #ccc; display: flex; justify-content: center; align-items: center;">
                                                <span>画像をアップロード</span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <!-- Additional Images 2 & 3 -->
                                <div style="display: flex; justify-content: center; gap: 20px; margin-bottom: 15px;">
                                    <!-- Additional Image 2 -->
                                    <div style="width: 190px;">
                                        <input type="hidden" name="experience_groups[<?php echo $index; ?>][additional_images][]" value="<?php echo isset($group['additional_images'][1]) ? esc_attr($group['additional_images'][1]) : ''; ?>" class="experience-additional-image">
                                        <div class="image-preview upload-image-container" style="cursor: pointer; position: relative;">
                                            <?php if(isset($group['additional_images'][1]) && !empty($group['additional_images'][1])): ?>
                                                <img src="<?php echo esc_url($group['additional_images'][1]); ?>" style="width: 100%; height: auto;">
                                                <button type="button" class="remove-image button" style="position: absolute; top: 5px; right: 5px; background: #f44336; color: white; border: none; border-radius: 50%; width: 25px; height: 25px; line-height: 1; padding: 0; cursor: pointer;">×</button>
                                            <?php else: ?>
                                                <div class="upload-placeholder" style="width: 100%; height: 150px; background: #f0f0f0; border: 1px dashed #ccc; display: flex; justify-content: center; align-items: center;">
                                                    <span>画像をアップロード</span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <!-- Additional Image 3 -->
                                    <div style="width: 190px;">
                                        <input type="hidden" name="experience_groups[<?php echo $index; ?>][additional_images][]" value="<?php echo isset($group['additional_images'][2]) ? esc_attr($group['additional_images'][2]) : ''; ?>" class="experience-additional-image">
                                        <div class="image-preview upload-image-container" style="cursor: pointer; position: relative;">
                                            <?php if(isset($group['additional_images'][2]) && !empty($group['additional_images'][2])): ?>
                                                <img src="<?php echo esc_url($group['additional_images'][2]); ?>" style="width: 100%; height: auto;">
                                                <button type="button" class="remove-image button" style="position: absolute; top: 5px; right: 5px; background: #f44336; color: white; border: none; border-radius: 50%; width: 25px; height: 25px; line-height: 1; padding: 0; cursor: pointer;">×</button>
                                            <?php else: ?>
                                                <div class="upload-placeholder" style="width: 100%; height: 150px; background: #f0f0f0; border: 1px dashed #ccc; display: flex; justify-content: center; align-items: center;">
                                                    <span>画像をアップロード</span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Content -->
                            <div style="margin-bottom: 20px; background: #f9f9f9; padding: 10px; border-radius: 5px;">
                                <label style="font-weight: bold; margin-bottom: 10px; display: block;">コンテンツテキスト:</label>
                                <textarea name="experience_groups[<?php echo $index; ?>][content]" rows="4" style="width: 100%"><?php echo esc_textarea($group['content']); ?></textarea>
                            </div>
                            
                            <!-- Link Title & URL with Date Fields -->
                            <div style="margin-bottom: 20px; background: #f9f9f9; padding: 10px; border-radius: 5px;">
                                <div style="display: flex; gap: 20px; margin-bottom: 20px;">
                                    <div style="flex: 1;">
                                        <label style="font-weight: bold; margin-bottom: 10px; display: block;">公開前のURLタイトル:</label>
                                        <textarea type="text" name="experience_groups[<?php echo $index; ?>][before_url_title]" value="<?php echo esc_attr($group['before_url_title']); ?>" style="width: 100%"><?php echo esc_textarea($group['before_url_title']); ?></textarea>
                                    </div>
                                    <div style="flex: 1;">
                                        <label style="font-weight: bold; margin-bottom: 10px; display: block;">公開中のURLタイトル:</label>
                                        <textarea type="text" name="experience_groups[<?php echo $index; ?>][public_url_title]" value="<?php echo isset($group['public_url_title']) ? esc_attr($group['public_url_title']) : ''; ?>" style="width: 100%"><?php echo isset($group['public_url_title']) ? esc_textarea($group['public_url_title']) : ''; ?></textarea>
                                    </div>
                                    <div style="flex: 1;">
                                        <label style="font-weight: bold; margin-bottom: 10px; display: block;">公開後のURLタイトル:</label>
                                        <textarea type="text" name="experience_groups[<?php echo $index; ?>][after_url_title]" value="<?php echo isset($group['after_url_title']) ? esc_attr($group['after_url_title']) : ''; ?>" style="width: 100%"><?php echo isset($group['after_url_title']) ? esc_textarea($group['after_url_title']) : ''; ?></textarea>
                                    </div>
                                </div>
                                
                                <div style="margin-bottom: 20px;">
                                    <label style="font-weight: bold; margin-bottom: 10px; display: block;">リンクURL:</label>
                                    <input type="text" name="experience_groups[<?php echo $index; ?>][link]" value="<?php echo esc_attr($group['link']); ?>" style="width: 100%">
                                </div>
                                
                                <div style="display: flex; gap: 20px;">
                                    <div style="flex: 1;">
                                        <label style="font-weight: bold; margin-bottom: 10px; display: block;">公開日付:</label>
                                        <input type="date" name="experience_groups[<?php echo $index; ?>][start_date]" value="<?php echo isset($group['start_date']) ? esc_attr($group['start_date']) : ''; ?>" style="width: 100%">
                                    </div>
                                    <div style="flex: 1;">
                                        <label style="font-weight: bold; margin-bottom: 10px; display: block;">終了日付:</label>
                                        <input type="date" name="experience_groups[<?php echo $index; ?>][end_date]" value="<?php echo isset($group['end_date']) ? esc_attr($group['end_date']) : ''; ?>" style="width: 100%">
                                    </div>
                                </div>
                            </div>
                            
                            <button type="button" class="remove-group button">削除</button>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Area Groups Section -->
        <div style="margin-bottom: 20px; background: #f9f9f9; padding: 10px; border-radius: 5px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; margin-top: 30px;">
                <h3 style="margin: 0;">周辺の見所</h3>
                <button type="button" id="add_area_group" class="button button-primary">周辺の見所を追加</button>
            </div>
            
            <!-- Thêm layout 2 cột tương tự như Experience -->
            <div style="display: flex; gap: 20px;">
                <!-- Left Column - Vertical Slide -->
                <div style="width: 300px;">

                <?php
                // ********************
                //     MARK:Area Vertical Slide
                // ********************
                ?>

                    <!-- Area Vertical Slide -->
                    <div class="area-slide-container" style="margin-bottom: 15px; border: 1px solid #eee; padding: 10px; border-radius: 5px;">
                        <h5 style="margin-top: 0; background: #2196F3; color: white; padding: 5px 10px; border-radius: 3px;">周辺の見所</h5>
                        <div class="area-vertical-slides" style="display: flex; flex-direction: column; gap: 10px; padding: 5px 0; min-height: 50px;">
                            <?php 
                            foreach ($area_groups as $index => $group): 
                                if(isset($group['display']) && $group['display'] == 1):
                            ?>
                            <div class="area-vertical-slide-item" data-index="<?php echo $index; ?>" style="cursor: pointer; position: relative; transition: all 0.3s ease; display: flex; align-items: center; gap: 10px;">
                                <?php if(!empty($group['image'])): ?>
                                    <img src="<?php echo esc_url($group['image']); ?>" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                                <?php else: ?>
                                    <div style="width: 60px; height: 60px; background: #eee; border-radius: 5px; display: flex; justify-content: center; align-items: center; font-size: 10px;">画像なし</div>
                                <?php endif; ?>
                                <div style="font-size: 12px; font-weight: bold; flex: 1; overflow: hidden; text-overflow: ellipsis;">
                                <?php echo esc_textarea($group['name']); ?>
                                </div>
                                <div class="area-slide-sort-handle" style="cursor: move; margin-left: 5px;">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 6H16M8 12H16M8 18H16" stroke="#666" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                </div>
                            </div>
                            <?php 
                                endif;
                            endforeach; 
                            ?>
                        </div>
                        <input type="hidden" name="area_order" id="area_order" value="<?php echo esc_attr(get_post_meta($post->ID, '_area_order', true)); ?>">
                    </div>
                </div>
                
                <!-- Right Column - All Slides Preview -->
                <div style="flex: 1;">
                    <!-- Area Slide Preview -->
                    <div class="area-slide-preview" style="margin-bottom: 30px; border: 1px solid #ddd; padding: 20px; background: #f9f9f9; border-radius: 5px;">
                        <div class="area-slides" style="display: flex; flex-wrap: nowrap; overflow-x: auto; gap: 15px; padding: 10px 0;">
                            <?php foreach ($area_groups as $index => $group): ?>
                            <div class="area-slide-item" data-index="<?php echo $index; ?>" style="flex: 0 0 200px; cursor: pointer; position: relative; transition: all 0.3s ease; opacity: <?php echo $index === 0 ? '1' : '0.5'; ?>">
                                <?php if(!empty($group['image'])): ?>
                                    <img src="<?php echo esc_url($group['image']); ?>" style="width: 100%; height: 120px; object-fit: cover; border-radius: 5px;">
                                <?php else: ?>
                                    <div style="width: 100%; height: 120px; background: #eee; border-radius: 5px; display: flex; justify-content: center; align-items: center;">画像をアップロード</div>
                                <?php endif; ?>
                                <div style="padding: 8px 0; text-align: center; font-weight: bold; font-size: 13px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                <?php echo esc_textarea($group['name']); ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <?php 
                    // ********************
                    //     MARK:Input Range
                    // ********************
                    ?>
                    <!-- Input Ranges -->
                    <div id="area_groups">
                        <?php foreach ($area_groups as $index => $group): ?>
                        <div class="area-group" style="border: 1px solid #ccc; padding: 10px; margin: 10px 0; display: <?php echo $index === 0 ? 'block' : 'none'; ?>;" data-index="<?php echo $index; ?>">
                            
                            <!-- Checkbox Show/Hide -->
                            <div style="margin-bottom: 20px; background: #f9f9f9; padding: 10px; border-radius: 5px;">
                                <label style="font-weight: bold; margin-bottom: 10px; display: block;">表示/非表示:</label>
                                <div style="display: flex; flex-wrap: wrap; gap: 15px;">
                                    <label style="margin-right: 15px;">
                                        <input type="checkbox" name="area_groups[<?php echo $index; ?>][display]" value="1" <?php checked(isset($group['display']) && $group['display'] == 1); ?>>
                                        表示
                                    </label>
                                </div>
                            </div>

                            <!-- Slide Image -->
                            <div style="margin: 20px 0; background: #f9f9f9; padding: 10px; border-radius: 5px;">
                                <label style="font-weight: bold; margin-bottom: 10px; display: block;">スライド画像 (1000x570):</label>
                                <input type="hidden" name="area_groups[<?php echo $index; ?>][image]" value="<?php echo esc_attr($group['image']); ?>" class="area-image">
                                <div class="image-preview upload-image-container" style="margin: 10px auto; cursor: pointer; max-width: 300px; position: relative;">
                                    <?php if(!empty($group['image'])): ?>
                                        <img src="<?php echo esc_url($group['image']); ?>" style="width: 100%; height: auto;">
                                        <button type="button" class="remove-image button" style="position: absolute; top: 5px; right: 5px; background: #f44336; color: white; border: none; border-radius: 50%; width: 25px; height: 25px; line-height: 1; padding: 0; cursor: pointer;">×</button>
                                    <?php else: ?>
                                        <div class="upload-placeholder" style="width: 100%; height: 180px; background: #f0f0f0; border: 1px dashed #ccc; display: flex; justify-content: center; align-items: center;">
                                            <span>画像をアップロード</span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <!-- Title & Content -->
                            <div style="margin-bottom: 20px;">
                                <label style="font-weight: bold; margin-bottom: 10px; display: block;">名所:</label>
                                <textarea type="text" name="area_groups[<?php echo $index; ?>][name]" style="width: 100%; margin-bottom: 20px;"><?php echo esc_textarea($group['name']); ?></textarea>
                                
                                <label style="font-weight: bold; margin-bottom: 10px; display: block;">コンテンツ:</label>
                                <textarea name="area_groups[<?php echo $index; ?>][content]" rows="4" style="width: 100%"><?php echo esc_textarea($group['content']); ?></textarea>
                            </div>
                            
                            <!-- Link -->
                            <div style="margin-bottom: 20px;">
                                <label style="font-weight: bold; margin-bottom: 10px; display: block;">リンク:</label>
                                <input type="text" name="area_groups[<?php echo $index; ?>][link]" value="<?php echo esc_attr($group['link']); ?>" style="width: 100%">
                            </div>
                            
                            <button type="button" class="remove-group button">削除</button>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    jQuery(document).ready(function($) {
        // Biến để theo dõi index hiện tại
        var currentExperienceIndex = 0;
        var experienceGroupCount = $('.experience-group').length;
        var currentAreaIndex = 0;
        var areaGroupCount = $('.area-group').length;
        
        // Màu nền cho item được chọn - đậm hơn
        var selectedBackgroundColor = '#e0f0ff';
        // Màu nền khi hover - nhạt hơn
        var hoverBackgroundColor = '#f0f8ff';
        
        // Khôi phục trình tự đã lưu cho area_groups nếu có
        var savedAreaOrder = $('#area_order').val();
        if (savedAreaOrder && savedAreaOrder.trim() !== '') {
            try {
                var areaOrder = JSON.parse(savedAreaOrder);
                if (Array.isArray(areaOrder) && areaOrder.length > 0) {
                    // Sắp xếp lại các nhóm theo trình tự đã lưu
                    var $areaGroups = $('#area_groups');
                    var $areaGroupItems = $areaGroups.children('.area-group').detach();
                    
                    areaOrder.forEach(function(index) {
                        $areaGroups.append($areaGroupItems.filter('[data-index="' + index + '"]'));
                    });
                    
                    // Cập nhật slide preview
                    updateAreaSlidePreview();
                }
            } catch (e) {
                console.error('Error parsing saved area order:', e);
            }
        }
        
        // Xử lý experience slide preview
        $(document).on('click', '.experience-slide-item', function() {
            var index = $(this).data('index');
            currentExperienceIndex = index;
            
            // Hiển thị nhóm được chọn và ẩn các nhóm khác
            $('.experience-group').hide();
            $('.experience-group[data-index="' + index + '"]').show();
            
            // Làm mờ các slide khác và làm nổi bật slide được chọn
            $('.experience-slide-item').css('opacity', 0.5);
            $('.experience-slide-item[data-index="' + index + '"]').css('opacity', 1);
            
            // Cập nhật trạng thái của tất cả seasonal slide items
            updateSeasonalSlideItemsState();
            
            // Cuộn đến phần nhập liệu
            $('html, body').animate({
                scrollTop: $('.experience-group[data-index="' + index + '"]').offset().top - 50
            }, 500);
        });
        
        // Xử lý khi click vào seasonal slide item
        $(document).on('click', '.seasonal-slide-item', function() {
            var index = $(this).data('index');
            currentExperienceIndex = index;
            
            // Hiển thị nhóm được chọn và ẩn các nhóm khác
            $('.experience-group').hide();
            $('.experience-group[data-index="' + index + '"]').show();
            
            // Làm mờ các slide khác và làm nổi bật slide được chọn trong experience-slide-preview
            $('.experience-slide-item').css('opacity', 0.5);
            $('.experience-slide-item[data-index="' + index + '"]').css('opacity', 1);
            
            // Cập nhật trạng thái của tất cả seasonal slide items
            updateSeasonalSlideItemsState();
            
            // Cuộn đến phần nhập liệu
            $('html, body').animate({
                scrollTop: $('.experience-group[data-index="' + index + '"]').offset().top - 50
            }, 500);
        });
        
        // Hàm cập nhật trạng thái của tất cả seasonal slide items
        function updateSeasonalSlideItemsState() {
            // Đặt lại tất cả các seasonal slide items về trạng thái bình thường
            $('.seasonal-slide-item').css({
                'background-color': '',
                'padding': '',
                'border-radius': ''
            });
            
            // Làm nổi bật seasonal slide item được chọn
            $('.seasonal-slide-item[data-index="' + currentExperienceIndex + '"]').css({
                'background-color': selectedBackgroundColor,
                'padding': '5px',
                'border-radius': '5px'
            });
        }
        
        // Thêm CSS cho seasonal-slide-item khi hover
        $(document).on('mouseenter', '.seasonal-slide-item', function() {
            // Nếu không phải là item đang được chọn, thì thay đổi màu nền khi hover
            if ($(this).data('index') != currentExperienceIndex) {
                $(this).css({
                    'background-color': hoverBackgroundColor,
                    'border-radius': '5px'
                });
            }
        });
        
        $(document).on('mouseleave', '.seasonal-slide-item', function() {
            // Nếu không phải là item đang được chọn, thì trở về trạng thái bình thường
            if ($(this).data('index') != currentExperienceIndex) {
                $(this).css({
                    'background-color': '',
                    'border-radius': ''
                });
            }
        });
        
        // Khởi tạo trạng thái ban đầu
        updateSeasonalSlideItemsState();
        
        // Thêm Experience Group
        $('#add_experience_group').on('click', function() {
            var index = experienceGroupCount;
            experienceGroupCount++;
            currentExperienceIndex = index;
            
            // Tạo HTML cho nhóm mới
            var newGroup = `
                <div class="experience-group" style="border: 1px solid #ccc; padding: 10px; margin: 10px 0;" data-index="${index}">
                    
                    <!-- Checkbox Show/Hide -->
                    <div style="margin-bottom: 20px; background: #f9f9f9; padding: 10px; border-radius: 5px;">
                        <label style="font-weight: bold; margin-bottom: 10px; display: block;">表示/非表示:</label>
                        <div style="display: flex; flex-wrap: wrap; gap: 15px;">
                            <label style="margin-right: 15px;">
                                <input type="checkbox" name="experience_groups[${index}][display]" value="1" checked>
                                表示
                            </label>
                            <label style="margin-right: 15px;">
                                <input type="checkbox" name="experience_groups[${index}][show_in_slide]" value="1">
                                スライドーに表示
                            </label>
                        </div>
                    </div>
                    
                    <!-- Radio Options -->
                    <div style="margin-bottom: 20px; background: #f9f9f9; padding: 10px; border-radius: 5px;">
                        <label style="font-weight: bold; margin-bottom: 10px; display: block;">おすすめ設定:</label>
                        <div style="display: flex; flex-wrap: wrap; gap: 15px;">
                            <label style="margin-right: 15px;">
                                <input type="radio" name="experience_groups[${index}][season]" value="spring">
                                春のおすすめ
                            </label>
                            <label style="margin-right: 15px;">
                                <input type="radio" name="experience_groups[${index}][season]" value="summer">
                                夏のおすすめ
                            </label>
                            <label style="margin-right: 15px;">
                                <input type="radio" name="experience_groups[${index}][season]" value="autumn">
                                秋のおすすめ
                            </label>
                            <label style="margin-right: 15px;">
                                <input type="radio" name="experience_groups[${index}][season]" value="winter">
                                冬のおすすめ
                            </label>
                            <label style="margin-right: 15px;">
                                <input type="radio" name="experience_groups[${index}][season]" value="common">
                                共通のおすすめ
                            </label>
                            <label>
                                <input type="radio" name="experience_groups[${index}][season]" value="plan">
                                おすすめ宿泊プラン
                            </label>
                        </div>
                    </div>
                    
                    <!-- Slide Image -->
                    <div style="margin: 20px 0; background: #f9f9f9; padding: 10px; border-radius: 5px;">
                        <label style="font-weight: bold; margin-bottom: 10px; display: block;">スライド画像 (1000x570):</label><br>
                        <input type="hidden" name="experience_groups[${index}][slide_image]" value="" class="experience-slide-image">
                        <div class="image-preview upload-image-container" style="margin: 10px auto; cursor: pointer; max-width: 400px; position: relative;">
                            <div class="upload-placeholder" style="width: 100%; height: 220px; background: #f0f0f0; border: 1px dashed #ccc; display: flex; justify-content: center; align-items: center;">
                                <span>画像をアップロード</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- PC Title & SP Title -->
                    <div style="display: flex; gap: 20px; margin-bottom: 20px; background: #f9f9f9; padding: 10px; border-radius: 5px;">
                        <div style="flex: 1;">
                            <label style="font-weight: bold; margin-bottom: 10px; display: block;">PCタイトル:</label><br>
                            <input type="text" name="experience_groups[${index}][pc_title]" value="" style="width: 100%">
                        </div>
                        <div style="flex: 1;">
                            <label style="font-weight: bold; margin-bottom: 10px; display: block;">SPタイトル:</label><br>
                            <input type="text" name="experience_groups[${index}][sp_title]" value="" style="width: 100%">
                        </div>
                    </div>
                    
                    <!-- Additional Images -->
                    <div style="margin-bottom: 20px; background: #f9f9f9; padding: 10px; border-radius: 5px;">
                        <label style="font-weight: bold; margin-bottom: 10px; display: block;">コンテンツ画像 (1000x570):</label><br>
                        
                        <!-- Additional Image 1 -->
                        <div style="text-align: center; margin: 15px 0;">
                            <input type="hidden" name="experience_groups[${index}][additional_images][]" value="" class="experience-additional-image">
                            <div class="image-preview upload-image-container" style="margin: 0 auto; cursor: pointer; max-width: 400px; position: relative;">
                                <div class="upload-placeholder" style="width: 100%; height: 220px; background: #f0f0f0; border: 1px dashed #ccc; display: flex; justify-content: center; align-items: center;">
                                    <span>画像をアップロード</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Additional Images 2 & 3 -->
                        <div style="display: flex; justify-content: center; gap: 20px; margin-bottom: 15px;">
                            <!-- Additional Image 2 -->
                            <div style="width: 190px;">
                                <input type="hidden" name="experience_groups[${index}][additional_images][]" value="" class="experience-additional-image">
                                <div class="image-preview upload-image-container" style="cursor: pointer; position: relative;">
                                    <div class="upload-placeholder" style="width: 100%; height: 150px; background: #f0f0f0; border: 1px dashed #ccc; display: flex; justify-content: center; align-items: center;">
                                        <span>画像をアップロード</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Additional Image 3 -->
                            <div style="width: 190px;">
                                <input type="hidden" name="experience_groups[${index}][additional_images][]" value="" class="experience-additional-image">
                                <div class="image-preview upload-image-container" style="cursor: pointer; position: relative;">
                                    <div class="upload-placeholder" style="width: 100%; height: 150px; background: #f0f0f0; border: 1px dashed #ccc; display: flex; justify-content: center; align-items: center;">
                                        <span>画像をアップロード</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div style="margin-bottom: 20px; background: #f9f9f9; padding: 10px; border-radius: 5px;">
                        <label style="font-weight: bold; margin-bottom: 10px; display: block;">コンテンツテキスト:</label><br>
                        <textarea name="experience_groups[${index}][content]" rows="4" style="width: 100%"></textarea>
                    </div>
                    
                    <!-- Link Title & URL with Date Fields -->
                    <div style="margin-bottom: 20px; background: #f9f9f9; padding: 10px; border-radius: 5px;">
                        <div style="display: flex; gap: 20px; margin-bottom: 10px;">
                            <div style="flex: 1;">
                                <label style="font-weight: bold; margin-bottom: 10px; display: block;">公開前のURLタイトル:</label><br>
                                <textarea type="text" name="experience_groups[${index}][before_url_title]" style="width: 100%"></textarea>
                            </div>
                            <div style="flex: 1;">
                                <label style="font-weight: bold; margin-bottom: 10px; display: block;">公開中のURLタイトル:</label><br>
                                <textarea type="text" name="experience_groups[${index}][public_url_title]" style="width: 100%"></textarea>
                            </div>
                            <div style="flex: 1;">
                                <label style="font-weight: bold; margin-bottom: 10px; display: block;">公開後のURLタイトル:</label><br>
                                <textarea type="text" name="experience_groups[${index}][after_url_title]" style="width: 100%"></textarea>
                            </div>
                        </div>
                        
                        <div style="margin-bottom: 10px;">
                            <label style="font-weight: bold; margin-bottom: 10px; display: block;">リンクURL:</label><br>
                            <input type="text" name="experience_groups[${index}][link]" style="width: 100%">
                        </div>
                        
                        <div style="display: flex; gap: 20px;">
                            <div style="flex: 1;">
                                <label style="font-weight: bold; margin-bottom: 10px; display: block;">公開日付:</label><br>
                                <input type="date" name="experience_groups[${index}][start_date]" style="width: 100%">
                            </div>
                            <div style="flex: 1;">
                                <label style="font-weight: bold; margin-bottom: 10px; display: block;">終了日付:</label><br>
                                <input type="date" name="experience_groups[${index}][end_date]" style="width: 100%">
                            </div>
                        </div>
                    </div>
                    
                    <button type="button" class="remove-group button">削除</button>
                </div>
            `;
            
            // Thêm nhóm mới vào DOM
            $('#experience_groups').append(newGroup);
            
            // Ẩn tất cả các nhóm khác và hiển thị nhóm mới
            $('.experience-group').hide();
            $('.experience-group[data-index="' + index + '"]').show();
            
            // Cập nhật slide preview
            updateSlidePreview();
            
            // Cuộn đến nhóm mới
            $('html, body').animate({
                scrollTop: $('.experience-group[data-index="' + index + '"]').offset().top - 100
            }, 500);
        });
        
        // Thêm Area Group
        $('#add_area_group').on('click', function() {
            var index = areaGroupCount;
            areaGroupCount++;
            currentAreaIndex = index;
            
            // Tạo HTML cho nhóm mới
            var newGroup = `
                <div class="area-group" style="border: 1px solid #ccc; padding: 10px; margin: 10px 0;" data-index="${index}">
                    
                    <!-- Checkbox Show/Hide -->
                    <div style="margin-bottom: 20px; background: #f9f9f9; padding: 10px; border-radius: 5px;">
                        <label style="font-weight: bold; margin-bottom: 10px; display: block;">表示/非表示:</label>
                        <div style="display: flex; flex-wrap: wrap; gap: 15px;">
                            <label style="margin-right: 15px;">
                                <input type="checkbox" name="area_groups[${index}][display]" value="1" checked>
                                表示
                            </label>
                        </div>
                    </div>
                    
                    <!-- Area Image -->
                    <div style="margin: 20px 0; background: #f9f9f9; padding: 10px; border-radius: 5px;">
                        <label style="font-weight: bold; margin-bottom: 10px; display: block;">スライド画像 (1000x570):</label>
                        <input type="hidden" name="area_groups[${index}][image]" value="" class="area-image">
                        <div class="image-preview upload-image-container" style="margin: 10px auto; cursor: pointer; max-width: 300px; position: relative;">
                            <div class="upload-placeholder" style="width: 100%; height: 180px; background: #f0f0f0; border: 1px dashed #ccc; display: flex; justify-content: center; align-items: center;">
                                <span>画像をアップロード</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Title & Content -->
                    <div style="margin-bottom: 20px;">
                        <label style="font-weight: bold; margin-bottom: 10px; display: block;">名所:</label>
                        <textarea type="text" name="area_groups[${index}][name]" style="width: 100%; margin-bottom: 20px;"></textarea>
                        
                        <label style="font-weight: bold; margin-bottom: 10px; display: block;">コンテンツ:</label>
                        <textarea name="area_groups[${index}][content]" rows="4" style="width: 100%"></textarea>
                    </div>
                    
                    <!-- Link -->
                    <div style="margin-bottom: 20px;">
                        <label style="font-weight: bold; margin-bottom: 10px; display: block;">リンク:</label>
                        <input type="text" name="area_groups[${index}][link]" value="" style="width: 100%">
                    </div>
                    
                    <button type="button" class="remove-group button">削除</button>
                </div>
            `;
            
            // Thêm nhóm mới vào DOM
            $('#area_groups').append(newGroup);
            
            // Ẩn tất cả các nhóm khác và hiển thị nhóm mới
            $('.area-group').hide();
            $('.area-group[data-index="' + index + '"]').show();
            
            // Cập nhật slide preview
            updateAreaSlidePreview();
            
            // Cuộn đến nhóm mới
            $('html, body').animate({
                scrollTop: $('.area-group[data-index="' + index + '"]').offset().top - 100
            }, 500);
        });
        
        // Xóa nhóm
        $(document).on('click', '.remove-group', function() {
            var group = $(this).closest('.area-group, .experience-group');
            var isArea = group.hasClass('area-group');
            var index = group.data('index');
            
            // Xóa nhóm
            group.remove();
            
            if (isArea) {
                // Nếu đang xóa nhóm hiện tại, chuyển về nhóm đầu tiên
                if (index == currentAreaIndex) {
                    currentAreaIndex = 0;
                    $('.area-group:first').show();
                }
                
                // Cập nhật slide preview
                updateAreaSlidePreview();
            } else {
                // Nếu đang xóa nhóm hiện tại, chuyển về nhóm đầu tiên
                if (index == currentExperienceIndex) {
                    currentExperienceIndex = 0;
                    $('.experience-group:first').show();
                }
                
                // Cập nhật slide preview
                updateSlidePreview();
            }
        });
        
        // Xử lý khi tải lên hình ảnh
        $(document).on('click', '.upload-image-container', function() {
            var container = $(this);
            var input = container.prev('input[type="hidden"]');
            var isSlideImage = input.hasClass('experience-slide-image');
            var isAreaImage = input.hasClass('area-image');
            var groupIndex = container.closest('.experience-group, .area-group').data('index');
            
            var image = wp.media({
                title: 'Chọn hoặc tải lên hình ảnh',
                multiple: false
            }).open().on('select', function() {
                var uploaded_image = image.state().get('selection').first();
                var image_url = uploaded_image.toJSON().url;
                
                // Cập nhật giá trị input
                input.val(image_url);
                
                // Cập nhật hiển thị hình ảnh
                if (container.find('img').length) {
                    container.find('img').attr('src', image_url);
                } else {
                    container.html('<img src="' + image_url + '" style="width: 100%; height: auto;"><button type="button" class="remove-image button" style="position: absolute; top: 5px; right: 5px; background: #f44336; color: white; border: none; border-radius: 50%; width: 25px; height: 25px; line-height: 1; padding: 0; cursor: pointer;">×</button>');
                }
                
                // Cập nhật slide preview
                if (isSlideImage) {
                    updateSlidePreview();
                } else if (isAreaImage) {
                    updateAreaSlidePreview();
                }
            });
        });
        
        // Xóa hình ảnh
        $(document).on('click', '.remove-image', function(e) {
            e.stopPropagation();
            var container = $(this).parent();
            var input = container.prev('input[type="hidden"]');
            var isSlideImage = input.hasClass('experience-slide-image');
            var isAreaImage = input.hasClass('area-image');
            
            // Xóa giá trị input
            input.val('');
            
            // Cập nhật hiển thị
            if (container.hasClass('upload-image-container')) {
                var height = container.find('img').height() || 220;
                container.html('<div class="upload-placeholder" style="width: 100%; height: ' + height + 'px; background: #f0f0f0; border: 1px dashed #ccc; display: flex; justify-content: center; align-items: center;"><span>Nhấn để tải ảnh lên</span></div>');
            }
            
            // Cập nhật slide preview
            if (isSlideImage) {
                updateSlidePreview();
            } else if (isAreaImage) {
                updateAreaSlidePreview();
            }
        });
        
        // Hàm cập nhật toàn bộ experience slide preview
        function updateSlidePreview() {
            var slidePreviewHTML = '';
            
            // Tạo HTML cho mỗi slide
            $('.experience-group').each(function(index) {
                var groupIndex = $(this).data('index');
                var slideImage = $(this).find('.experience-slide-image').val();
                var pcTitle = $(this).find('textarea[name*="[pc_title]"]').val() || ''; // Sử dụng textarea thay vì input
                var showInSlide = $(this).find('input[name*="[show_in_slide]"]:checked').length > 0;
                
                // Kiểm tra các checkbox
                var spring = $(this).find('input[name*="[spring]"]:checked').length > 0;
                var summer = $(this).find('input[name*="[summer]"]:checked').length > 0;
                var autumn = $(this).find('input[name*="[autumn]"]:checked').length > 0;
                var winter = $(this).find('input[name*="[winter]"]:checked').length > 0;
                var common = $(this).find('input[name*="[common]"]:checked').length > 0;
                var plan = $(this).find('input[name*="[plan]"]:checked').length > 0;
                
                // Tạo badges HTML
                var badgesHTML = '';
                if (spring) badgesHTML += '<span style="background: #ffb7c5; color: #fff; font-size: 10px; padding: 2px 5px; border-radius: 3px;">春</span>';
                if (summer) badgesHTML += '<span style="background: #4dabff; color: #fff; font-size: 10px; padding: 2px 5px; border-radius: 3px;">夏</span>';
                if (autumn) badgesHTML += '<span style="background: #ff7e45; color: #fff; font-size: 10px; padding: 2px 5px; border-radius: 3px;">秋</span>';
                if (winter) badgesHTML += '<span style="background: #a0d8ef; color: #fff; font-size: 10px; padding: 2px 5px; border-radius: 3px;">冬</span>';
                if (common) badgesHTML += '<span style="background: #8bc34a; color: #fff; font-size: 10px; padding: 2px 5px; border-radius: 3px;">共通</span>';
                if (plan) badgesHTML += '<span style="background: #9c27b0; color: #fff; font-size: 10px; padding: 2px 5px; border-radius: 3px;">宿泊</span>';
                
                // Kiểm tra xem đây có phải là slide hiện tại không
                var isActive = (groupIndex == currentExperienceIndex);
                
                // Tạo HTML cho slide với dấu tick xanh nếu showInSlide = true
                slidePreviewHTML += `
                    <div class="experience-slide-item" data-index="${groupIndex}" style="flex: 0 0 200px; cursor: pointer; position: relative; transition: all 0.3s ease; opacity: ${isActive ? 1 : 0.5};">
                        <div style="position: relative;">
                            ${slideImage ? 
                                `<img src="${slideImage}" style="width: 100%; height: 120px; object-fit: cover; border-radius: 5px;">` : 
                                `<div style="width: 100%; height: 120px; background: #eee; border-radius: 5px; display: flex; justify-content: center; align-items: center;">画像なし</div>`
                            }
                            <div class="slide-badges" style="position: absolute; top: 5px; right: 5px; display: flex; flex-direction: column; gap: 3px;">
                                ${badgesHTML}
                            </div>
                            ${showInSlide ? 
                                `<div style="position: absolute; top: 5px; left: 5px; background: #4CAF50; color: white; border-radius: 50%; width: 25px; height: 25px; display: flex; justify-content: center; align-items: center; font-size: 14px;">✓</div>` : 
                                ''
                            }
                        </div>
                        <div class="slide-title" style="padding: 8px 0; text-align: center; font-weight: bold; font-size: 13px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            ${pcTitle}
                        </div>
                    </div>
                `;
            });
            
            // Cập nhật HTML
            $('.experience-slides').html(slidePreviewHTML);
        }

        <?php
        // ********************
        //     MARK:Update Area Slide Preview
        // ********************
        ?>
        
        // Hàm cập nhật toàn bộ area slide preview
        function updateAreaSlidePreview() {
            var slidePreviewHTML = '';
            var verticalSlideHTML = '';
            
            // Tạo HTML cho mỗi slide
            $('.area-group').each(function(index) {
                var groupIndex = $(this).data('index');
                var slideImage = $(this).find('.area-image').val();
                var name = $(this).find('input[name*="[name]"]').val() || $(this).find('textarea[name*="[name]"]').val() || '';
                var isDisplayed = $(this).find('input[name*="[display]"]').is(':checked');
                
                // Kiểm tra xem đây có phải là slide hiện tại không
                var isActive = (groupIndex == currentAreaIndex);
                
                // Tạo HTML cho slide ngang (hiển thị tất cả để quản lý)
                slidePreviewHTML += `
                    <div class="area-slide-item" data-index="${groupIndex}" style="flex: 0 0 200px; cursor: pointer; position: relative; transition: all 0.3s ease; opacity: ${isActive ? 1 : 0.5};">
                        ${slideImage ? 
                            `<img src="${slideImage}" style="width: 100%; height: 120px; object-fit: cover; border-radius: 5px;">` : 
                            `<div style="width: 100%; height: 120px; background: #eee; border-radius: 5px; display: flex; justify-content: center; align-items: center;">画像なし</div>`
                        }
                        <div class="slide-title" style="padding: 8px 0; text-align: center; font-weight: bold; font-size: 13px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            ${name}
                        </div>
                    </div>
                `;
                
                // Chỉ cần tích "表示" là hiển thị trong slide dọc
                if (isDisplayed) {
                    verticalSlideHTML += `
                        <div class="area-vertical-slide-item" data-index="${groupIndex}" style="cursor: pointer; position: relative; transition: all 0.3s ease; display: flex; align-items: center; gap: 10px; ${isActive ? 'background-color: ' + selectedBackgroundColor + '; padding: 5px; border-radius: 5px;' : ''}">
                            ${slideImage ? 
                                `<img src="${slideImage}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">` : 
                                `<div style="width: 60px; height: 60px; background: #eee; border-radius: 5px; display: flex; justify-content: center; align-items: center; font-size: 10px;">画像なし</div>`
                            }
                            <div style="font-size: 12px; font-weight: bold; flex: 1; overflow: hidden; text-overflow: ellipsis;">
                                ${name}
                            </div>
                            <div class="area-slide-sort-handle" style="cursor: move; margin-left: 5px;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 6H16M8 12H16M8 18H16" stroke="#666" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>
                        </div>
                    `;
                }
            });
            
            // Cập nhật HTML
            $('.area-slides').html(slidePreviewHTML);
            $('.area-vertical-slides').html(verticalSlideHTML);
            
            // Khởi tạo sortable cho area vertical slides
            initAreaSortable();
        }
        
        // Hàm khởi tạo sortable cho area vertical slides
        function initAreaSortable() {
            // Hủy sortable cũ nếu có
            if ($('.area-vertical-slides').hasClass('ui-sortable')) {
                $('.area-vertical-slides').sortable('destroy');
            }
            
            // Khởi tạo sortable
            $('.area-vertical-slides').sortable({
                handle: '.area-slide-sort-handle',
                axis: 'y', // Chỉ cho phép kéo theo chiều dọc
                cursor: 'move', // Thay đổi cursor khi kéo
                opacity: 0.7, // Làm mờ item khi đang kéo
                tolerance: 'pointer', // Dùng vị trí con trỏ để xác định vị trí đặt
                containment: '.area-vertical-slides', // Hạn chế phạm vi kéo
                update: function(event, ui) {
                    // Lấy thứ tự mới
                    var newOrder = $(this).sortable('toArray', {attribute: 'data-index'}).map(Number);
                    console.log('New area order:', newOrder);
                    
                    // Cập nhật giá trị input hidden
                    $('#area_order').val(JSON.stringify(newOrder));
                    
                    // Cập nhật lại giao diện theo thứ tự mới
                    var $areaGroups = $('#area_groups');
                    var $areaGroupItems = $areaGroups.children('.area-group').detach();
                    
                    // Sắp xếp lại các nhóm theo thứ tự mới
                    newOrder.forEach(function(index) {
                        $areaGroups.append($areaGroupItems.filter('[data-index="' + index + '"]'));
                    });
                    
                    // Cập nhật lại slide preview
                    updateAreaSlidePreview();
                    
                    // Thêm hiệu ứng để người dùng biết đã lưu thành công
                    ui.item.css('background-color', '#e8f5e9').delay(500).queue(function(next){
                        $(this).css('background-color', '');
                        next();
                    });
                }
            });
            
            // Khởi tạo area_order nếu trống
            var currentAreaOrder = $('#area_order').val();
            if (!currentAreaOrder || currentAreaOrder.trim() === '' || currentAreaOrder === '[]') {
                var newOrder = $('.area-vertical-slides .area-vertical-slide-item').map(function() {
                    return parseInt($(this).data('index'));
                }).get();
                if (newOrder.length > 0) {
                    $('#area_order').val(JSON.stringify(newOrder));
                    console.log('Initialized area_order:', newOrder);
                }
            }
        }
        
        // Khởi tạo sortable ngay khi trang tải xong
        initAreaSortable();
        
        // Theo dõi thay đổi tên và cập nhật area slide preview
        $(document).on('input', 'input[name*="area_groups"][name*="[name]"], textarea[name*="area_groups"][name*="[name]"]', function() {
            updateAreaSlidePreview();
        });
        
        // Theo dõi thay đổi checkbox 表示 và cập nhật area slide preview
        $(document).on('change', 'input[name*="area_groups"][name*="[display]"]', function() {
            updateAreaSlidePreview();
        });
        
        // Khởi tạo trạng thái ban đầu cho area vertical slides
        updateAreaVerticalSlideItemsState();
        
        // Xử lý area slide preview
        $(document).on('click', '.area-slide-item, .area-vertical-slide-item', function() {
            var index = $(this).data('index');
            currentAreaIndex = index;
            
            // Hiển thị nhóm được chọn và ẩn các nhóm khác
            $('.area-group').hide();
            $('.area-group[data-index="' + index + '"]').show();
            
            // Làm mờ các slide khác và làm nổi bật slide được chọn
            $('.area-slide-item').css('opacity', 0.5);
            $('.area-slide-item[data-index="' + index + '"]').css('opacity', 1);
            
            // Cập nhật trạng thái của tất cả area vertical slide items
            updateAreaVerticalSlideItemsState();
            
            // Cuộn đến phần nhập liệu
            $('html, body').animate({
                scrollTop: $('.area-group[data-index="' + index + '"]').offset().top - 50
            }, 500);
        });
        
        // Hàm cập nhật trạng thái của tất cả area vertical slide items
        function updateAreaVerticalSlideItemsState() {
            // Đặt lại tất cả các area vertical slide items về trạng thái bình thường
            $('.area-vertical-slide-item').css({
                'background-color': '',
                'padding': '',
                'border-radius': ''
            });
            
            // Làm nổi bật area vertical slide item được chọn
            $('.area-vertical-slide-item[data-index="' + currentAreaIndex + '"]').css({
                'background-color': selectedBackgroundColor,
                'padding': '5px',
                'border-radius': '5px'
            });
        }
        
        // Thêm CSS cho area-vertical-slide-item khi hover
        $(document).on('mouseenter', '.area-vertical-slide-item', function() {
            // Nếu không phải là item đang được chọn, thì thay đổi màu nền khi hover
            if ($(this).data('index') != currentAreaIndex) {
                $(this).css({
                    'background-color': hoverBackgroundColor,
                    'border-radius': '5px'
                });
            }
        });
        
        $(document).on('mouseleave', '.area-vertical-slide-item', function() {
            // Nếu không phải là item đang được chọn, thì trở về trạng thái bình thường
            if ($(this).data('index') != currentAreaIndex) {
                $(this).css({
                    'background-color': '',
                    'border-radius': ''
                });
            }
        });
    });
    </script>
    <?php
}

// Lưu dữ liệu meta box
function save_custom_meta_box($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (get_post_type($post_id) !== 'experience') return;
    if (!current_user_can('edit_post', $post_id)) return;

    // Lưu các trường meta cơ bản
    $fields = array('meta_description', 'meta_keywords', 'meta_title', 'meta_name',
                   'top_name', 'top_feature', 'top_text', 'link_name');
    
    foreach ($fields as $field) {
        if (array_key_exists($field, $_POST)) {
            update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
        }
    }

    // Lưu experience groups
    if (isset($_POST['experience_groups'])) {
        $experience_groups = array();
        foreach ($_POST['experience_groups'] as $group) {
            $sanitized_group = array();
            
            // Xử lý radio buttons cho mùa
            $sanitized_group['spring'] = 0;
            $sanitized_group['summer'] = 0;
            $sanitized_group['autumn'] = 0;
            $sanitized_group['winter'] = 0;
            $sanitized_group['common'] = 0;
            $sanitized_group['plan'] = 0;
            
            if (isset($group['season'])) {
                $season = sanitize_text_field($group['season']);
                if ($season === 'spring') $sanitized_group['spring'] = 1;
                if ($season === 'summer') $sanitized_group['summer'] = 1;
                if ($season === 'autumn') $sanitized_group['autumn'] = 1;
                if ($season === 'winter') $sanitized_group['winter'] = 1;
                if ($season === 'common') $sanitized_group['common'] = 1;
                if ($season === 'plan') $sanitized_group['plan'] = 1;
            }
            
            // Checkbox fields
            $sanitized_group['display'] = isset($group['display']) ? 1 : 0;
            $sanitized_group['show_in_slide'] = isset($group['show_in_slide']) ? 1 : 0;
            
            // Text fields
            $sanitized_group['slide_image'] = sanitize_text_field($group['slide_image']);
            $sanitized_group['pc_title'] = sanitize_text_field($group['pc_title']);
            $sanitized_group['sp_title'] = sanitize_text_field($group['sp_title']);
            $sanitized_group['content'] = sanitize_textarea_field($group['content']);
            $sanitized_group['before_url_title'] = sanitize_text_field($group['before_url_title']);
            $sanitized_group['public_url_title'] = sanitize_text_field($group['public_url_title']);
            $sanitized_group['after_url_title'] = sanitize_text_field($group['after_url_title']);
            $sanitized_group['link'] = esc_url_raw($group['link']);
            
            // Date fields
            $sanitized_group['start_date'] = sanitize_text_field($group['start_date']);
            $sanitized_group['end_date'] = sanitize_text_field($group['end_date']);
            
            // Additional images
            $sanitized_group['additional_images'] = array();
            if (isset($group['additional_images']) && is_array($group['additional_images'])) {
                foreach ($group['additional_images'] as $image) {
                    $sanitized_group['additional_images'][] = sanitize_text_field($image);
                }
            }
            
            $experience_groups[] = $sanitized_group;
        }
        update_post_meta($post_id, '_experience_groups', $experience_groups);
    }

    // Lưu area groups
    if (isset($_POST['area_groups'])) {
        $area_groups = array();
        foreach ($_POST['area_groups'] as $group) {
            $sanitized_group = array();
            $sanitized_group['display'] = isset($group['display']) ? 1 : 0;
            $sanitized_group['image'] = sanitize_text_field($group['image']);
            $sanitized_group['name'] = sanitize_text_field($group['name']);
            $sanitized_group['content'] = sanitize_textarea_field($group['content']);
            $sanitized_group['link'] = esc_url_raw($group['link']);
            $area_groups[] = $sanitized_group;
        }
        update_post_meta($post_id, '_area_groups', $area_groups);
    }

    // Lưu trình tự area_order
    if (isset($_POST['area_order']) && !empty($_POST['area_order'])) {
        update_post_meta($post_id, '_area_order', sanitize_text_field($_POST['area_order']));
    }

    // Lưu thứ tự sắp xếp
    if (isset($_POST['spring_order'])) {
        update_post_meta($post_id, '_spring_order', sanitize_text_field($_POST['spring_order']));
    }
    if (isset($_POST['summer_order'])) {
        update_post_meta($post_id, '_summer_order', sanitize_text_field($_POST['summer_order']));
    }
    if (isset($_POST['autumn_order'])) {
        update_post_meta($post_id, '_autumn_order', sanitize_text_field($_POST['autumn_order']));
    }
    if (isset($_POST['winter_order'])) {
        update_post_meta($post_id, '_winter_order', sanitize_text_field($_POST['winter_order']));
    }
    if (isset($_POST['common_order'])) {
        update_post_meta($post_id, '_common_order', sanitize_text_field($_POST['common_order']));
    }
    if (isset($_POST['plan_order'])) {
        update_post_meta($post_id, '_plan_order', sanitize_text_field($_POST['plan_order']));
    }
}
add_action('save_post_experience', 'save_custom_meta_box');

// Thêm các trường meta vào REST API
function add_meta_to_api() {
    register_rest_field('experience', 'meta_info', array(
        'get_callback' => function($post) {
            return array(
                'description' => get_post_meta($post['id'], '_meta_description', true),
                'keywords' => get_post_meta($post['id'], '_meta_keywords', true),
                'title' => get_post_meta($post['id'], '_meta_title', true),
                'name' => get_post_meta($post['id'], '_meta_name', true),
                'top_name' => get_post_meta($post['id'], '_top_name', true),
                'top_feature' => get_post_meta($post['id'], '_top_feature', true),
                'top_text' => get_post_meta($post['id'], '_top_text', true),
                'link_name' => get_post_meta($post['id'], '_link_name', true),
                'experience_groups' => get_post_meta($post['id'], '_experience_groups', true),
                'area_groups' => get_post_meta($post['id'], '_area_groups', true)
            );
        }
    ));
}
add_action('rest_api_init', 'add_meta_to_api');

// Thêm script để tự động cập nhật recommend slide khi tích vào các おすすめ
function add_recommend_slide_update_script() {
    global $post;
    if (is_admin() && get_post_type() === 'experience') {
        ?>
        <script>
        jQuery(document).ready(function($) {
            // Khởi tạo biến lưu trữ thứ tự sắp xếp cho từng mùa
            var springOrder = [];
            var summerOrder = [];
            var autumnOrder = [];
            var winterOrder = [];
            var commonOrder = [];
            var planOrder = [];
            
            // Khôi phục thứ tự đã lưu nếu có
            <?php
            $spring_order = get_post_meta($post->ID, '_spring_order', true);
            $summer_order = get_post_meta($post->ID, '_summer_order', true);
            $autumn_order = get_post_meta($post->ID, '_autumn_order', true);
            $winter_order = get_post_meta($post->ID, '_winter_order', true);
            $common_order = get_post_meta($post->ID, '_common_order', true);
            $plan_order = get_post_meta($post->ID, '_plan_order', true);
            ?>
            
            springOrder = <?php echo !empty($spring_order) ? $spring_order : '[]'; ?>;
            summerOrder = <?php echo !empty($summer_order) ? $summer_order : '[]'; ?>;
            autumnOrder = <?php echo !empty($autumn_order) ? $autumn_order : '[]'; ?>;
            winterOrder = <?php echo !empty($winter_order) ? $winter_order : '[]'; ?>;
            commonOrder = <?php echo !empty($common_order) ? $common_order : '[]'; ?>;
            planOrder = <?php echo !empty($plan_order) ? $plan_order : '[]'; ?>;
            
            console.log('Loaded orders:', {
                spring: springOrder,
                summer: summerOrder,
                autumn: autumnOrder,
                winter: winterOrder,
                common: commonOrder,
                plan: planOrder
            });
            
            // Hàm cập nhật các recommend slide dựa trên radio buttons
            function updateRecommendSlides() {
                // Xóa tất cả các slide hiện tại trong các recommend slide container
                $('.seasonal-slides').empty();
                
                // Mảng tạm để lưu trữ các slide items cho mỗi mùa
                var springItems = [];
                var summerItems = [];
                var autumnItems = [];
                var winterItems = [];
                var commonItems = [];
                var planItems = [];
                
                // Lặp qua tất cả các experience group
                $('.experience-group').each(function(index) {
                    var groupIndex = $(this).data('index');
                    var slideImage = $(this).find('.experience-slide-image').val();
                    var pcTitle = $(this).find('textarea[name*="[pc_title]"]').val() || '';
                    var display = $(this).find('input[name*="[display]"]:checked').length > 0;
                    var showInSlide = $(this).find('input[name*="[show_in_slide]"]:checked').length > 0;
                    
                    // Chỉ xử lý các group được hiển thị
                    if (display) {
                        // Lấy giá trị của radio button được chọn
                        var selectedSeason = $(this).find('input[name*="[season]"]:checked').val();
                        
                        // Tạo HTML cho slide item với dấu tick xanh nếu showInSlide = true
                        var slideItemHTML = `
                            <div class="seasonal-slide-item" data-index="${groupIndex}" style="cursor: pointer; position: relative; transition: all 0.3s ease; display: flex; align-items: center; gap: 10px;">
                                <div style="position: relative;">
                                    ${slideImage ? 
                                        `<img src="${slideImage}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">` : 
                                        `<div style="width: 60px; height: 60px; background: #eee; border-radius: 5px; display: flex; justify-content: center; align-items: center; font-size: 10px;">画像なし</div>`
                                    }
                                    ${showInSlide ? 
                                        `<div style="position: absolute; top: -5px; right: -5px; background: #4CAF50; color: white; border-radius: 50%; width: 20px; height: 20px; display: flex; justify-content: center; align-items: center; font-size: 12px;">✓</div>` : 
                                        ''
                                    }
                                </div>
                                <div style="font-size: 12px; font-weight: bold; flex: 1; overflow: hidden; text-overflow: ellipsis;">
                                    ${pcTitle}
                                </div>
                                <div class="slide-sort-handle" style="cursor: move; margin-left: 5px;">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 6H16M8 12H16M8 18H16" stroke="#666" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                </div>
                            </div>
                        `;
                        
                        // Thêm slide vào mảng tương ứng
                        if (selectedSeason === 'spring') {
                            springItems.push({index: groupIndex, html: slideItemHTML});
                        } else if (selectedSeason === 'summer') {
                            summerItems.push({index: groupIndex, html: slideItemHTML});
                        } else if (selectedSeason === 'autumn') {
                            autumnItems.push({index: groupIndex, html: slideItemHTML});
                        } else if (selectedSeason === 'winter') {
                            winterItems.push({index: groupIndex, html: slideItemHTML});
                        } else if (selectedSeason === 'common') {
                            commonItems.push({index: groupIndex, html: slideItemHTML});
                        } else if (selectedSeason === 'plan') {
                            planItems.push({index: groupIndex, html: slideItemHTML});
                        }
                    }
                });
                
                // Sắp xếp các mảng theo thứ tự đã lưu
                function sortByOrder(items, orderArray) {
                    // Nếu có thứ tự đã lưu, sắp xếp theo thứ tự đó
                    if (orderArray && orderArray.length > 0) {
                        return items.sort(function(a, b) {
                            var indexA = orderArray.indexOf(parseInt(a.index));
                            var indexB = orderArray.indexOf(parseInt(b.index));
                            
                            // Nếu không tìm thấy trong mảng thứ tự, đặt ở cuối
                            if (indexA === -1) indexA = 999;
                            if (indexB === -1) indexB = 999;
                            
                            return indexA - indexB;
                        });
                    }
                    return items;
                }
                
                // Sắp xếp các mảng
                springItems = sortByOrder(springItems, springOrder);
                summerItems = sortByOrder(summerItems, summerOrder);
                autumnItems = sortByOrder(autumnItems, autumnOrder);
                winterItems = sortByOrder(winterItems, winterOrder);
                commonItems = sortByOrder(commonItems, commonOrder);
                planItems = sortByOrder(planItems, planOrder);
                
                // Thêm các slide đã sắp xếp vào container
                springItems.forEach(function(item) {
                    $('.seasonal-slide-container:eq(0) .seasonal-slides').append(item.html);
                });
                
                summerItems.forEach(function(item) {
                    $('.seasonal-slide-container:eq(1) .seasonal-slides').append(item.html);
                });
                
                autumnItems.forEach(function(item) {
                    $('.seasonal-slide-container:eq(2) .seasonal-slides').append(item.html);
                });
                
                winterItems.forEach(function(item) {
                    $('.seasonal-slide-container:eq(3) .seasonal-slides').append(item.html);
                });
                
                commonItems.forEach(function(item) {
                    $('.seasonal-slide-container:eq(4) .seasonal-slides').append(item.html);
                });
                
                planItems.forEach(function(item) {
                    $('.seasonal-slide-container:eq(5) .seasonal-slides').append(item.html);
                });
                
                // Khởi tạo sortable cho mỗi container
                initSortable();
            }
            
            // Hàm khởi tạo sortable cho các container
            function initSortable() {
                // Hủy sortable cũ nếu có
                $('.seasonal-slides').each(function() {
                    if ($(this).hasClass('ui-sortable')) {
                        $(this).sortable('destroy');
                    }
                });
                
                // Thêm handle cho các seasonal-slide-item nếu chưa có
                $('.seasonal-slide-item').each(function() {
                    if ($(this).find('.slide-sort-handle').length === 0) {
                        $(this).append('<div class="slide-sort-handle" style="cursor: move; margin-left: 5px; position: absolute; right: 5px; top: 5px; z-index: 100;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 6H16M8 12H16M8 18H16" stroke="#666" stroke-width="2" stroke-linecap="round"/></svg></div>');
                    }
                });
                
                // Khởi tạo sortable cho mỗi container
                $('.seasonal-slide-container:eq(0) .seasonal-slides').sortable({
                    handle: '.slide-sort-handle',
                    update: function(event, ui) {
                        // Cập nhật thứ tự cho mùa xuân
                        springOrder = $(this).sortable('toArray', {attribute: 'data-index'}).map(Number);
                    }
                });
                
                $('.seasonal-slide-container:eq(1) .seasonal-slides').sortable({
                    handle: '.slide-sort-handle',
                    update: function(event, ui) {
                        // Cập nhật thứ tự cho mùa hè
                        summerOrder = $(this).sortable('toArray', {attribute: 'data-index'}).map(Number);
                    }
                });
                
                $('.seasonal-slide-container:eq(2) .seasonal-slides').sortable({
                    handle: '.slide-sort-handle',
                    update: function(event, ui) {
                        // Cập nhật thứ tự cho mùa thu
                        autumnOrder = $(this).sortable('toArray', {attribute: 'data-index'}).map(Number);
                    }
                });
                
                $('.seasonal-slide-container:eq(3) .seasonal-slides').sortable({
                    handle: '.slide-sort-handle',
                    update: function(event, ui) {
                        // Cập nhật thứ tự cho mùa đông
                        winterOrder = $(this).sortable('toArray', {attribute: 'data-index'}).map(Number);
                    }
                });
                
                $('.seasonal-slide-container:eq(4) .seasonal-slides').sortable({
                    handle: '.slide-sort-handle',
                    update: function(event, ui) {
                        // Cập nhật thứ tự cho mục chung
                        commonOrder = $(this).sortable('toArray', {attribute: 'data-index'}).map(Number);
                    }
                });
                
                $('.seasonal-slide-container:eq(5) .seasonal-slides').sortable({
                    handle: '.slide-sort-handle',
                    update: function(event, ui) {
                        // Cập nhật thứ tự cho mục kế hoạch
                        planOrder = $(this).sortable('toArray', {attribute: 'data-index'}).map(Number);
                    }
                });
                
                // Khởi tạo các order ban đầu nếu chưa có dữ liệu
                if (springOrder.length === 0) {
                    springOrder = $('.seasonal-slide-container:eq(0) .seasonal-slides .seasonal-slide-item').map(function() {
                        return parseInt($(this).data('index'));
                    }).get();
                }
                if (summerOrder.length === 0) {
                    summerOrder = $('.seasonal-slide-container:eq(1) .seasonal-slides .seasonal-slide-item').map(function() {
                        return parseInt($(this).data('index'));
                    }).get();
                }
                if (autumnOrder.length === 0) {
                    autumnOrder = $('.seasonal-slide-container:eq(2) .seasonal-slides .seasonal-slide-item').map(function() {
                        return parseInt($(this).data('index'));
                    }).get();
                }
                if (winterOrder.length === 0) {
                    winterOrder = $('.seasonal-slide-container:eq(3) .seasonal-slides .seasonal-slide-item').map(function() {
                        return parseInt($(this).data('index'));
                    }).get();
                }
                if (commonOrder.length === 0) {
                    commonOrder = $('.seasonal-slide-container:eq(4) .seasonal-slides .seasonal-slide-item').map(function() {
                        return parseInt($(this).data('index'));
                    }).get();
                }
                if (planOrder.length === 0) {
                    planOrder = $('.seasonal-slide-container:eq(5) .seasonal-slides .seasonal-slide-item').map(function() {
                        return parseInt($(this).data('index'));
                    }).get();
                }
            }
            
            // Hàm cập nhật slide preview với dấu tick xanh
            function updateSlidePreview() {
                // ... existing code ...
            }
            
            // Theo dõi thay đổi radio buttons và cập nhật recommend slides
            $(document).on('change', 'input[type="radio"][name*="experience_groups"]', function() {
                updateRecommendSlides();
                updateSlidePreview();
            });
            
            // Theo dõi thay đổi checkbox và cập nhật recommend slides
            $(document).on('change', 'input[type="checkbox"][name*="experience_groups"]', function() {
                updateRecommendSlides();
                updateSlidePreview();
            });
            
            // Theo dõi thay đổi tiêu đề và cập nhật recommend slides
            $(document).on('input', 'textarea[name*="[pc_title]"]', function() {
                updateRecommendSlides();
                updateSlidePreview();
            });
            
            // Theo dõi thay đổi hình ảnh và cập nhật recommend slides
            $(document).on('change', '.experience-slide-image', function() {
                updateRecommendSlides();
                updateSlidePreview();
            });
            
            // Thêm trường ẩn để lưu thứ tự sắp xếp
            $('form#post').append('<input type="hidden" name="spring_order" id="spring_order">');
            $('form#post').append('<input type="hidden" name="summer_order" id="summer_order">');
            $('form#post').append('<input type="hidden" name="autumn_order" id="autumn_order">');
            $('form#post').append('<input type="hidden" name="winter_order" id="winter_order">');
            $('form#post').append('<input type="hidden" name="common_order" id="common_order">');
            $('form#post').append('<input type="hidden" name="plan_order" id="plan_order">');
            
            // Cập nhật giá trị của trường ẩn trước khi submit form
            $('form#post').on('submit', function() {
                // Cập nhật area_order
                if ($('#area_order').val() === '' || $('#area_order').val() === '[]') {
                    var areaOrder = $('.area-vertical-slides .area-vertical-slide-item').map(function() {
                        return parseInt($(this).data('index'));
                    }).get();
                    if (areaOrder.length > 0) {
                        $('#area_order').val(JSON.stringify(areaOrder));
                    }
                }
                
                // Khởi tạo các biến order nếu chưa được khởi tạo
                if (!springOrder || springOrder.length === 0) {
                    springOrder = $('.seasonal-slide-container:eq(0) .seasonal-slides .seasonal-slide-item').map(function() {
                        return parseInt($(this).data('index'));
                    }).get();
                }
                if (!summerOrder || summerOrder.length === 0) {
                    summerOrder = $('.seasonal-slide-container:eq(1) .seasonal-slides .seasonal-slide-item').map(function() {
                        return parseInt($(this).data('index'));
                    }).get();
                }
                if (!autumnOrder || autumnOrder.length === 0) {
                    autumnOrder = $('.seasonal-slide-container:eq(2) .seasonal-slides .seasonal-slide-item').map(function() {
                        return parseInt($(this).data('index'));
                    }).get();
                }
                if (!winterOrder || winterOrder.length === 0) {
                    winterOrder = $('.seasonal-slide-container:eq(3) .seasonal-slides .seasonal-slide-item').map(function() {
                        return parseInt($(this).data('index'));
                    }).get();
                }
                if (!commonOrder || commonOrder.length === 0) {
                    commonOrder = $('.seasonal-slide-container:eq(4) .seasonal-slides .seasonal-slide-item').map(function() {
                        return parseInt($(this).data('index'));
                    }).get();
                }
                if (!planOrder || planOrder.length === 0) {
                    planOrder = $('.seasonal-slide-container:eq(5) .seasonal-slides .seasonal-slide-item').map(function() {
                        return parseInt($(this).data('index'));
                    }).get();
                }
                
                // Đặt giá trị vào các trường ẩn
                $('#spring_order').val(JSON.stringify(springOrder));
                $('#summer_order').val(JSON.stringify(summerOrder));
                $('#autumn_order').val(JSON.stringify(autumnOrder));
                $('#winter_order').val(JSON.stringify(winterOrder));
                $('#common_order').val(JSON.stringify(commonOrder));
                $('#plan_order').val(JSON.stringify(planOrder));
                
                console.log('Form submit - Saved orders:', {
                    area: $('#area_order').val(),
                    spring: springOrder,
                    summer: summerOrder,
                    autumn: autumnOrder,
                    winter: winterOrder,
                    common: commonOrder,
                    plan: planOrder
                });
            });
            
            // Cập nhật ban đầu khi trang được tải
            updateRecommendSlides();
            updateSlidePreview();
        });
        </script>
        <?php
    }
}
add_action('admin_footer', 'add_recommend_slide_update_script');

// function add_menu() {
//     add_theme_support( 'menus' );
//     register_nav_menus( array( 
//         'themeLocationOne' => 'Footer Menu One',
//         'themeLocationTwo' => 'Footer Menu Two'
//     ) );
// }

// //Thêm menu vào wordpress -> footer 
// add_action("init","add_menu");