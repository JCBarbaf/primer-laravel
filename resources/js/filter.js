export default (() => {
    let filterModal = document.querySelector('.filter.modal');
    document.addEventListener('showFilterModal', (event => {
        filterModal.classList.add('active');
        filterModal.querySelector('.close').addEventListener('click',() => {
            event.preventDefault();
            filterModal.classList.remove('active');
        });
    }));
  })();