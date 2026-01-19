window.addEventListener("load", () => {
    let deleteButton = document.getElementById("modalDeleteButton");
    let deleteModal = document.getElementById("modalDelete");
    let closeModal = document.getElementById("closeModal");
    let body = document.querySelector("body");

    deleteButton.addEventListener("click", () => {
        let scrollHeight = window.scrollY / 16;
        body.style="overflow: hidden;";
        deleteModal.classList.add("toggle");
        deleteModal.style = "margin-top: " + scrollHeight + "rem;";
    });

    closeModal.addEventListener("click", () => {
        body.style="";
        deleteModal.classList.remove("toggle");
    });
});