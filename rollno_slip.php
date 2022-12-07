<?php

/**
 * Print DMC.
 * php version 8.1
 *
 * @category Student
 *
 * @package None
 *
 * @author Waqas Ahmad <waqas@waqaskanju.com>
 *
 * @license http://www.abc.com MIT
 *
 * @link None
 **/

// This file is is printing roll no and exam slip.
require_once 'db_connection.php';
require_once 'sand_box.php';
$link=connect();
?>
<form action="#" method="GET">
<div class="form-row no-print">
<?php
  $selected_class='';
  select_class($selected_class);

  select_school($SCHOOL_SHOW);?>
</div>
<button class="no-print" type="submit" name="submit" class="btn btn-primary">
  Submit
</button>

</form>
<?php
if (isset($_GET['submit'])) {
    $class_name=$_GET['class_exam'];
    $class_name=str_replace('\'', '', $class_name);
}
Page_header("Roll No Slip");
?>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
if (isset($_GET['class_exam'])) {
    $class=$_GET['class_exam'];

} else {
    $class='6th';
}

$q="SELECT * FROM students_info WHERE Class='$class' AND Status=1";
// Use below if a particular roll no is requred
 //$q="SELECT * FROM students_info where Roll_No=21611";

$qr=mysqli_query($link, $q) or die('Error:'. mysqli_error($link));
while ($qra=mysqli_fetch_assoc($qr)) {
    echo '<div class="same-page">
    <h4>
    Roll no slip annual examination
    2021-22
    under the auspices of Distt: exam committee Swat
    </h4>';
    $Roll_No= $qra['Roll_No'];
    $Name= $qra['Name'];
    $Father_Name=$qra['FName'];
    $Class_Name=$qra['Class'];
    $Dob=$qra['Dob'];
    ?>
<table border="1">
            <tr>
              <td>
                    <span class="font-weight-bold"> Roll No </span>
              </td>
              <td> <?php echo $Roll_No;?> </td>
              <td>
                <span class="font-weight-bold"> Name </span>
                </td>
                <td> <?php echo $Name;  ?> </td>
              <td>
                <span class="font-weight-bold">
                    Father's Name </span></td>
                    <td> <?php echo $Father_Name;  ?></td>
              <td>
                <span class="font-weight-bold"> Class </span></td>
                <td><?php echo $Class_Name;  ?></td>
                <td>
                <span class="font-weight-bold"> Dob </span></td>
                <td><?php echo $Dob;  ?></td>
            </tr>
<tr>
<td><span class="font-weight-bold">
    1st paper Time </span></td>
    <td colspan="3">09:30 AM</td>
<td> <span class="font-weight-bold">
    2nd Paper Time </span></td>
    <td colspan="3">11:15 AM</td>
    <td> <span class="font-weight-bold">
    3rd Paper Time </span></td>
    <td colspan="3">01:00 PM</td>
</tr>
</table>

<table border="1" class="m-b-4">
<tr>
            <th colspan="19">
                Date Sheet Class <?php  echo $class; ?> 2nd Monthly Test Dec 2022 GHSS CHITOR </th>
        </tr>
<tr>
            <td> Days </td>
            <td colspan="3"> Tuesday </td>
            <td colspan="3"> Wednesday </td>
            <td colspan="3"> Thursday </td>

</tr>
<tr>
    <td> Date </td>
     <!-- day 1 -->
    <td colspan="3"> 13-12-2022 </td>
     <!-- day 2 -->
    <td colspan="3"> 14-12-2022 </td>
     <!-- day 3 -->
    <td colspan="3"> 15-12-2022 </td>
</tr>
<tr>
    <td>Class </td>
     <!--day 1  -->
    <td> 1 </td> <td> II </td> <td> III </td>
    <!-- day 2 -->
    <td> 1 </td> <td> II </td> <td> III </td>
    <!-- day 3 -->
     <td> 1 </td> <td> II </td><td> III </td>
</tr>
    <?php
    if ($Class_Name=="6th") {
        ?>
    <tr>
         <td> 6th </td>
         <td> Urdu </td>
         <td> History/ Geography </td>
         <td> English </td>
         <td>Islamyat </td>
          <td> Maths </td>
          <td> Mutalia Quran </td>
           <td> General Science </td>
           <td> Pashto </td>
            <td> Computer Science </td>
            </tr>
        <?php
    }
    if ($Class_Name=="7th" || $Class_Name=="7th A" || $Class_Name=="7th B") {
        ?>
    <tr>
        <td> 7th </td>
         <td> English </td>
         <td> Pashto </td>
          <td> Maths </td>
          <td>History / Geography </td>
           <td> Urdu </td>
           <td> Mutalia Quran </td>
           <td> G. Science </td>
           <td> Islamyat </td>
           <td> Computer Science </td>
        </tr>
        <?php
    }
    if ($Class_Name=="8th") {
        ?>
    <tr>
        <td> 8th </td>
        <td> Maths </td>
        <td> Islamyat </td>
         <td> General Science </td>
         <td>Pashto </td>
         <td> English </td>
         <td> History/ Geography </td>
          <td> Mutalia Quran </td>
          <td> Urdu </td>
           <td> Computer Science </td>
           </tr>
        <?php
    }
    if ($Class_Name=="9th" || $Class_Name=="9th A" || $Class_Name=="9th B") {
        ?>
    <tr>
        <td> 9th </td>
        <td> English </td>
        <td> Urdu </td>
         <td> Chemistry </td>
         <td>Physics </td>
         <td> Islamyat </td>
         <td> Pak Study </td>
         <td> Maths </td>
          <td> Biology </td>
          <td> Mutalia Quran </td>
            </tr>
        <?php
    }
    if ($Class_Name=="10th" || $Class_Name=="10th A" || $Class_Name=="10th B") {
        ?>
    <tr>
        <td> 10th </td>
        <td> English </td>
        <td> Islamyat </td>
         <td> Physics </td>
         <td> Urdu </td>
         <td> Chemistry </td>
         <td> Pak Study </td>
          <td> Biology </td>
          <td> Maths </td>
           <td> --- </td>
            </tr>
        <?php
    }

    ?>
</table>

    <?php
    echo '</div>';
}
?>



</body>
</html>
