setTimeout(function(){
for (let t = 1; t <= 4; t++) {
    const table_name = document.getElementById('table_'+t);
   let count_roll=0
    if (table_name) {
     // Start value for each table
     
     for(let j = 1; j < table_name.rows[0].cells.length; j++) {
      for(let i = 1; i < table_name.rows.length; i++) {
       let cell = table_name.rows[i].cells[j];
        if(cell){
         console.log("i:",i,"j:",j,"value:",cell.textContent)
         if (!isNaN(cell.textContent)) {
          count_roll=count_roll+1
         } 
        }
     }
   }
   // change content of last row.
   table_name.rows.length
     
    }  // if table exist
    else {
     console.log(table_name, " table do not exist")
    }
   console.log("total in table",table_name,"total",count_roll)
   } 
   
}, 10000);