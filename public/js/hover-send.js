window.addEventListener("load", () => {
    let sendIcon = document.getElementById("submit");
    sendIcon.addEventListener("mouseenter", () => {
        sendIcon.classList.add("send-animation");
    });
    sendIcon.addEventListener("mouseleave", () => {
        sendIcon.classList.remove("send-animation");
    });
});