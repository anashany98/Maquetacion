const advisorContainer = document.getElementById('advisor-container');
const advisor = document.querySelectorAll('.advisor');

export let showAdvisor = (state, advisorText) => {

    advisor.forEach(advisor => {

        if(advisor.classList.contains(state)){

            let advisorMessage = document.getElementById('advisor-description-'+ state);
            
            advisorContainer.classList.add('active');
            advisor.classList.add('advisor-active');
            advisorMessage.innerHTML = advisorText;

            setTimeout(function(){ 
                advisorContainer.classList.remove('active');
                advisor.classList.remove('advisor-active');
            }, 7000);
        };
    });
}