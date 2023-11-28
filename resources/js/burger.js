export default (() => {
    let burgerButton = document.querySelector('.burger-button');
    let firstTime = true;
    burgerButton.addEventListener('click',() => {
        if (firstTime) {
            firstTime = false;
            burgerButton.parentNode.classList.add('opened');
        } else {
            burgerButton.parentNode.classList.toggle('opened');
            burgerButton.parentNode.classList.toggle('closed');
        }
    })
  })();