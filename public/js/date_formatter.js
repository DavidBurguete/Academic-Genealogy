window.addEventListener("load", () => {
    let dates = document.getElementsByTagName("i");
    let locale = window.location.pathname.split("/")[1];
    Array.from(dates).forEach(date => {
        let unknownexactdate = date.parentElement.children[2].innerHTML;
        console.log(unknownexactdate);
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

function getMonthEs(month) {
    switch (month) {
        case 0:
            return "Enero";
        case 1:
            return "Febrero";
        case 2:
            return "Marzo";
        case 3:
            return "Abril";
        case 4:
            return "Mayo";
        case 5:
            return "Junio";
        case 6:
            return "Julio";
        case 7:
            return "Agosto";
        case 8:
            return "Septiembre";
        case 9:
            return "Octubre";
        case 10:
            return "Noviembre";
        case 11:
            return "Diciembre";
    }
}

function getMonthEn(month) {
    switch (month) {
        case 0:
            return "January";
        case 1:
            return "February";
        case 2:
            return "March";
        case 3:
            return "April";
        case 4:
            return "May";
        case 5:
            return "June";
        case 6:
            return "July";
        case 7:
            return "August";
        case 8:
            return "September";
        case 9:
            return "October";
        case 10:
            return "November";
        case 11:
            return "December";
    }
}

function getMonthFr(month) {
    switch (month) {
        case 0:
            return "Janvier";
        case 1:
            return "Février";
        case 2:
            return "Mars";
        case 3:
            return "Avril";
        case 4:
            return "Mai";
        case 5:
            return "Juin";
        case 6:
            return "Juillet";
        case 7:
            return "Août";
        case 8:
            return "Septembre";
        case 9:
            return "Octobre";
        case 10:
            return "Novembre";
        case 11:
            return "Décembre";
    }
}