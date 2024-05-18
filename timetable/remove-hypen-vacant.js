const table_ids=["Mon","Tue","Wed","Thu","Fri","Sat"]
setTimeout(function(){
    for (let t = 0; t <= 5; t++) {
        const table_name = document.getElementById(table_ids[t]);
        if (table_name) {
           
    
          //  console.log("Table Name",table_name);
            // if am subtracing 2; the first row is day the 2nd row has 1,2,3
            // while the actual data start from row 3
            
            let roll_no_rows_length=table_name.rows.length;
            //console.log("row length=",roll_no_rows_length);
            let roll_no_col_length=table_name.rows[2].cells.length;
            //console.log("col length=",roll_no_col_length);

            for (let i = 2; i < roll_no_rows_length; i++) {
              //  console.log("i=",i);
                for (let j = 1; j < roll_no_col_length; j++) {
                    let cell = table_name.rows[i].cells[j];
                    let value=cell.innerHTML;
                   if(value==" - - <br> - -  "){
                        cell.textContent= " ";
                   } else {
                //    console.log(value)
                   } 
                    
                }
            }
           // cell1.textContent = "Total Students =" + count_student_in_table
        }
    }
    }, 5000);