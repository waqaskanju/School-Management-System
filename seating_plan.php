<?php
/**
 * Dynamic seating plan of students.
 * php version 8.1
 *
 * @category Exam
 *
 * @package None
 *
 * @author Waqas <waqas@waqaskanju.com>
 *
 * @license http://www.abc.com MIT
 *
 * @link Adfas
 **/

 require_once 'seating_plan_data.php';
?>
<html>
<head>
  <link rel="stylesheet" href="css/seating_plan.css">
  <style>
  table, td, th {
    border: 2px solid black;
    border-collapse: collapse;
    text-align: center;
  }
  </style>
</head>
<body>
  <section class="container">

  
  <h3>Seating Plan:    <u>SSC A (I) 2023</u> 
      School Name:  <b>GHSS CHITOR</b>  
      Class Name:  <b><?php echo $class_name; ?></b> 
  </h3>  
      <h3> <b>Center No:</b>  <u>123</u> 
 
    <b>Subject:</b>    <u><?php echo $subject; ?> </u>  
    <b>Date</b>        <u><?php echo $date; ?></u>
  </h3>
    
        

<?php  



$total_roll_nos=count($roll_nos);

$exam_rooms = array (
  array("name"=>"Hall A","rows"=>0,"cols"=>5, "capacity"=>50),
  array("name"=>"Hall B","rows"=>0,"cols"=>5, "capacity"=>50),
  array("name"=>"Side Room A","rows"=>0,"cols"=>4, "capacity"=>36),
  array("name"=>"Side Room B","rows"=>0,"cols"=>4, "capacity"=>36),
);

/**
 *  How many Rooms will be used.
 * 
 * @param integer $total_students All students
 * 
 * @return integer no of rooms.
 */
function Room_involved($total_students) 
{
    global $exam_rooms;
    $single_room_capcity=$exam_rooms[0]["capacity"];
    $double_room_capcity=$exam_rooms[0]["capacity"]+$exam_rooms[1]["capacity"];;
    $triple_room_capcity=$exam_rooms[0]["capacity"]+$exam_rooms[1]["capacity"]+
    $exam_rooms[2]["capacity"];;
    $quadruple_room_capacity=$exam_rooms[0]["capacity"]+$exam_rooms[1]["capacity"]+
    $exam_rooms[2]["capacity"]+$exam_rooms[0]["capacity"];

    if ($total_students<=$single_room_capcity) {
        return 1;
    } else if ($total_students<=$double_room_capcity) {
        return 2;
    } else if ($total_students<=$triple_room_capcity) {
        return 3;
    } else if ($total_students<=$quadruple_room_capacity) {
        return 4;
    } else {
        0;
    }
}

/**
 *  How many rows should be alot.
 * 
 * @param integer $available_students All students
 * 
 * @return integer no of rooms.
 */
function Calcuate_rows($available_students) 
{
    $type_is=gettype($available_students);
    if ($type_is=="double") {
        $available_students=$available_students+1;
    }
    return $available_students;
}

/**
 *  Find Share.
 * 
 * @param integer $single_share          Share of Person
 * @param integer $total_shares          share of all the persons
 * @param integer $total_amount_to_share share of all the persons
 * 
 * @return integer no of rooms.
 */
function Find_share($single_share,$total_shares,$total_amount_to_share) 
{
    $share=($single_share*$total_shares)/$total_amount_to_share;
    return $share;
}

$room_involved=Room_involved($total_roll_nos);

//get the number of cols in a particular room

if ($room_involved==1) {
    $max_cols=$exam_rooms[0]['cols'];  
    $put_in_room=$total_roll_nos/$max_cols;
    $rows=Calcuate_rows($put_in_room);
    $exam_rooms[0]['rows']=$rows;
}

if ($room_involved==2) {
    $max_cols=$exam_rooms[0]['cols'];  
    $each_room=$total_roll_nos/2;
    
    $room_0=$each_room/$max_cols;
    $room_0=round($room_0);
    $exam_rooms[0]['rows']=$room_0;


    $room_1=$total_roll_nos-($room_0*$max_cols);
    $max_cols=$exam_rooms[1]['cols'];

    $rows=Calcuate_rows($room_1);
    $exam_rooms[1]['rows']=$rows;
}


