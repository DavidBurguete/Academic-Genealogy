import { getMonthEs, getMonthEn, getMonthFr } from "./month_language_setter.js";

window.addEventListener("load", () => {
    let dates = document.getElementsByTagName("i");
    let locale = window.location.pathname.split("/")[1];
    Array.from(dates).forEach(date => {
        let unknownexactdate = date.parentElement.children[2].innerHTML;
        let date_formatted = new Date(date.innerHTML);
        if(date_formatted.toString() !== "Invalid Date"){
            let month = date_formatted.getMonth();
            switch (locale) {
                case "es":
                    date.innerHTML = (unknownexactdate != "" ? '' : date_formatted.getDate() + " de ") 
                                    + (unknownexactdate == "month" ? '' : getMonthEs(month) + " de ") 
                                    + date_formatted.getFullYear();
                    break;
                case "en":
                    date.innerHTML = (unknownexactdate == "month" ? '' : getMonthEn(month) + " ") 
                                    + (unknownexactdate != "" ? '' : date_formatted.getDate() + ", ") 
                                    + date_formatted.getFullYear();
                    break;
                case "fr":
                    date.innerHTML = (unknownexactdate != "" ? '' : date_formatted.getDate() + " ") 
                                    + (unknownexactdate == "month" ? '' : getMonthFr(month) + " ") 
                                    + date_formatted.getFullYear();
                    break;
            }
        }
    });
});