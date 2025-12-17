window.addEventListener("load", () => {
    let faculty = document.getElementById("faculty");
    faculty.addEventListener("change", () => {
        let redirect = new URL(window.location);
        redirect.searchParams.set("faculty", faculty.value);
        faculty.value == "" ? redirect.searchParams.delete("faculty") : null;
        window.location.href = redirect.toString();
    });
});