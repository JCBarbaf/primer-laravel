export default (() => {
    let deleterButtons = document.querySelectorAll('.delete-button');
    let deleteModal = document.querySelector('.delete.modal');
    let closeButton = deleteModal.querySelector('.delete.modal .close');

    deleterButtons.forEach(button => {
        button.addEventListener('click',() => {
            event.preventDefault();
            deleteModal.classList.toggle('active');
        })
    });
    closeButton.addEventListener('click',() => {
        event.preventDefault();
        deleteModal.classList.toggle('active');
    })
  })();