import {renderTable} from './crudTable';

export let renderTags = () => {

    let table = document.getElementById("table");
    let importTags = document.getElementById('tags.import');

    if(importTags){

        importTags.addEventListener("click", () => {

            let url = importTags.dataset.url;
        

            let sendEditRequest = async () => {

                try {
                    await axios.get(url).then(response => {
                        table.innerHTML = response.data.table;
                        renderTable();
                    });
                    
                } catch (error) {
                    console.error(error);
                    
                }
            };

            sendEditRequest();
        });
    }
}
renderTags();