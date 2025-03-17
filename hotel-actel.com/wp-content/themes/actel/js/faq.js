document.addEventListener('DOMContentLoaded', function() {
    const faqSelectItems = document.querySelectorAll('.faq-select li');
    const faqContents = document.querySelectorAll('.faq-content');
    const dropdownToggle = document.querySelector('.faq-select');

    faqSelectItems.forEach(item => {
        item.addEventListener('click', function() {
            // すべてのfaq-contentを非表示にする
            faqContents.forEach(content => {
                content.classList.remove('active');
            });

            // すべてのfaq-selectの項目からactiveクラスを削除
            faqSelectItems.forEach(selectItem => {
                selectItem.classList.remove('active');
            });

            // クリックされた項目にactiveクラスを追加
            this.classList.add('active');

            // 対応するfaq-contentを表示
            const targetId = this.getAttribute('data-target');
            const targetContent = document.getElementById(targetId);
            if (targetContent) {
                targetContent.classList.add('active');
            }

            // ドロップダウンを閉じる
            dropdownToggle.classList.remove('open');
        });
    });

    // ドロップダウンメニューの開閉を制御
    const dropdownButton = document.querySelector('.dropdown-button');
    dropdownButton.addEventListener('click', function() {
        dropdownToggle.classList.toggle('open');
    });
});
