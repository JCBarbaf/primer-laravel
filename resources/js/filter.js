export default (() => {
    let filterButton = document.querySelector(".filter button");

    filterButton.addEventListener("click",() => {
        filterButton.parentNode.classList.toggle("opened");
    })
  })();