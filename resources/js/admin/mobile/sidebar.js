import {renderForm, renderTable} from './crudTable';

const sidebarItems = document.querySelectorAll(".sidebar-item");
const form = document.getElementById("form");
const table = document.getElementById("table");
const sideButton = document.querySelectorAll(".sidebutton")
const sidebar = document.querySelectorAll(".sidebar");




sidebarItems.forEach(sidebarItem =>{
    
    sidebarItem.addEventListener("click", () => {


        let url = sidebarItem.dataset.url;

            let RefreshRequest = async () => {

                console.log(url)
                try {
                    await axios.get(url).then(response => {
                        form.innerHTML = response.data.form;
                        table.innerHTML = response.data.table;
                       
                        window.history.pushState('','',  url);
                       
                        renderForm();
                        renderTable();
                    });
                    
                } catch (error) {
                    console.error(error);
                }
            
            };    

            RefreshRequest();
        
    });

});


sideButton.forEach(sideButton => { 

    sideButton.addEventListener("click", () => {

        let activeElements = document.querySelectorAll(".active");

        if(sideButton.classList.contains("active")){

            sideButton.classList.remove("active");

            activeElements.forEach(activeElement => {
                activeElement.classList.remove("active");
            });

        }else{

            activeElements.forEach(activeElement => {
                activeElement.classList.remove("active");
            });
            
            sideButton.classList.add("active");

            sidebar.forEach(sidebar => {

                if(sidebar.dataset.content == sideButton.dataset.button){
                    sidebar.classList.add("active"); 
                }else{
                }
            });
        }
    });
    
});



