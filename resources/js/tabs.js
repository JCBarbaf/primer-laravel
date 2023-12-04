export default (() => {
    let tabs = document.querySelector('.tabs');
    tabs?.addEventListener('click', async (event) => {
        if (event.target.closest('.tab')) {
            let tabClicked = event.target.closest('.tab');
            tabClicked.parentNode.querySelector('.selected').classList.remove('selected');
            document.querySelector('[data-field].tab-content.selected').classList.remove('selected');
            tabClicked.classList.add('selected');
            document.querySelector(`[data-field="${tabClicked.dataset.field}"].tab-content`).classList.add('selected');
        }
    });
})();