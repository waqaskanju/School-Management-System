function FocusOnInput()
{
    document.getElementById("rollno").focus(); }


function check_roll_no_student()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("aj_result").innerHTML = this.responseText;
        }
    };
    var  rollno=document.getElementById('rollno').value;
    xhttp.open("GET", "scripts/check_roll_no.php?roll_no="+rollno+"&table=student", true);
    xhttp.send();

    // Also add roll no value to admission no as default value.
    add_rollno_value_to_addmissionno(rollno);
    // also add roll no value to high admission no. on fouce out of roll no
    add_rollno_value_to_addmission_no_high(rollno);
}
//check if roll no already exists in marks table.
function check_roll_no_marks()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("aj_result").innerHTML = this.responseText;
        }
    };
    var  rollno=document.getElementById('rollno').value;
    xhttp.open("GET", "scripts/check_roll_no.php?roll_no="+rollno+"&table=marks", true);
    xhttp.send();


}

function save_rollno(e)
{
    e.preventDefault(); // stop form from refreshing/reloading
    let rollno= document.getElementById('rollno').value;
    localStorage.setItem('Roll_No',rollno);
    console.log("Saved Roll No:", rollno);
    return false; // important to prevent default submit
}

// This function call onload event and show previous entered rollno.
function get_rollno()
{
    document.getElementById('next_rollno').innerHTML= " Previous Entered = " + parseInt(localStorage.getItem('Roll_No'));
      next_roll_no();
}

// This fuction is called on load and next roll no is shown in roll no box.
function next_roll_no()
{
    let next=document.getElementById('rollno').value=parseInt(localStorage.getItem('Roll_No'))+1;
}

function add_rollno_value_to_addmissionno(roll_no)
{
    document.getElementById('admission_no').value=roll_no;
}

function add_rollno_value_to_addmission_no_high(roll_no)
{
    document.getElementById('admission_no_high').value=roll_no;
}


function save_subject_marks(rollno)
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let myresponse = rollno+'response';
            document.getElementById(myresponse).innerHTML = this.responseText;
        }
    };

    let marks=rollno+'marks';

    let  marks_value=document.getElementById(marks).value;
    let  subject=document.getElementById('subject_name').value;
    let  class_name=document.getElementById('class_name').value;
    let  actual_subject=document.getElementById('actual_subject').value;

    console.log(subject);
    xhttp.open("GET", "scripts/update_subject_marks.php?roll_no="+rollno+"&marks="+marks_value+"&subject_name="+subject+"&class_name="+class_name+"&actual_subject="+actual_subject, true);
    xhttp.send();

}


function check_admission_no()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById("check_duplicate").innerHTML = this.responseText;
        }
    };
    let admission_no=document.getElementById('admission_no').value;
    xhttp.open("GET", "scripts/check_roll_no.php?admission_no="+admission_no, true);
    xhttp.send();
}

function show_spinner(){

}

function hide_spinner(){

}

function check_father_cnic_length(){
    let admission_no=document.getElementById('fcnic').value;
    if(admission_no.length!=15){
        document.getElementById('father_cnic_error').innerText="length error";
    }
}

function check_student_cnic_length(){
    let admission_no=document.getElementById('formb').value;
    if(admission_no.length!=15){
        document.getElementById('formb_error').innerText="length error";
    }
}

function check_mobile_no_length(){
    let mobile_no=document.getElementById('mobile').value;
    if(mobile_no.length!=12){
        document.getElementById('mobile_error').innerText="length error";
    }
}
