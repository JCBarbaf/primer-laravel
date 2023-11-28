export default (() => {
    let filterButton = document.querySelector('.filter-button');
    let filterModal = document.querySelector('.filter.modal');
    let closeButton = filterModal.querySelector('.filter.modal .close');

    filterButton.addEventListener('click',() => {
        event.preventDefault();
        filterModal.classList.toggle('active');
    })
    closeButton.addEventListener('click',() => {
        event.preventDefault();
        filterModal.classList.toggle('active');
    })
  })();