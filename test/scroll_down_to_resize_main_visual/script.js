document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.header');
    const heroImg = document.querySelector('.hero img');
    const maxMargin = 80; // margin tối đa là 80px

    window.addEventListener('scroll', () => {
        // Hiển thị header khi scroll
        if (window.scrollY > 100) {
            header.classList.add('visible');
        } else {
            header.classList.remove('visible');
        }

        // Tính toán margin dựa trên vị trí scroll
        const scrollPosition = window.scrollY;
        const windowHeight = window.innerHeight;
        const scrollPercentage = Math.min(scrollPosition / windowHeight, 1);
        const currentMargin = scrollPercentage * maxMargin;

        // Áp dụng margin cho hình ảnh
        heroImg.style.paddingLeft = `${currentMargin}px`;
        heroImg.style.paddingRight = `${currentMargin}px`;
    });
}); 