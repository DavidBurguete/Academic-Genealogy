window.addEventListener("load", () => {
    let menu = document.querySelector(".burger_menu");
    let nav = document.getElementById("deployNav");
    let first = document.querySelector(".burger_menu--first");
    let middle = document.querySelector(".burger_menu--middle");
    let last = document.querySelector(".burger_menu--last");
    let isToggled = false;
    menu.addEventListener("click", () => {
        isToggled = !isToggled;
        if(isToggled){
            first.classList.add("burger_menu--first--crossed");
            middle.classList.add("burger_menu--middle--crossed");
            last.classList.add("burger_menu--last--crossed");
            nav.classList.replace("deploy_nav--non_active", "deploy_nav--active");
        }
        else{
            first.classList.remove("burger_menu--first--crossed");
            middle.classList.remove("burger_menu--middle--crossed");
            last.classList.remove("burger_menu--last--crossed");   
            nav.classList.replace("deploy_nav--active", "deploy_nav--non_active");
        }
    })
});
