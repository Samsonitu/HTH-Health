document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.utilities__item').forEach((item, index) => {
        item.addEventListener('mouseover', () => {
            document.querySelectorAll('.utilities__item, .utilities__image').forEach(el => el.classList.remove('active'));
            item.classList.add('active');
            const images = document.querySelectorAll('.utilities__image');
            if (images[index]) {
                images[index].classList.add('active');
            }
        });
    });

    document.querySelectorAll('.article__info-img').forEach((item, index) => {
        item.addEventListener('click', () => {
            document.querySelectorAll('.article__info-img').forEach(el => el.classList.remove('active'));
            item.classList.add('active');
        })
    })
});