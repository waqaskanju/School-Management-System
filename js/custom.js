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
  xhttp.open("GET", "check_roll_no.php?roll_no="+rollno+"&table=student", true);
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
  xhttp.open("GET", "check_roll_no.php?roll_no="+rollno+"&table=marks", true);
  xhttp.send();
}