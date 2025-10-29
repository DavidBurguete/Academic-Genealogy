window.addEventListener("load", () => {
    let isToggled = false;
    let displaySearch = document.getElementById("display");
    let search = document.getElementById("search");
    let searchBar = document.getElementById("search-bar");
    let close = document.getElementById("close");
    let title = document.getElementById("title");
    displaySearch.addEventListener("click", (event) => {
        isToggled = true;
        if (isToggled) {
            title.style = "transform: translateY(-4.25rem);";
            searchBar.style = "transform:  translateY(0);";
            close.style = "transform:  translateY(0);";
            search.style = "transform: translateX(-2.25rem);";
        }
    });
    close.addEventListener("click", (event) => {
        isToggled = false;
        if (!isToggled) {
            title.style = "transform: translateY(0);";
            searchBar.style = "transform:  translateY(-4.25rem);";
            event.target.parentElement.style = "transform:  translateY(-4.25rem);";
            search.style = "transform: translateX(0);";
        }
    });
});