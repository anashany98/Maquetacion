const tabsPanels = document.querySelectorAll(".tab-panel");
const tabsItems = document.querySelectorAll(".tab-item");

tabsItems.forEach(tabItem => {

    tabsItems.addEventListener("click",() =>{


        let activeElements = document.querySelectorAll(".tab-active");

        activeElements.forEach(activeElement => {

            activeElements.classList.remove("tab-active");

        });

        tabItem.classList.ass("tab-active");

        tabsPanels.forEach(tabPanel => {


            if(tabsPanel.dataset.tab == tabItem.dataset.tab){
                tabPanel.classList.add("tab-active");
            }

        });
    });
});


