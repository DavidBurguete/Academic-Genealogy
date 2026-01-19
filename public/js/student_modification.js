window.addEventListener("load", () => {
    let student_quantity = document.getElementById("student-quantity") != null ? parseInt(document.getElementById("student-quantity").innerHTML) : 0;
    let new_student = document.getElementById("new-student");
    let students = JSON.parse(document.getElementById("students-list") == null ? document.getElementById("everyone-list").innerHTML : document.getElementById("students-list").innerHTML);
    let delete_students = document.querySelectorAll('[data-type=delete]');
    let faculty = document.getElementsByTagName("header")[0].classList[1];

    for (let i = 0; i < delete_students.length; i++) {
        let delete_student = delete_students[i];
        delete_student.addEventListener("click", () => {
            delete_student.parentElement.remove();
        });
    }

    new_student.addEventListener("click", () => {
        let add_new_student = document.createElement("li");
        let students_as_options = document.createElement("select");
        let delete_student = document.createElement("button");

        delete_student.classList.add('delete');
        delete_student.setAttribute("data-type", "delete");
        delete_student.innerHTML = "X";

        delete_student.addEventListener("click", () => {
            delete_student.parentElement.remove();
        });

        students_as_options.classList.add(faculty + "-underline");
        students_as_options.name = "students[" + student_quantity + "]";
        let blank_option = document.createElement("option");
        blank_option.value = "";
        blank_option.innerHTML = "— — — — —";
        students_as_options.append(blank_option);
        students.forEach(student => {
            let student_as_option = document.createElement("option");
            student_as_option.value = student.id;
            student_as_option.innerHTML = student.name + " " + student.surname1 + (!student.surname2 ? '' : ' ' + student.surname2);
            students_as_options.append(student_as_option);
        });
        student_quantity++;

        add_new_student.classList.add("relations");
        add_new_student.append(students_as_options);
        add_new_student.append(delete_student);
        new_student.parentElement.insertBefore(add_new_student, new_student);
    });
});