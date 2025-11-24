window.addEventListener("load", function () {
    let toggler = document.getElementById("show");
    let open = document.getElementById("open");
    let close = document.getElementById("closed");
    let password = document.getElementById("password");
    let confirmpassword = document.getElementById("confirm-password");
    let toggled = false;

    toggler.addEventListener("click", function () {
        toggled = !toggled;
        if (toggled) {
            open.classList.remove("hidden");
            close.classList.add("hidden");
            password.type = "text";
            confirmpassword.type = "text";
        }
        else {
            open.classList.add("hidden");
            close.classList.remove("hidden");
            password.type = "password";
            confirmpassword.type = "password";
        }
    });
});