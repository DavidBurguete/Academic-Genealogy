import { getMonthEs, getMonthEn, getMonthFr } from "./month_language_setter.js";

window.addEventListener("load", () => {
    let dates = document.getElementsByClassName("life-date");
    let unknownexactdate = document.getElementById("unknownexactdate").innerHTML;
    let locale = window.location.pathname.split("/")[1];
    Array.from(dates).forEach(date => {
        let date_formatted = new Date(date.innerHTML);
        if (date_formatted.toString() !== "Invalid Date") {
            let month = date_formatted.getMonth();
            switch (locale) {
                case "es":
                    date.innerHTML = (date.tagName == "SPAN" && unknownexactdate != "" ? '' : date_formatted.getDate() + " de ")
                        + (date.tagName == "SPAN" && unknownexactdate == "month" ? '' : getMonthEs(month) + " de ")
                        + date_formatted.getFullYear();
                    break;
                case "en":
                    date.innerHTML = (date.tagName == "SPAN" && unknownexactdate == "month" ? '' : getMonthEn(month) + " ")
                        + (date.tagName == "SPAN" && unknownexactdate != "" ? '' : date_formatted.getDate() + ", ")
                        + date_formatted.getFullYear();
                    break;
                case "fr":
                    date.innerHTML = (date.tagName == "SPAN" && unknownexactdate != "" ? '' : date_formatted.getDate() + " ")
                        + (date.tagName == "SPAN" && unknownexactdate == "month" ? '' : getMonthFr(month) + " ")
                        + date_formatted.getFullYear();
                    break;
            }
        }
    });
});