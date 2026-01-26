window.addEventListener("load", () => {
    let non_applicable_value = document.getElementById("nonapplicablevalue");
    let portrait_text_sepparator = document.getElementById("portraittextsepparator");
    let portrait_name = document.getElementById("portraitname");
    let file_input = document.getElementById("portrait");
    let file_label = document.getElementById("portraitlabel");
    file_input.addEventListener("change", (e) => {
        portrait_name.innerText = file_input.value.split(/(\\|\/)/g).pop();
        let image = e.target.files[0];
        if(!image) return;
        
        const reader = new FileReader();
        reader.onload = (e) => {
            const proportions = new Image();
            proportions.onload = () => {
                if(proportions.width != 250 || proportions.height != 389){
                    non_applicable_value.classList.remove('hidden');
                    portrait_text_sepparator.classList.remove('hidden');
                }
                else {
                    non_applicable_value.classList.add('hidden');
                    portrait_text_sepparator.classList.add('hidden');
                }
            }

            proportions.src = e.target.result;
            file_label.style.backgroundImage = `url(${e.target.result})`;
        }

        reader.readAsDataURL(image);
    });
});