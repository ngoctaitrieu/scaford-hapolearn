const filterBtn = document.querySelector('.filter-btn');
const filterContent = document.querySelector('.filter-content');

filterBtn.addEventListener('click', ()=> {
    filterContent.classList.toggle("filter-show");
});
