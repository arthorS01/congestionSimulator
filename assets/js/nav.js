function updateNavigation(){
    let activeTab = document.querySelector("#active-tab").value;
    document.querySelector(`#header-div ul li button[data-name='${activeTab}']`).classList.add("active");
   
     return activeTab;
}


export default updateNavigation;