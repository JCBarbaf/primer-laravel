export default (() => {

  const tableSection = document.querySelector('.data-list');

  document.addEventListener("refreshTable", event => {
    tableSection.innerHTML = event.detail.table;
  });

  tableSection?.addEventListener('click', async (event) => {

    if (event.target.closest('.edit-button')) {

      const editButton = event.target.closest('.edit-button')
      const endpoint = editButton.dataset.endpoint;

      try{
        const response = await fetch(endpoint, {
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
          },
          method: 'GET',
        })
  
        if (response.status === 500) {
          throw response
        }
  
        if (response.status === 200) {  

          const json = await response.json();

          document.dispatchEvent(new CustomEvent('refreshForm', {
            detail: {
              form: json.form,
            }
          }));
        }
      }catch(error){

        const json = await error.json();

        document.dispatchEvent(new CustomEvent('notification', {
          detail: {
            message: json.message,
            type: 'error'
          }
        }))
      }
    }

    if (event.target.closest('.delete-button')) {

      const destroyButton = event.target.closest('.delete-button');
      const endpoint = destroyButton.dataset.endpoint;

      document.dispatchEvent(new CustomEvent('showDeleteModal', {
        detail: {
          endpoint: endpoint,
        }
      }));
    }

    if (event.target.closest('.table-pagination-page')){

      const paginationButton = event.target.closest('.table-pagination-page');

      if(paginationButton.classList.contains('inactive')){
        return;
      }

      try{
        
        let endpoint = paginationButton.dataset.pagination;

        const response = await fetch(endpoint, {
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
          },
          method: 'GET',
        })

        if (response.status === 500) {
          throw response
        }

        const json = await response.json();

        document.dispatchEvent(new CustomEvent('refreshTable', {
          detail: {
            table: json.table,
          }
        }));

      }catch(error){

        const json = await error.json();

        document.dispatchEvent(new CustomEvent('notification', {
          detail: {
            message: json.message,
            type: 'error'
          }
        }))
      }
    }
  });
})();