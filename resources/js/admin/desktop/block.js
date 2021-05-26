export let block = () =>{

    let blockInputs = document.querySelectorAll(".block-input");

    if(blockInputs){
        
        blockInputs.forEach(blockInput => {

            let originalInput = blockInput.value.match(/\{.*?\}/g)
            let setInput = ""

            if (originalInput){

                blockInput.addEventListener("keydown", () =>{
                    setInput = blockInput.value;
    
                });   

                blockInput.addEventListener("keyup", () =>{
                    let finalInput = blockInput.value.match(/\{.*?\}/g)

                    if (finalInput){
                        if(originalInput.toString() != finalInput.toString()){
                            blockInput.value = setInput;
                        }

                    }else{
                        blockInput.value = setInput;
                    }
                    
                    setInput = blockInput.value
                })
            }  
        })
    }
}