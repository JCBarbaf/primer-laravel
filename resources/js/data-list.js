export default (() => {
    let dataList = document.querySelector('.data-list');
    let deleteModal = document.querySelector('.delete.modal');
    let closeButton = deleteModal.querySelector('.delete.modal .close');

    dataList?.addEventListener('click', async (event) => {

        if (event.target.closest('.delete-button')) {
            deleteModal.classList.toggle('active');
        }
    });
    closeButton.addEventListener('click',() => {
        event.preventDefault();
        deleteModal.classList.toggle('active');
    });
  })();