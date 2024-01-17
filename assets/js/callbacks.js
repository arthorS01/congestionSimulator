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