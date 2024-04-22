setTimeout(function(){
for (let t = 1; t <= 4; t++) {
    const table_name = document.getElementById('table_'+t);
    if (table_name) {
        // create new tr
        let newRow = document.createElement("tr");
        var cell1 = document.createElement("td");
        //cell1.textContent = "Total Students =";
        newRow.appendChild(cell1);
        table_name.querySelector("tbody").appendChild(newRow);

        // count no of rows
        //i have subtracted 2 because first and last row have no roll nos
        // they are for writing row1, row2, and total
        let roll_no_rows_length=table_name.rows.length-2;
        let roll_no_col_length=table_name.rows[0].cells.length-1;
        //console.log("Row length",roll_no_rows_length)
        //console.log("Col length",roll_no_col_length)
        count_student_in_table=0;
        for (let i = 0; i < roll_no_rows_length; i++) {
            for (let j = 0; j < roll_no_col_length; j++) {
                    count_student_in_table=count_student_in_table+1
            }
        }
        cell1.textContent = "Total Students =" + count_student_in_table
    }
}
}, 8000);