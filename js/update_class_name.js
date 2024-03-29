function update_student_class(roll_no)
{
    let select_person=roll_no;
    let class_name=select_person+'_class_name';
    let class_name_value=document.getElementById(class_name).value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let response_place=select_person+'_class_response';
            document.getElementById(response_place).innerHTML = this.responseText;
        }
    };

    xhttp.open("GET", "scripts/update_student_class_script.php?roll_no="+roll_no+"&class_name="+class_name_value, true);
    xhttp.send();
}


function update_student_status(roll_no)
{
    let select_person=roll_no;
    let student_status=select_person+'_student_status';
    let student_status_value=document.getElementById(student_status).value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
// To show all responses in same place "class_response" is used. It solves space problem.
            let response_place=select_person+'_class_response';
            document.getElementById(response_place).innerHTML = this.responseText;
        }
    };

    xhttp.open("GET", "scripts/update_student_status_script.php?roll_no="+roll_no+"&student_status="+student_status_value, true);
    xhttp.send();
}

//update student class

function update_student_class_no(roll_no)
{

    let select_person=roll_no;
    let student_class_no=select_person+'_student_class_no';

    let student_class_no_value=document.getElementById(student_class_no).value;
    console.log(student_class_no_value);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
// To show all responses in same place "class_response" is used. It solves space problem.
            let response_place=select_person+'_class_response';
            document.getElementById(response_place).innerHTML = this.responseText;
        }
    };

    xhttp.open("GET", "scripts/update_student_class_no_script.php?roll_no="+roll_no+"&student_class_no="+student_class_no_value, true);
    xhttp.send();
}

//update graduation year

function update_graduation_year(roll_no)
{

    let select_person=roll_no;
    let graduation_year=select_person+'_graduation_year';

    let graduation_year_value=document.getElementById(graduation_year).value;
    console.log(graduation_year_value);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
    // To show all responses in same place "class_response" is used. It solves space problem.
            let response_place=select_person+'_class_response';
            document.getElementById(response_place).innerHTML = this.responseText;
        }
    };

    xhttp.open("GET", "scripts/update_graduation_year_script.php?roll_no="+roll_no+"&graduation_year="+graduation_year_value, true);
    xhttp.send();
}
