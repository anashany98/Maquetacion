import { renderTable } from './crudTable';

const filterButton =document.getElementById('filter-button')
const filterForm =document.getElementById('filter-form')

filterButton.addEventListener('click', () =>{

    let data =new FormData(filterForm)
    let url = filterForm.action;


    let sendPostRequest = async () => {

        try {
            await axios.post(url, data).then(response => {
                table.innerHTML = response.data.table;
                renderTable();

            });


        } catch (error){

        }

    };
 
    sendPostRequest();

});