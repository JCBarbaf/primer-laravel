export default (() => {
    let dataAdd = document.querySelector('.data-add');
    dataAdd?.addEventListener('click', async (event) => {
        if (event.target.closest('.tab')) {
            let tabClicked = event.target.closest('.tab');
            let oldTab = tabClicked.parentNode.querySelector('.selected').dataset.field
            tabClicked.parentNode.querySelector('.selected').classList.remove('selected');
            document.querySelector(`[data-field="${oldTab}"].tab-content.selected`).classList.remove('selected');
            tabClicked.classList.add('selected');
            document.querySelector(`[data-field="${tabClicked.dataset.field}"].tab-content`).classList.add('selected');
        }
    });
})();