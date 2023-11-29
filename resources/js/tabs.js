export default (() => {
    let tabs = document.querySelector('.tabs');
    tabs?.addEventListener('click', async (event) => {
        let tabClicked = event.target.closest('.tab');
        if (tabClicked) {
            tabClicked.parentNode.querySelector('.selected').classList.remove('selected');
            tabClicked.classList.add('selected');
        }
    });
  })();