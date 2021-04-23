import { renderTable } from './crudTable';

const filterButton =document.getElementById('filter-button')
const filterForm =document.getElementById('filter-form')
const filterOpenButton =document.getElementById('filter-open-button')
const filterContainer =document.getElementsByClassName('.filter-container')

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




filterOpenButton.forEach(filterOpenButton => { 

    filterOpenButton.addEventListener("click", () => {

        let activeElements = document.querySelectorAll(".active");

        if(filterOpenButton.classList.contains("active")){

            filterOpenButton.classList.remove("active");

            activeElements.forEach(activeElement => {
                activeElement.classList.remove("active");
            });

        }else{

            activeElements.forEach(activeElement => {
                activeElement.classList.remove("active");
            });
            
            sideButton.classList.add("active");

            filterContainer.forEach(filterContainer => {

                if(filterContainer.dataset.content == filterOpenButton.dataset.button){
                    filterContainer.classList.add("active"); 
                }else{
                }
            });
        }
    });
    
});


