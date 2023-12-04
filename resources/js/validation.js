export default (() => {
    let form = document.querySelector('.data-add')
    var lettersOnlyregex = /^[a-zA-ZÑÁÉÍÓÚñáéíóú]+$/;
    form.addEventListener("input", (event) => {
        let input = event.target.closest('input');
        if (input.dataset.minlength) {
            if (input.value.length == 0) {
                input.classList.remove('valid');
                input.classList.remove('invalid');
            } else if (input.value.length < input.dataset.minlength) {
                input.classList.remove('valid');
                input.classList.add('invalid');
            } else {
                input.classList.remove('invalid');
                input.classList.add('valid');
            }
        }
        if (input.dataset.rule) { 
            if (input.dataset.rule == "lettersonly") {
                if (input.value.length == 0) {
                    input.classList.remove('valid');
                    input.classList.remove('invalid');
                } else if (lettersOnlyregex.test(input.value)) {
                    input.classList.remove('invalid');
                    input.classList.add('valid');
                } else {
                    input.classList.remove('valid');
                    input.classList.add('invalid');
                }
            }
        }
    });
})();