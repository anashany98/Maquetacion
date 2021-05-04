const tabsLenguage = document.querySelectorAll('.tab-lenguage');
tabsLenguage.forEach(tabsLenguage => { 

    tabsLenguage.addEventListener("click", () => {

        let activeElements = document.querySelectorAll(".tab-translate-active");

        activeElements.forEach(activeElement => {
            activeElement.classList.remove("tab-translate-active");
        });

        tabsLenguage.classList.add("tab-translate-active");

        console.log(tabsLenguage)

    });
});
