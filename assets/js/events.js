import updateNavigation from "./nav.js";

function loadEvents(){
    window.addEventListener("DOMContentLoaded",_=>{
        let activeTab = updateNavigation();

        if(activeTab == "call"){
            document.querySelector("#settings-btn").addEventListener("click",_=>{
                document.querySelector("#settings #box").classList.toggle("visible");
            })
        }
    });

    
}

export default loadEvents;