window.addEventListener("load", () => {
    let director_quantity = document.getElementById("director-quantity") != null ? parseInt(document.getElementById("director-quantity").innerHTML) : 0;
    let new_director = document.getElementById("new-director");
    let directors = JSON.parse(document.getElementById("directors-list") == null ? document.getElementById("everyone-list").innerHTML : document.getElementById("directors-list").innerHTML);
    let delete_directors = document.querySelectorAll('[data-type=delete]');
    let faculty = document.getElementsByTagName("header")[0].classList[1];

    for (let i = 0; i < delete_directors.length; i++) {
        let delete_director = delete_directors[i];
        delete_director.addEventListener("click", () => {
            delete_director.parentElement.remove();
            director_quantity >= 3 ? (new_director.style = '') : null;
            director_quantity--;
        });
    }

    new_director.addEventListener("click", () => {
        let add_new_director = document.createElement("p");
        let directors_as_options = document.createElement("select");
        let Dlabel = document.createElement("label");
        let Mlabel = document.createElement("label");
        let Dinput = document.createElement("input");
        let Minput = document.createElement("input");
        let Dspan = document.createElement("span");
        let Mspan = document.createElement("span");
        let delete_director = document.createElement("button");

        Dlabel.classList.add("faculty-teseo");
        Dlabel.htmlFor = "D-" + director_quantity;
        Mlabel.classList.add("faculty-teseo");
        Mlabel.htmlFor = "M-" + director_quantity;

        Dinput.type = "radio";
        Dinput.value = "D";
        Dinput.id = "D-" + director_quantity;
        Dinput.name = "relationtypes[" + director_quantity + "]";

        Minput.type = "radio";
        Minput.value = "M";
        Minput.id = "M-" + director_quantity;
        Minput.name = "relationtypes[" + director_quantity + "]";

        Dlabel.append(Dinput);
        Dspan.style = "line-height: 1rem;";
        Dspan.innerHTML = '&Dscr;';
        Dlabel.append("[ ");
        Dlabel.append(Dspan);
        Dlabel.append(" ]");

        Mlabel.append(Minput);
        Dspan.style = "line-height: 1rem;";
        Mspan.innerHTML = '&Mscr;';
        Mlabel.append("[ ");
        Mlabel.append(Mspan);
        Mlabel.append(" ]");

        delete_director.classList.add('delete');
        delete_director.setAttribute("data-type", "delete");
        delete_director.innerHTML = "X";

        delete_director.addEventListener("click", () => {
            delete_director.parentElement.remove();
            director_quantity >= 3 ? (new_director.style = '') : null;
            director_quantity--;
        });

        directors_as_options.classList.add(faculty + "-underline");
        directors_as_options.name = "directors[" + director_quantity + "]";
        let blank_option = document.createElement("option");
        blank_option.value = "";
        blank_option.innerHTML = "— — — — —";
        directors_as_options.append(blank_option);
        directors.forEach(director => {
            let director_as_option = document.createElement("option");
            director_as_option.value = director.id;
            director_as_option.innerHTML = director.name + " " + director.surname1 + (!director.surname2 ? '' : ' ' + director.surname2);
            directors_as_options.append(director_as_option);
        });

        add_new_director.classList.add("relations");
        add_new_director.append(directors_as_options);
        add_new_director.append(Dlabel);
        add_new_director.append(Mlabel);
        add_new_director.append(delete_director);
        new_director.parentElement.insertBefore(add_new_director, new_director);

        director_quantity++;
        if(director_quantity >= 3) {
            new_director.style = "display: none;";
        }
    });
});