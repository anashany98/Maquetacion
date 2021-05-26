import {renderTable} from './crudTable';

export let renderGoogleBot = () => {

    let table = document.getElementById("table");
    let pingGoogle = document.getElementById('ping-google');

    if(pingGoogle){

        pingGoogle.addEventListener("click", () => {

            let url = pingGoogle.dataset.url;
        
            let sendEditRequest = async () => {
    
                try {
                    await axios.get(url).then(response => {
                    });
                    
                } catch (error) {
                    console.error(error);
                }
            };
    
            sendEditRequest();
        });
    }
}
