<?php
/**
 * Tab Index Update
 * php version 8.1
 *
 * @category Settings
 *
 * @package None
 *
 * @author Waqas Ahmad <waqaskanju@gmail.com>
 *
 * @license http://www.abc.com MIT
 *
 * @link Update Tab Index Order
 **/
session_start();
require_once 'sand_box.php'; // For $LINK, Page_header, Page_close, Validate_input
$link = $LINK;

// --- 1. INITIALIZATION & DATA FETCH ---

$index_data = null;
$message = '';
$table_name = 'tab_index';
$primary_key_id = 1; // Since there is only one row with Tab_index_id = 1

// Fetch the current index data (There should only be one row)
$qs = "SELECT * FROM {$table_name} WHERE Tab_index_id = '{$primary_key_id}' LIMIT 1";
$qr = mysqli_query($link, $qs);

if (mysqli_num_rows($qr) == 1) {
    $index_data = mysqli_fetch_assoc($qr);
} else {
    $message = "❌ Error: Could not find the index record (ID: {$primary_key_id}).";
}

// --- 2. HANDLE FORM SUBMISSION (UPDATE LOGIC) ---

if (isset($_POST['submit_update'])) {
    // Collect all subject indices from the POST request
    $update_values = [];
    $allowed_subjects = [
        'English', 'Urdu', 'Maths', 'Hpe', 'Nazira', 'Science', 'Arabic',
        'Islamyat', 'History', 'Computer', 'Mutalia', 'Qirat', 'Drawing',
        'Social', 'Pashto', 'Biology', 'Chemistry', 'Physics', 'Geography'
    ];

    foreach ($allowed_subjects as $subject) {
        if (isset($_POST[$subject])) {
            // Validate input: ensure it is a safe integer
            $value = (int)Validate_input($_POST[$subject]);
           echo $update_values[] = "`{$subject}` = '{$value}'";
        }
    }

    if (!empty($update_values)) {
        $set_clause = implode(', ', $update_values);

        // Construct the UPDATE query
        // NOTE: While input is cast to (int), for production, use Prepared Statements.
        $qu = "UPDATE {$table_name} SET {$set_clause} WHERE Tab_index_id = '{$primary_key_id}' LIMIT 1";

        if (mysqli_query($link, $qu)) {
            $message = "✅ Subject Index Order updated successfully!";
            // Redirect to refresh the page and show updated data
            header("Location: update_tab_index.php?update=success");
            exit;
        } else {
            $message = "❌ Error updating record: " . mysqli_error($link);
        }
    } else {
         $message = "⚠️ No valid data received for update.";
    }
}

// Re-fetch data if an update occurred to ensure the form shows the latest values
if (isset($_GET['update']) && $_GET['update'] == 'success') {
     $qr = mysqli_query($link, $qs);
     $index_data = mysqli_fetch_assoc($qr);
}


Page_header('Update Subject Tab Index');
?>
<style>
    .container {
        max-width: 800px;
        margin-top: 20px;
    }
    .subject-group {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    .subject-item {
        width: 30%; /* Adjust based on desired layout */
        margin-bottom: 10px;
    }
</style>
</head>
<body>
<?php require_once 'nav.html'; ?>
<div class="bg-warning text-center no-print">
    <h4>Edit Subject Tab/Column Index Order</h4>
</div>

<div class="container no-print">

    <?php if ($message) { ?>
        <div class="alert alert-info text-center"><?php echo $message; ?></div>
    <?php } ?>

    <?php if ($index_data) { ?>
        <p class="text-info text-center">Enter the desired column index (e.g., 0,1, 2, 3...) for each subject.</p>
        <form action="#" method="POST">
            <input type="hidden" name="Tab_index_id" value="<?php echo htmlspecialchars($primary_key_id); ?>">

            <div class="subject-group card p-3 shadow-sm">
                <?php
                // List of subjects to display in the form
                $subjects = [
                    'English', 'Urdu', 'Maths', 'Hpe', 'Nazira', 'Science', 'Arabic',
                    'Islamyat', 'History', 'Computer', 'Mutalia', 'Qirat', 'Drawing',
                    'Social', 'Pashto', 'Biology', 'Chemistry', 'Physics', 'Geography' 
                ];

                foreach ($subjects as $subject) {
                    // Use a slightly modified name for the label for better readability
                    $label = str_replace(['Hpe', 'Mutalia'], ['Health & PE', 'Pakistan Studies'], $subject);
                    $value = isset($index_data[$subject]) ? htmlspecialchars($index_data[$subject]) : '';
                    echo '<div class="subject-item form-group">';
                    echo '<label for="' . $subject . '" class="fw-bold">' . $label . '</label>';
                    echo '<input type="number" name="' . $subject . '" id="' . $subject . '" class="form-control" value="' . $value . '" min="0" max="30" required>';
                    echo '</div>';
                }
                ?>
            </div>
            
            <div class="text-center mt-4">
                <button type="submit" name="submit_update" class="btn btn-primary btn-lg">Update Subject Indices</button>
            </div>
        </form>
    <?php } else { ?>
        <div class="alert alert-danger text-center">Cannot proceed: Index record not found in the database.</div>
    <?php } ?>

</div> <?php Page_close(); ?>