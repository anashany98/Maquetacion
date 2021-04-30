import { renderTable } from './crudTable';

const filterButton =document.getElementById('filter-button')
const filterForm =document.getElementById('filter-form')
const filterOpenButton = document.getElementById('filter-open-button')
const filterContainer = document.getElementById('filter-container')

export let renderFilterTable = () => {

    filterButton.addEventListener('click', () =>{

        let data = new FormData(filterForm);
        let filters = {};
        
        data.forEach(function(value, key){
            filters[key] = value;
        });
        
        let json = JSON.stringify(filters);

        let url = filterForm.action;

        let sendFilterRequest = async () => {

            try {
                axios.get(url, {
                    params: {
                        filters: json
                    }
                }).then(response => {
                    table.innerHTML = response.data.table;
                    renderTable();
                    filterContainer.classList.toggle("active"); 
                });
                
            } catch (error) {

            } 
        };
        
         sendFilterRequest();
                
    });
    
    filterOpenButton.addEventListener("click", () => {
    
        filterContainer.classList.toggle("active"); 
    });
}
    


