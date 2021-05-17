const tabsItems = document.querySelectorAll('.tab-item');
const tabPanels = document.querySelectorAll(".tab-panel");

tabsItems.forEach(tabsItem => { 

    tabsItem.addEventListener("click", () => {

        let activeElements = document.querySelectorAll(".tab-active");

        activeElements.forEach(activeElement => {
            activeElement.classList.remove("tab-active");
        });
        
        tabsItem.classList.add("tab-active");

        tabPanels.forEach(tabPanel => {

            if(tabPanel.dataset.tab == tabsItem.dataset.tab){
                tabPanel.classList.add("tab-active"); 
            }
        }); 
    });

});


