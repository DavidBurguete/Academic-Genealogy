window.addEventListener("load", () => {
    let isDropdownToggled = false;
    let languagesSelector = document.getElementById("languages");
    let languages = [...languagesSelector.children[0].children];
    let dropdown = document.getElementById("select-language");
    let notSelected = languagesSelector.children[0].querySelectorAll(":not(.selected)");
    let selected = languagesSelector.children[0].querySelector(".selected");
    let indexOfSelected = Array.prototype.indexOf.call(languagesSelector.children[0].children, selected);

    for (let i = 0; i < notSelected.length; i++) {
        if (indexOfSelected + 1 <= i && navigator.userAgent.includes("Firefox")) {
            notSelected[i].style = "transform: translateY(-1.4rem);";
        }
        else {
            notSelected[i].style = "transform: translateY(0);";
        }
    }

    languages.forEach(language => {
        language.addEventListener("click", (event) => {
            let oldCurrentLanguage = document.querySelector(".selected");
            let newCurrentLanguage = event.target;
            oldCurrentLanguage.classList.remove("selected");
            newCurrentLanguage.classList.add("selected");
            newCurrentLanguage.style = "transform: translateY(0);";
        });
    });

    languagesSelector.addEventListener("click", () => {
        isDropdownToggled = !isDropdownToggled;
        notSelected = languagesSelector.children[0].querySelectorAll(":not(.selected)");
        selected = languagesSelector.children[0].querySelector(".selected");
        indexOfSelected = Array.prototype.indexOf.call(languagesSelector.children[0].children, selected);
        if (isDropdownToggled) {
            dropdown.classList.add("toggled");
            for (let i = 0; i < notSelected.length; i++) {
                if (indexOfSelected + 1 <= i && navigator.userAgent.includes("Firefox")) {
                    notSelected[i].style = "transform: translateY(" + ((i + 1) * 2 - 1.5) + "rem);";
                }
                else {
                    notSelected[i].style = "transform: translateY(" + (i + 1) * 2 + "rem);";
                }
            }
        }
        else {
            dropdown.classList.remove("toggled");
            for (let i = 0; i < notSelected.length; i++) {
                if (indexOfSelected + 1 <= i && navigator.userAgent.includes("Firefox")) {
                    notSelected[i].style = "transform: translateY(-1.4rem);";
                }
                else {
                    notSelected[i].style = "transform: translateY(0);";
                }
            }
        }
    });
});