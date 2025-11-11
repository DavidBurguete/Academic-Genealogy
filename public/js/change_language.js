window.addEventListener("load", () => {
    let screen_width = window.screen.width;
    let isDropdownToggled = false;
    let languagesSelector = document.getElementById("languages");
    let dropdown = document.getElementById("select-language");
    let selected = document.querySelector(".selected");
    let notSelected = languagesSelector.children[0].querySelectorAll("img:not(.selected)");

    dropdown.addEventListener("click", toggleLanguages);
    selected.addEventListener("click", toggleLanguages);

    function toggleLanguages ()  {
        isDropdownToggled = !isDropdownToggled;
        if (isDropdownToggled) {
            dropdown.classList.add("toggled");
            for (let i = 0; i < notSelected.length; i++) {
                if (screen_width < 1000) {
                    notSelected[i].style = "transform: translateY(" + (i + 1) * 2 + "rem);";
                }
                else {
                    notSelected[i].style = "transform: translateY(" + (i + 1) * 2.5 + "rem);";
                }
            }
        }
        else {
            dropdown.classList.remove("toggled");
            for (let i = 0; i < notSelected.length; i++) {
                notSelected[i].style = "transform: translateY(0);";
            }
        }
    }
});