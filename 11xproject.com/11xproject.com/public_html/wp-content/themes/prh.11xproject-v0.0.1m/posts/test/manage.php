<?php
// Thêm meta box cho post type experience
function add_custom_meta_box_test()
{
  add_meta_box(
    'custom_meta_box_test',
    'Thông tin chi tiết',
    'custom_meta_box_html_test',
    'test'
  );
}
add_action('add_meta_boxes', 'add_custom_meta_box_test');
// HTML cho meta box
function custom_meta_box_html_test($post)
{
  // Lấy dữ liệu common
  $common = get_post_meta($post->ID, '_common', true);
  if (!is_array($common)) {
    $common = array();
  }
  
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

<div class="experience-container">
  TEST
  <?php foreach ($experience_groups as $index => $group): ?>
  <div class="experience-item" data-index="<?php echo $index; ?>">
    <div class="experience-header">
      <h3><?php echo isset($group['pc_title']) ? esc_html($group['pc_title']) : 'Experience ' . ($index + 1); ?></h3>
      <button type="button" class="button delete-experience" data-index="<?php echo $index; ?>">Xóa</button>
    </div>
    <div class="checkbox-btn">
      <input type="checkbox" name="experience_groups[<?php echo $index; ?>][status]" id="status_<?php echo $index; ?>" 
        <?php checked(isset($group['status']) && $group['status'] == 1, true); ?>>
      <label for="status_<?php echo $index; ?>">ステータス</label>
    </div>
    <!-- Các trường thông tin khác của experience -->
  </div>
  <?php endforeach; ?>
  
  <!-- Template cho experience mới -->
  <div id="experience-template" style="display: none;">
    <div class="experience-item" data-index="INDEX">
      <div class="experience-header">
        <h3>Experience mới</h3>
        <button type="button" class="button delete-experience" data-index="INDEX">Xóa</button>
      </div>
      <div class="checkbox-btn">
        <input type="checkbox" name="experience_groups[INDEX][status]" id="status_INDEX">
        <label for="status_INDEX">ステータス</label>
      </div>
      <!-- Các trường thông tin khác của experience mới -->
      <div class="form-group">
        <label for="pc_title_INDEX">Tiêu đề PC:</label>
        <input type="text" name="experience_groups[INDEX][pc_title]" id="pc_title_INDEX" class="form-control">
      </div>
      <div class="form-group">
        <label for="sp_title_INDEX">Tiêu đề SP:</label>
        <input type="text" name="experience_groups[INDEX][sp_title]" id="sp_title_INDEX" class="form-control">
      </div>
      <div class="form-group">
        <label for="content_INDEX">Nội dung:</label>
        <textarea name="experience_groups[INDEX][content]" id="content_INDEX" class="form-control" rows="4"></textarea>
      </div>
    </div>
  </div>
  
  <div class="experience-actions">
    <button type="button" id="add-experience" class="button button-primary">Thêm Experience</button>
  </div>
</div>

<style>
.experience-item {
  margin-bottom: 20px;
  padding: 15px;
  background: #f9f9f9;
  border: 1px solid #ddd;
  border-radius: 4px;
}
.experience-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 10px;
}
.form-group {
  margin-bottom: 10px;
}
.form-control {
  width: 100%;
}
</style>

<script type="text/javascript">
jQuery(document).ready(function($) {
  // Biến theo dõi số lượng experience hiện tại
  var experienceCount = <?php echo count($experience_groups); ?>;
  
  // Xử lý sự kiện khi nhấn nút thêm experience
  $('#add-experience').on('click', function() {
    // Lấy template và thay thế INDEX bằng index mới
    var template = $('#experience-template').html();
    var newExperience = template.replace(/INDEX/g, experienceCount);
    
    // Chèn experience mới vào container
    $(newExperience).insertBefore($(this).parent());
    
    // Tăng biến đếm
    experienceCount++;
    
    // Gắn sự kiện xóa cho nút xóa mới
    bindDeleteEvent();
    
    return false;
  });
  
  // Hàm gắn sự kiện xóa cho các nút xóa
  function bindDeleteEvent_test() {
    $('.delete-experience').off('click').on('click', function() {
      if (confirm('Bạn có chắc chắn muốn xóa experience này?')) {
        var index = $(this).data('index');
        // Xóa experience item
        $(this).closest('.experience-item').remove();
        
        // Cập nhật lại index cho các experience sau experience bị xóa
        updateIndices_test();
      }
      return false;
    });
  }
  
  // Hàm cập nhật lại indices cho các experience
  function updateIndices_test() {
    $('.experience-item').each(function(newIndex) {
      var oldIndex = $(this).data('index');
      
      // Cập nhật data-index cho experience item
      $(this).attr('data-index', newIndex);
      
      // Cập nhật data-index cho nút xóa
      $(this).find('.delete-experience').attr('data-index', newIndex);
      
      // Cập nhật name, id và for cho các input trong experience
      $(this).find('input, textarea, select').each(function() {
        var name = $(this).attr('name');
        if (name) {
          name = name.replace(new RegExp('\\[' + oldIndex + '\\]', 'g'), '[' + newIndex + ']');
          $(this).attr('name', name);
        }
        
        var id = $(this).attr('id');
        if (id) {
          id = id.replace(new RegExp('_' + oldIndex + '$', 'g'), '_' + newIndex);
          $(this).attr('id', id);
        }
      });
      
      // Cập nhật for cho các label
      $(this).find('label').each(function() {
        var forAttr = $(this).attr('for');
        if (forAttr) {
          forAttr = forAttr.replace(new RegExp('_' + oldIndex + '$', 'g'), '_' + newIndex);
          $(this).attr('for', forAttr);
        }
      });
    });
  }
  
  // Gắn sự kiện xóa khi trang được load
  bindDeleteEvent_test();
});
</script>

<?php
}
function save_custom_meta_box_test($post_id)
{
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (get_post_type($post_id) !== 'test') return;
  if (!current_user_can('edit_post', $post_id)) return;

  // Lưu experience groups nếu có
  if (isset($_POST['common'])) {
    update_post_meta_test($post_id, '_common', $_POST['common']);
  }
  
  // Lưu experience groups nếu có
  if (isset($_POST['experience_groups'])) {
    $experience_groups = array();
    
    foreach ($_POST['experience_groups'] as $index => $group) {
      // Lưu trạng thái status cho từng experience
      $group['status'] = isset($group['status']) ? 1 : 0;
      $experience_groups[$index] = $group;
    }
    
    // Sắp xếp lại mảng để đảm bảo các index là liên tục
    $experience_groups = array_values($experience_groups);
    
    update_post_meta_test($post_id, '_experience_groups', $experience_groups);
  }

  // Lưu area groups nếu có
  if (isset($_POST['area_groups'])) {
    update_post_meta_test($post_id, '_area_groups', $_POST['area_groups']);
  }
}
add_action('save_post', 'save_custom_meta_box_test');
?>