if ($room_involved==3) {
    $all_rooms_capacity=$exam_rooms[0]['capacity']+
                        $exam_rooms[1]['capacity']+
                        $exam_rooms[2]['capacity'];
    $all_shares=$total_roll_nos;
    // Room 0 Calcuation
    $person_share=$exam_rooms[0]['capacity'];
    $room_0_share=Find_share($person_share, $all_shares, $all_rooms_capacity);
    $max_cols_0=$exam_rooms[0]['cols'];
    $room_0=$room_0_share/$max_cols_0;
    $room_0=round($room_0);
    $exam_rooms[0]['rows']=$room_0;

    // Room 1 Calculation.
    $person_share=$exam_rooms[1]['capacity'];
    $room_1_share=Find_share($person_share, $all_shares, $all_rooms_capacity);
    $max_cols_1=$exam_rooms[1]['cols'];
    $room_1=$room_1_share/$max_cols_1;
    $room_1=round($room_1);
    $exam_rooms[1]['rows']=$room_0;
  
    //Room 2 Calculation
    $sum=($exam_rooms[0]['rows']*$exam_rooms[0]['cols'])+
         ($exam_rooms[1]['rows']*$exam_rooms[1]['cols']);
    $diff=$total_roll_nos-$sum;
    $max_cols_2=$exam_rooms[2]['cols'];
    $put_in_room=$diff/$max_cols_2;
    $rows=Calcuate_rows($put_in_room);
    $exam_rooms[2]['rows']=$rows;

}

if ($room_involved==4) {
    $all_rooms_capacity=$exam_rooms[0]['capacity']+
                        $exam_rooms[1]['capacity']+
                        $exam_rooms[2]['capacity']+
                        $exam_rooms[3]['capacity'];

    $all_shares=$total_roll_nos;
    // Room 0 Calcuation
    $person_share=$exam_rooms[0]['capacity'];
    $room_0_share=Find_share($person_share, $all_shares, $all_rooms_capacity);
    $max_cols_0=$exam_rooms[0]['cols'];
    $room_0=$room_0_share/$max_cols_0;
    $room_0=round($room_0);
    $exam_rooms[0]['rows']=$room_0;

    // Room 1 Calculation.
    $person_share=$exam_rooms[1]['capacity'];
    $room_1_share=Find_share($person_share, $all_shares, $all_rooms_capacity);
    $max_cols_1=$exam_rooms[1]['cols'];
    $room_1=$room_1_share/$max_cols_1;
    $room_1=round($room_1);
    $exam_rooms[1]['rows']=$room_1;
    

    // Room 2 Calculation.
    $person_share=$exam_rooms[2]['capacity'];
    $room_2_share=Find_share($person_share, $all_shares, $all_rooms_capacity);
    $max_cols_2=$exam_rooms[2]['cols'];
    $room_2=$room_2_share/$max_cols_2;
    $room_2=round($room_2);
    $exam_rooms[2]['rows']=$room_2;

    //Room 3 Calculation
    $sum=($exam_rooms[0]['rows']*$exam_rooms[0]['cols'])+
        ($exam_rooms[1]['rows']*$exam_rooms[1]['cols'])+
        ($exam_rooms[2]['rows']*$exam_rooms[2]['cols']);
    $diff=$total_roll_nos-$sum;
    $max_cols_3=$exam_rooms[3]['cols'];
    $put_in_room=$diff/$max_cols_3;
    $rows=Calcuate_rows($put_in_room);
    $exam_rooms[3]['rows']=$rows;

}

///////////////////////// Code For Showing Data in Tables ///////////////////////////

// $room_no is used to change Room.
$room_no=0;
// $count_col is used to stop creating more columns in a row.
$col_count=1;
// for showing row no in front of line.
$row_count=1;
// if $create_table=1 then table header will be generated.
$create_table=1;

// loop throught all roll nos.
for ($i=0;$i<$total_roll_nos;$i++) {

    //get the number of rows in a particular room
    $max_rows=$exam_rooms[$room_no]['rows'];
    //get the number of cols in a particular room
    $max_cols=$exam_rooms[$room_no]['cols'];
    
    // if $create_table is 1 create table header. and give it caption.
    if ($create_table==1) {
        echo '<table class="table table-bordered">';
        // show the name of Room
        echo "<h4>
              <caption class='text-center text-bold'>". 
                $exam_rooms[$room_no]['name'].
              "</caption>
              </h4>";
        echo '<tr> 
                <th>S.No</th> 
                <th>Column 1</th> 
                <th>Column 2</th>
                <th>Column 3</th>
                <th>Column 4</th>';
        if ($max_cols==5) {
            echo '<th>Column 5</th>';
        }
        echo '</tr>';
        // turn off table creation. it will only be on when this table is complete.
        $create_table=0;
    }
 
    if ($col_count==1) {
        echo '<tr><td>Row '.$row_count.'</td>';
    }

    // Print Roll No.
    echo'<td>'. $roll_nos[$i] .'</td>';
  
    $col_count=$col_count+1; 
    if ($col_count>$max_cols) {
        echo '</tr>';
        $col_count=1;
        $row_count=$row_count+1;
    }

    if ($row_count>$max_rows) {
        $create_table=1;
        $row_count=1;
        $room_no=$room_no+1;
        echo "</table>";
    }

   
}  // end of roll no loop
echo "</table>";
echo "<footer>";
echo "<p> Total Students=".$total_roll_nos."</p>";
echo "<p> Signature of Supdt/D.Supdt____________________</p>";
echo "</footer>";

?>
</section>
</body>
</html>