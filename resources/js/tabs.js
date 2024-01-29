export default (() => {
    let dataAdd = document.querySelector('.data-add');
    dataAdd?.addEventListener('click', async (event) => {
        if (event.target.closest('.tab')) {
            if (event.target.closest('.tab').classList.contains('active')) {
              return;
            }
            let tabClicked = event.target.closest('.tab');
            let oldTab = tabClicked.parentNode.querySelector('.selected')
            oldTab.classList.remove('selected');
            document.querySelector(`[data-field="${oldTab.dataset.field}"].tab-content.selected`).classList.remove('selected');
            tabClicked.classList.add('selected');
            document.querySelector(`[data-field="${tabClicked.dataset.field}"].tab-content`).classList.add('selected');
        }
    });
})();