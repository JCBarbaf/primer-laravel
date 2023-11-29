export default (() => {
    let dataList = document.querySelector('.data-list');
    dataList?.addEventListener('click', async (event) => {
        if (event.target.closest('.delete-button')) {
            document.dispatchEvent(new CustomEvent('showDeleteModal'));
        }
        if (event.target.closest('.filter-button')) {
            document.dispatchEvent(new CustomEvent('showFilterModal'));
        }
    });
  })();