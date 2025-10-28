window.addEventListener("load", () => {
    let isToggled = false;
    let search = document.getElementById("search");
    let searchBar = document.getElementById("search-bar");
    let title = document.getElementById("title");
    search.addEventListener("click", () => {
        isToggled = !isToggled;
        if(isToggled){
            title.style = "transform: translateY(-4.25rem);";
            searchBar.style = "transform:  translateY(0);";
        }
        else{
            title.style = "transform: translateY(0);";
            searchBar.style = "transform:  translateY(-4.25rem);";
        }
    });
});