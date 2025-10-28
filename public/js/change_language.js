window.addEventListener("load", () => {
    let isDropdownToggled = false;
    let languagesSelector = document.getElementById("languages");
    let languages = [...languagesSelector.children[0].children];
    let dropdown = document.getElementById("select-language");

    languages.forEach(language => {
        language.addEventListener("click", (event) => {
            let oldCurrentLanguage = document.querySelector(".selected");
            let newCurrentLanguage = event.target;
            let languagePosition = newCurrentLanguage.classList[0];
            oldCurrentLanguage.classList.remove("selected");
            newCurrentLanguage.classList.add("selected");
            newCurrentLanguage.classList.remove(languagePosition);
            oldCurrentLanguage.classList.add(languagePosition);
        });
    });

    languagesSelector.addEventListener("click", () => {
        isDropdownToggled = !isDropdownToggled;
        if (isDropdownToggled) {
            dropdown.classList.add("toggled");
            for (let i = 0; i < languages.length; i++) {
                if (!languages[i].classList.contains("selected")) {
                    languages[i].classList.remove("not-selected-collapsed");
                }
            }
        }
        else {
            dropdown.classList.remove("toggled");
            for (let i = 0; i < languages.length; i++) {
                if (!languages[i].classList.contains("selected")) {
                    languages[i].classList.add("not-selected-collapsed");
                }
            }
        }
    });
});