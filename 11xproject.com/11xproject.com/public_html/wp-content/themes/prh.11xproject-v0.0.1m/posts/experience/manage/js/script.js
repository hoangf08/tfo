// Xử lý tải xuống nội dung
$('#download-content-btn').on('click', function(e) {
    e.preventDefault();
    
    var postId = $('#post_ID').val();
    if (!postId) {
        alert('Không thể xác định ID bài viết');
        return;
    }
    
    // Tạo form ẩn để submit
    var form = $('<form>', {
        'method': 'POST',
        'action': '/wp-admin/admin-post.php'
    });

    // Thêm action và post_id
    form.append($('<input>', {
        'type': 'hidden',
        'name': 'action',
        'value': 'download_rendered_content'
    }));
    
    form.append($('<input>', {
        'type': 'hidden',
        'name': 'post_id',
        'value': postId
    }));

    // Thêm nonce field
    form.append($('<input>', {
        'type': 'hidden',
        'name': '_wpnonce',
        'value': wpNonce // Được định nghĩa trong PHP
    }));

    // Thêm form vào body và submit
    $('body').append(form);
    form.submit();
    form.remove();
});