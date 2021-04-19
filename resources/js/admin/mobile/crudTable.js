import {renderCkeditor} from './ckeditor';

const table = document.getElementById("table");
const form = document.getElementById("form");

export let renderForm = () => {

    let forms = document.querySelectorAll(".admin-form");
    let labels = document.querySelectorAll('.label-container');
    let inputs = document.querySelectorAll('.input-container');
    let sendButton = document.getElementById("send-button");


    inputs.forEach(input => {

        input.addEventListener('focusin', () => {
    
            for( var i = 0; i < labels.length; i++ ) {
                if (labels[i].htmlFor == input.name){
                    labels[i].classList.add("active");
                }
            }
        });
    
        input.addEventListener('blur', () => {
    
            for( var i = 0; i < labels.length; i++ ) {
                labels[i].classList.remove("active");
            }
        });
    });
    
    sendButton.addEventListener("click", (event) => {

        event.preventDefault();
    
        forms.forEach(form => { 
            
            let data = new FormData(form);

            if( ckeditors != 'null'){

                Object.entries(ckeditors).forEach(([key, value]) => {
                    data.append(key, value.getData());
                });
            }

            let url = form.action;
    
            let sendPostRequest = async () => {
    
                try {
                    await axios.post(url, data).then(response => {
                        form.id.value = response.data.id;
                        table.innerHTML = response.data.table;
                        renderTable();
                    });
                    
                } catch (error) {
    
                    if(error.response.status == '422'){
    
                        let errors = error.response.data.errors;      
                        let errorMessage = '';
    
                        Object.keys(errors).forEach(function(key) {
                            errorMessage += '<li>' + errors[key] + '</li>';
                        })
        
                        document.getElementById('error-container').classList.add('active');
                        document.getElementById('errors').innerHTML = errorMessage;
                    }
                }
            };
    
            sendPostRequest();
        });
    });

    renderCkeditor();
};


export let renderTable = () => {

    let deleteButton = document.getElementById("delete-button");
    let editButton = document.getElementById("edit-button");
    let tableRows = document.querySelectorAll(".table-row");

    tableRows.forEach(tableRow => {

        tableRow.addEventListener("click", () => {
            editButton.dataset.elementId = tableRow.id;
            deleteButton.dataset.elementId = tableRow.id;
        });
    });

    editButton.addEventListener("click", () => {

        if(editButton.dataset.elementId != null){

            let url = editButton.dataset.url + '/' + editButton.dataset.elementId;

            let sendEditRequest = async () => {
    
                try {
                    await axios.get(url).then(response => {
                        form.innerHTML = response.data.form;
                        renderForm();
                    });
                    
                } catch (error) {
                    console.error(error);
                }
            };
    
            sendEditRequest();
        }
    });


    deleteButton.addEventListener("click", () => {

        if(deleteButton.dataset.elementId != null){

            let url = deleteButton.dataset.url + '/' + deleteButton.dataset.elementId;

            let sendDeleteRequest = async () => {
    
                try {
                    await axios.delete(url).then(response => {
                        table.innerHTML = response.data.table;
                        renderTable();
                    });
                    
                } catch (error) {
                    console.error(error);
                }
            };
    
            sendDeleteRequest();
        }
    });
};

renderForm();
renderTable();

