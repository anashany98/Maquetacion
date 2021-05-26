import {renderTable} from './crudTable';

export let renderLocaleSeo = () => {

    let table = document.getElementById("table");
    let importSeo = document.getElementById('import-seo');

    if(importSeo){

        importSeo.addEventListener("click", () => {

            let url = importSeo.dataset.url;
        
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
