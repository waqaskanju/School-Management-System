<?php

require_once 'db_connection.php';
require_once 'sand_box.php';
require_once 'config.php';
$link=connect();

function select_class($selected_class)
{
    $selected="selected";
    echo "
<div class='form-group col-md-6'>
	<label for='class_exam'>Select Class Name: </label>
              <select class='form-control' name='class_exam' required>
                <option value=''>Select Class </option>
				<option value='6th'"; if ($selected_class=='6th') {
        echo "selected";
    }  echo ">6th </option>
				<option value='7th'"; if ($selected_class=='7th') {
        echo "selected";
    }  echo ">7th </option>
				<option value='8th'"; if ($selected_class=='8th') {
        echo "selected";
    }  echo ">8th </option>
				<option value='9th A'"; if ($selected_class=='9th A') {
        echo "selected";
    }  echo ">9th A </option>
				<option value='9th B'"; if ($selected_class=='9th B') {
        echo "selected";
    }  echo ">9th B </option>
				<option value='10th A'"; if ($selected_class=='10th A') {
        echo "selected";
    }  echo ">10th A </option>
				<option value='10th B'"; if ($selected_class=='10th B') {
        echo "selected";
    }  echo ">10th B </option>


              </select>
      </div>
";
}
select_class($selected_class);
?>

