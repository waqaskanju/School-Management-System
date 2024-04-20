
// /////////////////////////////////////////////////////////////////////////////////////////
let roll_nos=[]
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
let data=this.responseText;
roll_nos=JSON.parse(data)
    }
};

xhttp.open("GET", "./seating_plan_data.php?send_data=1", true);
xhttp.send();
// function call is delayed so that data is avaialble
setTimeout(function(){

/////////////////////////////////////////////////
// this function loop throught a table vertically.
// if you are placing them in 4 tables means 4 rooms.
for (let t = 1; t <= 4; t++) {
  const table_name = document.getElementById('table_'+t);
  if (table_name) {
    let startValue = 0; // Start value for each table
  // instead of 0, loop is started from 1 so that first element do not counnt which is row1
  for (let j = 1; j < table_name.rows[0].cells.length; j++) {
    // Loop through each row in the current column
    // instead of zero, loop is started from 1 to not count first element which is col1
    for (let i = 1; i < table_name.rows.length; i++) {
        let cell = table_name.rows[i].cells[j];
        if(cell){
        cell.textContent=roll_nos[startValue]
        }
          startValue=startValue+1 
    }
  }
  //startValue=startValue
 }  // if table exist
 else {
  console.log(table_name, " table do not exist")
 }
} // end of loop throught 4 tables

 }, 4000);