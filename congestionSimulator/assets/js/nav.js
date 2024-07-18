function updateNavigation(){
    let activeTab = document.querySelector("#active-tab").value;

    if(activeTab!="index"){
        document.querySelector(`#header-div ul li button[data-name='${activeTab}']`).classList.add("active");
    }
    
   
     return activeTab;
}


export default updateNavigation;