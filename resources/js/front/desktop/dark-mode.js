const darks = document.querySelectorAll('.dark-mode');

darks.forEach(dark => { 

    dark.addEventListener("click", () => {

        let activeElements = document.querySelectorAll(".active-dark");

        activeElements.forEach(activeElement => {
            activeElement.classList.remove(".active-dark");
        });
        
        dark.classList.add(".active-dark");

    });

});


