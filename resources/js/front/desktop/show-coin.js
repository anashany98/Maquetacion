const showcoins = document.querySelectorAll(".coins");
const maincontent = document.getElementById('main-content');


showcoins.forEach(showcoin =>{

    showcoin.addEventListener("click", () => {

        let url = showcoin.dataset.url;

        let RefreshRequest = async () => {

            try {
                await axios.get(url).then(response => {
                    
                    maincontent.innerHTML = response.data.product;

                
                    window.history.pushState('','',url);

                });
                
            } catch (error) {
                console.error(error);
            }

            
        };

        RefreshRequest();
    });
});

