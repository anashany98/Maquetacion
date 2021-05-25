import {renderTable} from './crudTable';

export let renderLocaleTags = () => {

    let table = document.getElementById("table");
    let importTags = document.getElementById('import-button');

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

renderLocaleTags();