 function FocusOnInput()
 	{ document.getElementById("rollno").focus(); }


function check_roll_no_student() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		document.getElementById("aj_result").innerHTML = this.responseText;
    }
  };
  var  rollno=document.getElementById('rollno').value;
  xhttp.open("GET", "scripts/check_roll_no.php?roll_no="+rollno+"&table=student", true);
  xhttp.send();
}

function check_roll_no_marks() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		document.getElementById("aj_result").innerHTML = this.responseText;
    }
  };
  var  rollno=document.getElementById('rollno').value;
  xhttp.open("GET", "scripts/check_roll_no.php?roll_no="+rollno+"&table=marks", true);
  xhttp.send();
}

function save_rollno(){
  let rollno= document.getElementById('rollno').value;
	localStorage.setItem('Roll_No',rollno);
}

function get_rollno(){
			document.getElementById('next_rollno').innerHTML= " Previous Entered = " + parseInt(localStorage.getItem('Roll_No'));
}

function next_rollno(){
  document.getElementById('rollno').value=parseInt(localStorage.getItem('Roll_No'))+1;
}


function save_subject_marks(rollno) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
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
