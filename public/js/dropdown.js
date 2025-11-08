window.addEventListener("load", () => {
    let isShown = false;
    let anchor6 = document.querySelector("a[href='#bibliography-6']");
    let dropdown = document.getElementById("show-bibliography");
    let bibliography = document.getElementById("bibliography");

    dropdown.addEventListener("click", () => {
        isShown = !isShown;
        if (isShown) {
            dropdown.classList.add("toggled");
            bibliography.classList.add("toggled");
        }
        else {
            dropdown.classList.remove("toggled");
            bibliography.classList.remove("toggled");
        }
    });

    anchor6.addEventListener("click", () => {
        isShown = true;
        if (isShown) {
            dropdown.classList.add("toggled");
            bibliography.classList.add("toggled");
        }
    });
});