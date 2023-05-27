// Get all the tables on the page
const tables = Array.from(document.querySelectorAll("table"));

// Iterate over each table
tables.forEach(table => {
    // Get all rows in the table body
    const rows = Array.from(table.tBodies[0].querySelectorAll("tr"));

    // Initialize the matrix
    const matrix = [];

    // Iterate over each row (excluding the header row)
    for (let i = 0; i < rows.length; i++) {
        // Get the cells in the row
        const cells = Array.from(rows[i].cells);

        // Extract the data from the cells, excluding the first cell
        const rowData = cells.slice(1).map(cell => parseInt(cell.textContent));

        // Add the row data to the matrix
        matrix.push(rowData);
    }

    // Transpose the matrix
    let transposedMatrix = matrix[0].map((_, colIndex) =>
        matrix.map(row => row[colIndex])
    );

    // Print the transformed matrix
    const newTable = document.createElement("table");
    newTable.classList.add("table", "table-bordered");
    const tbody = document.createElement("tbody");

    const flatMatrix = transposedMatrix.flat();
    const desiredMatrix = [];
    for (let i = 0; i < flatMatrix.length; i += 5) {
        let matrixRow = [];
        if (flatMatrix[i]) {
            for (let j = 0; j < 5; j++) {
                matrixRow.push(flatMatrix[i + j])
            }
            desiredMatrix.push(matrixRow);
        }
    }

    desiredMatrix.forEach((rowData, index) => {
        // Create a new row
        const row = document.createElement("tr");

        // Create a new table header cell
        const headerCell = document.createElement("th");
        headerCell.textContent = "Row " + (index + 1);

        // Append the header cell to the row
        row.appendChild(headerCell);

        // Iterate over each element in the row data
        rowData.forEach(data => {
            // Create a new cell
            const cell = document.createElement("td");
            cell.textContent = data;

            // Append the cell to the row
            row.appendChild(cell);
        });

        // Append the row to the table body
        tbody.appendChild(row);
    });


    // Replace the old table body with the new table body
    table.replaceChild(tbody, table.tBodies[0]);

});
