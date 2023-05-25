// Get all the tables on the page
const tables = Array.from(document.querySelectorAll('table'));

// Iterate over each table
tables.forEach(table => {
    // Get the tbody of the current table
    const tbody = table.querySelector('tbody');

    // Get all rows within the tbody
    const rows = Array.from(tbody.querySelectorAll('tr'));

    // Create a new tbody element to store the transposed data
    const newTbody = document.createElement('tbody');

    // Iterate over the columns
    for (let i = 0; i < rows[0].children.length; i++) {
        // Create a new row for each column
        const newRow = document.createElement('tr');

        // Iterate over the rows
        for (let j = 0; j < rows.length; j++) {
            // Create a new cell with the content of the transposed data
            const newCell = document.createElement('td');
            newCell.textContent = rows[j].children[i].textContent;

            // Append the new cell to the new row
            newRow.appendChild(newCell);
        }

        // Append the new row to the new tbody
        newTbody.appendChild(newRow);
    }

    // Replace the old tbody with the transposed tbody
    tbody.parentNode.replaceChild(newTbody, tbody);
});
