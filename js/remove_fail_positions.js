// Remove position form Fail Students.

function change_fail(){
  // Select table
  let result_table=document.getElementsByTagName('table')[0];
  
  //  no of rows in the table
  let no_of_rows=result_table.rows.length;
  
  // no of columns in the table
  let no_of_columns=result_table.rows[0].cells.length;

// 0 is the header row so it should not be counted.
   for(let i=0; i<no_of_rows-1; i++){
     // as the value i want to change is the last column so insted of 10 I wrote its number.
    if(result_table.tBodies[0].rows[i].cells[no_of_columns-1].innerHTML=="Fail"){

    result_table.tBodies[0].rows[i].cells[no_of_columns-1].style.backgroundColor='#f0b374';
      result_table.tBodies[0].rows[i].cells[no_of_columns-2].innerHTML=" ";
    }
  
}
}