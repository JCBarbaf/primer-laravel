export default (() => {
    let tabs = document.querySelectorAll('.tabs .tab');
    tabs.forEach(tab => {
        tab.addEventListener('click',() => {
            tabs.forEach(element => {
                element.classList.remove('selected');
            });
            tab.classList.add('selected');
        })
    });
  })();