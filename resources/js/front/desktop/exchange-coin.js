const fiats = document.querySelectorAll('.fiat');
const coins = document.querySelectorAll(".coin");

fiats.forEach(fiat => { 

    fiat.addEventListener("click", () => {

        let activeElements = document.querySelectorAll(".exhange-active");

        activeElements.forEach(activeElement => {
            activeElement.classList.remove(".exhange-active");
        });
        
        fiat.classList.add(".exhange-active");

        fiats.forEach(coin => {

            if(coin.dataset.tab == fiat.dataset.tab){
                coin.classList.add(".exhange-active"); 
            }
        }); 
    });

});


