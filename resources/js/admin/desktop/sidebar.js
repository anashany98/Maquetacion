const { default: axios} = require("axios");
const sidebarItems = document.querySelectorAll(".sidebar-item");
const form = document.getElementById("form");
const table = document.getElementById("table");


sidebarItems.forEach(sidebarItem =>{
    
    sidebarItem.addEventListener("click", () => {


        let url = sidebarItem.dataset.url;

            let RefreshRequest = async () => {
                console.log(url)
                try {
                    await axios.get(url).then(response => {
                        form.innerHTML = response.data.form;
                        table.innerHTML = response.data.table;
                        console.log(response.data.form)
                    });
                    
                } catch (error) {
                    console.error(error);
                }
            

            };    
            RefreshRequest();
        
    });

});

