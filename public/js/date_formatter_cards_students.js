import { getMonthEs, getMonthEn, getMonthFr } from "./month_language_setter.js";

window.addEventListener("load", () => {
    let dates = document.getElementById("students").children;
    let locale = window.location.pathname.split("/")[1];
    Array.from(dates).forEach(date => {
        let only_date = date.children[0].innerHTML.split('--')[1];
        let date_formatted = new Date(only_date);
        if(date_formatted.toString() !== "Invalid Date"){
            let month = date_formatted.getMonth();
            let unknownexactdate = date.children[0].children[0].innerHTML;
            let date_legible = "";
            switch (locale) {
                case "es":
                     date_legible = (unknownexactdate != "" ? '' : date_formatted.getDate() + " de ")
                        + (unknownexactdate == "month" ? '' : getMonthEs(month) + " de ")
                        + date_formatted.getFullYear();
                    date.children[0].innerHTML = date.children[0].innerHTML.split('--')[0] + " (" + date_legible + ")";
                    break;
                case "en":
                    date_legible = (unknownexactdate == "month" ? '' : getMonthEn(month) + " ") 
                                    + (unknownexactdate != "" ? '' : date_formatted.getDate() + ", ") 
                                    + date_formatted.getFullYear();
                    date.children[0].innerHTML = date.children[0].innerHTML.split('--')[0] + " (" + date_legible + ")";
                    break;
                case "fr":
                    date_legible = (unknownexactdate != "" ? '' : date_formatted.getDate() + " ") 
                                    + (unknownexactdate == "month" ? '' : getMonthFr(month) + " ") 
                                    + date_formatted.getFullYear();
                    date.children[0].innerHTML = date.children[0].innerHTML.split('--')[0] + " (" + date_legible + ")";
                    break;
            }
        }
    });
});