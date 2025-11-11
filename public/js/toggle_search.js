window.addEventListener("load", () => {
    let screen_width = window.screen.width;
    let isToggled = false;
    let displaySearch = document.getElementById("display");
    let search = document.getElementById("search");
    let searchBar = document.getElementById("search-bar");
    let close = document.getElementById("close");
    let title = document.getElementById("title");
    let nav = document.querySelector(".header--nav");
    if(screen_width < 1000){
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
                close.style = "transform:  translateY(-4.25rem);";
                search.style = "transform: translateX(0);";
            }
        });
    }
    else{
        displaySearch.addEventListener("click", (event) => {
            isToggled = true;
            if (isToggled) {
                nav.style = "right: 40rem;";
                searchBar.classList.add("toggled");
                close.classList.add("toggled");
                search.classList.add("toggled");
            }
        });
        close.addEventListener("click", (event) => {
            isToggled = false;
            if (!isToggled) {
                nav.style = "right: 24rem;";
                searchBar.classList.remove("toggled");
                close.classList.remove("toggled");
                search.classList.remove("toggled");
            }
        });
    }
});