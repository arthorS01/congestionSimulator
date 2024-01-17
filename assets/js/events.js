import updateNavigation from "./nav.js";
import fetchRequest from "./lib.js";
import * as callbacks from "./callbacks.js";

function loadEvents(){
    window.addEventListener("DOMContentLoaded",_=>{
        let activeTab = updateNavigation();

        console.log(activeTab);
        switch(activeTab){
            case  "call":
                document.querySelector("#settings-btn").addEventListener("click",_=>{
                    document.querySelector("#settings #box").classList.toggle("visible");
                })
                break;
            case "subscribe":
                document.querySelector("#add-subscriber-btn").addEventListener("click",e=>{
                    e.preventDefault();
                    let form_data = {};
                    form_data.fname = document.querySelector("#fname").value;
                    form_data.lname = document.querySelector("#lname").value;
                    form_data.phone_number = document.querySelector("#phonenum").value;
                    form_data.service_provider = document.querySelector("#service-provider").value;


                    fetchRequest(form_data,"POST","http://localhost/congestionSimulator/subscribe/",callbacks.processForm);
                })
        }
    });

    

    
}

export default loadEvents;