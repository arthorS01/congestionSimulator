import fetchRequest from "./lib.js";

export function successFull(message){
    document.querySelector("#add-subscriber-btn").classList.add("success");
    document.querySelector("#add-subscriber-btn").value = message;

    setTimeout(function(){
        document.querySelector("#add-subscriber-btn").classList.remove("success");
        document.querySelector("#add-subscriber-btn").value = "Add subscriber";
    },2000)
}

export function processForm(response){
    if(response.status){
        successFull(response.msg);
    }else{
        failed(response.msg);
    }
}

function failed(msg){
    document.querySelector(".error-msg").innerHTML = msg;

    setTimeout(function(){
        document.querySelector(".error-msg").innerHTML = "";
    },5000);

}


export function blockLine(e){
    let uri = "http://localhost/congestionSimulator/block-line/"; 
    let id = e.currentTarget.getAttribute("data-id");
    fetchRequest({id},"UPDATE",uri,processBlock);
}

function processBlock(response){
   let element = document.querySelector(`button[data-id="${response.id}"]`);
   let parent = element.parentElement.parentElement;


   //update parent status icon
   parent.querySelector(".report-status span").innerHTML =  "Blocked";


   //update element icon
   element.querySelector("img").src = "http://localhost/congestionSimulator/assets/images/check.png";
   element.querySelector("img").setAttribute("title","Activate line");

   element.removeEventListener("click",blockLine);

   element.addEventListener("click",activateLine);

}

export function activateLine(e){

    let uri = "http://localhost/congestionSimulator/activate-line/"; 
    let id = e.currentTarget.getAttribute("data-id");
    fetchRequest({id},"UPDATE",uri,processActivation);
}

function processActivation(response){
    let element = document.querySelector(`button[data-id="${response.id}"]`);
    let parent = element.parentElement.parentElement;
    //update parent status icon
   
    parent.querySelector(".report-status span").innerHTML = "Active";
    
 
    //update element icon
    element.querySelector("img").src = "http://localhost/congestionSimulator/assets/images/block.png";
    element.querySelector("img").setAttribute("title","Block line");
 
    element.removeEventListener("click",activateLine);
 
    element.addEventListener("click",blockLine);
}

export function deleteRecord(e){
    let uri = "http://localhost/congestionSimulator/delete-record/"; 
    let id = e.currentTarget.getAttribute("data-call-id");
    fetchRequest({id},"DELETE",uri,processDelete);
}

function processDelete(response){
    
    let element = document.querySelector(`button[data-call-id="${response.id}"]`);
    let tr = element.parentElement.parentElement;
    tr.parentElement.removeChild(tr);

}

export function simulateCall(){
    document.querySelector("#phone-number") = "Simulating...";
    let caller_number = document.querySelector("#phone-number").innerHTML;
    let band_width = document.querySelector("#bandwidth").value;

    let uri = "http://localhost/congestionSimulator/simulate-call/"; 
    fetchRequest({caller_number,band_width},"POST",uri,processCall);
}

function processCall(response){
    let status = response.caller_status;
    let patner = response.call_patner;
    let callType = null;
    let call_text = null;

    if(status == 0){
        callType = "outgoing";
        call_text = "ringing...";
    }else{
        callType = "incoming";
        call_text = "incoming call...";
    }
    setTimeout(function(){
        document.querySelector("#simulate-call-btn").removeEventListener("click",simulateCall);
        document.querySelector("#simulate-call-btn").addEventListener("click",endSimulation);
        document.querySelector("#simulate-call-btn").classList.add("float");
        document.querySelector("#simulate-call-btn img").src = "http://localhost/congestionSimulator/assets/images/phone-call-end.png";
        document.querySelector("#simulate-call-btn img").title = "End simulation";
        document.querySelector("body").classList.add(callType);
        document.querySelector("h3").innerHTML = patner;
        document.querySelector("#phone-number").classList.add("call-text");
        document.querySelector("#phone-number").innerHTML = call_text;
    },3000,status,patner);
}

function endSimulation(){
    
}
export function showReport(e){
    let element = e.currentTarget;
    let all_tbody = document.querySelectorAll("tbody");

    all_tbody.forEach(tbody=>{
        if(tbody.getAttribute("id") == element.getAttribute("id") + "-tbody"){
            tbody.classList.remove("hidden")
        }else{
            tbody.classList.add("hidden");
            changeCaption(element.getAttribute("id"));
        }
    });

    document.querySelector(".active-view").classList.remove("active-view");
    element.parentElement.classList.add("active-view");

}

function changeCaption(id){
    let captionElement = document.querySelector("#caption");
    switch(id){
        case "all-btn":
            captionElement.innerHTML = "All calls";
            break;
        case "blocked-btn":
            captionElement.innerHTML = "Blocked calls";
            break;
        case "successful-btn":
            captionElement.innerHTML = "Successful calls";
            break;
    }
}

