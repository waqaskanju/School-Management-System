
function blank_timeTable(all_teachers,header_day)
{

    // It selects body of the document
    const body = document.getElementsByTagName("body")[0];

    // Inside the body then it create a table
    const table = document.createElement("table");

    // The lenght of table is half of the page.
    table.style.width = "50%";

    // THe table has border.
    table.setAttribute("border", "1");

    // The table will have id based on what is  passed to it, on the argument header_day.
    table.setAttribute("id", header_day);

    // The table will be on the same page no half table on single page. useful for printing.
    table.classList.add("same-page");

    // Create a header for the table
    const tableHead = document.createElement("thead");

    // inside the table header a row is created.
    const headFirstRow = document.createElement("tr");

    // inside the table header row a column is created
    const th = document.createElement("th");

    // the column will span over all the column beneath him. so it span to all the 9 column
    th.setAttribute("colspan", 9);

    // header_day is the name of the class which will passs to this fuction
    // when we call it like header_day=6th or header_day=7thA
    // An array is declared header_day is taken from there.
    th.innerText = header_day;

    // to tr add column in this case th
    headFirstRow.append(th);

    // to thead add tr
    tableHead.append(headFirstRow);

    // to table add th.
    table.append(tableHead);

    // a second row is added to table
    const row2 = document.createElement("tr");

    // inside row a th means colmn is created
    const DayforwardSlahPeriod = document.createElement("th");

    // Text is added to th.
    DayforwardSlahPeriod.innerText = "Day/Period";

    // th is  "Day/Period" is added to the row
    row2.append(DayforwardSlahPeriod);

    // columns are added the row, the number of column added is the delcared in loop.
    // create period header 1 to 8
    for (let i=1; i<=8; i++) {
        const theNumbers = document.createElement("th");
        theNumbers.innerText = i;
        row2.append(theNumbers);
    }
    // Second row having 1,2,3 ... periods are added.
    tableHead.append(row2);

    // Body is added to table.
    const tableBody = document.createElement("tbody");

    // A loop is created to select a day from all_days array.
    for (teacher of all_teachers) {

        // tr is created
        const dailySechdule = document.createElement("tr");

        // a td is added to tr.
        const teacherName = document.createElement("td");

        // the inner text of td is the name of the day For example Monday, Tuesday.
        teacherName.innerText = teacher;
        dailySechdule.append(teacherName);

        // 8 other empty column are created.
        for(let i=0;i<=7;i++){
            const currentClass = document.createElement("td");

            // those empty 8 column are added to row.
            dailySechdule.append(currentClass);

            // Row is added to the table body.
            tableBody.append(dailySechdule);
        }
    }

    table.append(tableBody);
    body.append(table);
}
// Populate function here.
async function getData()
{

    // Get the data from the file.
    let data = await fetch('./timetable_data.json');

    // Convert that data to json format.
    let timeTable = await data.json();
    for(let i=0;i<6;i++){
        let selectedTable=document.getElementById(days[i]);
        let selectedTBody=selectedTable.tBodies[0];
        // console.log(`value of i=${i}`);
        for (let j=0; j<all_teachers.length;j++){
             let d=teacherNum(all_teachers[j]);
            // console.log(`value of d=${d}`)
            let TRow=selectedTBody.getElementsByTagName('tr')[d];
            for(let k=1; k<=8;k++){
                let TColumn=TRow.getElementsByTagName('td')[k];
                let class_name=" -";
                let section_name=" - ";
                let subject_name=" - -  ";
                if (timeTable[all_teachers[j]][days[i]][k].hasOwnProperty('Class')) {
                    class_name = timeTable[all_teachers[j]][days[i]][k]['Class'] + "th ";
                    if(timeTable[all_teachers[j]][days[i]][k].hasOwnProperty('Section')) {
                        section_name = timeTable[all_teachers[j]][days[i]][k]['Section'];
                    }
                    if(timeTable[all_teachers[j]][days[i]][k].hasOwnProperty('Subject')) {
                        subject_name = timeTable[all_teachers[j]][days[i]][k]['Subject'];
                    }

                }

                TColumn.innerHTML= class_name + section_name + "<br>" + subject_name;


            }
        }
    }

}

// This function getData will collect the data and populate the tables.
 getData();

// This will create table of each day whose id will be the name of a day.
for(day of days){
    blank_timeTable(all_teachers,day)
}


