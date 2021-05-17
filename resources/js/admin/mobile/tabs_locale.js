export let renderLocaleTabs = () => {

    let tabsLanguagesItems = document.querySelectorAll('.tab-language-item');
    let tabsLanguagePanels =document.querySelectorAll('.tab-language-panel');

    tabsLanguagesItems.forEach(tabsLanguagesItem => { 

        tabsLanguagesItem.addEventListener("click", () => {

            let activeElements = document.querySelectorAll(".tab-translate-active");
            let activeTab = tabsLanguagesItem.dataset.tab;
            

            activeElements.forEach(activeElement => {

                if(activeElement.dataset.tab == activeTab){
                    activeElement.classList.remove("tab-translate-active");
                }
            });

            tabsLanguagesItem.classList.add("tab-translate-active");

            tabsLanguagePanels.forEach(tabLanguagePanel=> {
        
                if(tabLanguagePanel.dataset.tab == activeTab){
                    if(tabLanguagePanel.dataset.localetab == tabsLanguagesItem.dataset.localetab){
                        tabLanguagePanel.classList.add("tab-translate-active"); 
                    }
                }                
            });
                
        });

    });
}

renderLocaleTabs();
