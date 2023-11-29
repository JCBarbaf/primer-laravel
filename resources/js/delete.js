export default (() => {
    let deleteModal = document.querySelector('.delete.modal');
    document.addEventListener('showDeleteModal', (event => {
        deleteModal.classList.add('active');
        deleteModal.querySelector('.close').addEventListener('click',() => {
            deleteModal.classList.remove('active');
        });
    }));
  })();