import {renderCkeditor} from './ckeditor';
import {showAdvisor} from './advisor';
import {startWait, stopWait} from './loading';
import {renderFilterTable} from './filter';
import {renderUploadImage} from './uploadImage';
import {renderLocaleTabs}  from './tabs_locale';
import {renderLocaleSeo} from './localeSeo';
import {renderGoogleBot} from './googleBot';
import {renderSitemap} from './sitemap';
import {renderTabs} from './tabs'

import axios from 'axios';

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
    
                startWait();

                try {
                    await axios.post(url, data).then(response => {
                       
                       if( response.data.id)
                        form.id.value = response.data.id;
                        table.innerHTML = response.data.table;
                        
                        
                        stopWait();
                        showAdvisor('success', response.data.message);
                        renderTable();
                        
                    });
                    
                } catch (error) {
    
                    
                    stopWait();

                    if(error.response.status == '422'){
    
                        let errors = error.response.data.errors;      
                        let errorMessage = '';
    
                        Object.keys(errors).forEach(function(key) {
                            errorMessage += '<li>' + errors[key] + '</li>';
                        })
        
                        showAdvisor('error', errorMessage);

                        // document.getElementById('error-container').classList.add('active');
                        // document.getElementById('errors').innerHTML = errorMessage;
                    }
                }
            };
    
            sendPostRequest();
    
        });

    });

    renderCkeditor();
    renderUploadImage();
    renderLocaleTabs();
    renderTabs();
    renderLocaleSeo();
    renderGoogleBot();
    renderSitemap();

};


export let renderTable = () => {

    let deleteButton = document.getElementById("delete-button");
    let editButton = document.getElementById("edit-button");
    let tableRows = document.querySelectorAll(".table-row");
    let paginationButtons = document.querySelectorAll('.pagination-table-button');

    tableRows.forEach(tableRow => {

        tableRow.addEventListener("click", () => {
            if(tableRow.id){
                editButton.dataset.elementId = tableRow.id;
                deleteButton.dataset.elementId = tableRow.id;
            }else{
                editButton.dataset.group = tableRow.dataset.group;
                editButton.dataset.key = tableRow.dataset.key;

                if(deleteButton){
                    deleteButton.dataset.group = tableRow.dataset.group;
                    deleteButton.dataset.key = tableRow.dataset.key;
                }
            }
        });
    });

    if(editButton){

        editButton.addEventListener("click", () => {

            if(editButton.dataset.elementId != null){

                var url = editButton.dataset.url + '/' + editButton.dataset.elementId;

            }else{

                var url = editButton.dataset.url + '/' + editButton.dataset.group + '/' + editButton.dataset.key;
            }

            if(editButton.dataset.group != null){

                var url = editButton.dataset.url + '/' + editButton.dataset.key;
            }    
            
            console.log(url);
            
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
        
        });
    }    
    
    if(deleteButton){

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
    }



    function sortTableByColumn(tables, column, asc = true)  {
    
        const dirModifier = asc ? 1 : -1;
        const tBody = tables.tBodies[0];
        const rows = Array.from(tBody.querySelectorAll("tr")); 
        
        const sortedRows = rows.sort((a, b) => {
            const aColText = a.querySelector(`td:nth-child(${ column + 1 })`).textContent.trim();
            const bColText = b.querySelector(`td:nth-child(${ column + 1 })`).textContent.trim();
    
            return aColText > bColText ?  ( 1 * dirModifier) : (-1 * dirModifier); 
        });
        
        while (tBody.firstChild) {
                tBody.removeChild(tBody.firstChild);
        }
        
        tBody.append(...sortedRows);
    
        table.querySelectorAll("th").forEach(th => th.classList.remove("th-sort-asc", "th-sort-desc"));
        table.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("th-sort-asc", asc);
        table.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("th-sort-desc", !asc);
    
    }
    
    // sortTableByColumn(document.querySelector("table.info"), 1, true);
    
    document.querySelectorAll(".table-info th").forEach(headerCell => {
    
        headerCell.addEventListener("click", () => {
    
            const tableElement = headerCell.parentElement.parentElement.parentElement;
            const headerIndex = Array.prototype.indexOf.call(headerCell.parentElement.children, headerCell);
            const currentIsAscendig = headerCell.classList.contains("th-sort-asc");
            
            sortTableByColumn(tableElement, headerIndex, !currentIsAscendig);  
    
    
        
        })
    
    })
        
    
    paginationButtons.forEach(paginationButton => {

        paginationButton.addEventListener("click", () => {

            let url = paginationButton.dataset.page;

            let sendPaginationRequest = async () => {

                try {
                    await axios.get(url).then(response => {
                        table.innerHTML = response.data.table;
                        renderTable();
                    });
                    
                } catch (error) {
                    console.error(error);
                }
            };

            sendPaginationRequest();
            
        });
    });

    renderFilterTable();

};


renderForm();
renderTable();