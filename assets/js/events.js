import updateNavigation from "./nav.js";
import fetchRequest from "./lib.js";
import * as callbacks from "./callbacks.js";

function loadEvents(){
    window.addEventListener("DOMContentLoaded",_=>{
        let activeTab = updateNavigation();

        
        switch(activeTab){
            case  "call":
                document.querySelector("#settings-btn").addEventListener("click",_=>{
                    document.querySelector("#settings #box").classList.toggle("visible");
                });

                let call_btn = document.querySelector("#simulate-call-btn");
                
                call_btn.addEventListener("click",callbacks.simulateCall);

            
                
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
                });
                break;

            case "sim-report":
                let all_block_btns = document.querySelectorAll(".block-btn");
                all_block_btns.forEach(btn=>{
                    btn.addEventListener("click",callbacks.blockLine);
                });

                let all_activate_btns = document.querySelectorAll(".activate-btn");
                all_activate_btns.forEach(btn=>{
                    btn.addEventListener("click",callbacks.activateLine);
                });
                document.querySelector(".print-btn").addEventListener("click",_=>{
                    window.print();
                });

            break;
            case "call-report":
                let all_delete_btns = document.querySelectorAll(".delete-btn");
                all_delete_btns.forEach(btn=>{
                    btn.addEventListener("click",callbacks.deleteRecord);
                });

                let all_nav_btn = document.querySelectorAll("#view-selection-pane button");
                all_nav_btn.forEach(btn=>{
                    btn.addEventListener("click",callbacks.showReport);
                });

                document.querySelector(".print-btn").addEventListener("click",_=>{
                    window.print();
                });

            break;
         
        }
    });
   

    

    
}

export default loadEvents;